<?php
declare(strict_types=1);

namespace App\Tests\Users\WithAbstractClass;

use App\Users\MySQLUsersRepository;
use App\Users\UsersRepository;

final class MySQLUsersRepositoryTest extends UsersRepositoryTestCase
{
    protected function getUsersRepository(): UsersRepository
    {
        return $this->services[MySQLUsersRepository::class];
    }
}