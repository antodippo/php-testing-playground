<?php
declare(strict_types=1);

namespace App\Tests\Users\WithAbstractClass;

use App\Users\InMemoryUsersRepository;
use App\Users\UsersRepository;

final class InMemoryUsersRepositoryTest extends UsersRepositoryTestCase
{
    protected function getUsersRepository(): UsersRepository
    {
        return new InMemoryUsersRepository();
    }
}