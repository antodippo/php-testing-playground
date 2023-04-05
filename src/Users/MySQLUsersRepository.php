<?php
declare(strict_types=1);

namespace App\Users;

readonly class MySQLUsersRepository implements UsersRepository
{
    public function __construct(private \PDO $pdo) {}

    public function store(User $user): void
    {
        $sth = $this->pdo->prepare('INSERT INTO users (id, name) VALUES (?,?)');
        $sth->execute([$user->id(), $user->name()]);
    }

    public function findById(int $id): User
    {
        $sth = $this->pdo->prepare('SELECT id, name FROM users WHERE id = ?');
        $sth->execute([$id]);
        $result = $sth->fetch();

        if ($sth->rowCount() === 0) {
            throw new UserNotFound("The user with id {$id} was not found");
        }

        return new User($result['id'], $result['name']);
    }

    public function findAll(): array
    {
        $sth = $this->pdo->prepare('SELECT id, name FROM users');
        $sth->execute();
        $results = $sth->fetchAll();

        $users = [];
        foreach ($results as $result) {
            $users[] = new User($result['id'], $result['name']);
        }

        return $users;
    }
}