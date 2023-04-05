<?php
declare(strict_types=1);

namespace App\Users;

class InMemoryUsersRepository implements UsersRepository
{
    /** @var array<User> */
    private array $users = [];

    public function store(User $user): void
    {
        $this->users[$user->id()] = $user;
    }

    public function findById(int $id): User
    {
        if (! array_key_exists($id, $this->users)) {
            throw new UserNotFound("The user with id {$id} was not found");
        }

        return $this->users[$id];
    }

    public function findAll(): array
    {
        return $this->users;
    }
}