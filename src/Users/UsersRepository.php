<?php
declare(strict_types=1);

namespace App\Users;

interface UsersRepository
{
    public function store(User $user): void;

    public function findById(int $id): User;

    /** @return array<User> */
    public function findAll(): array;

}