<?php
declare(strict_types=1);

namespace App\Tests\Users\WithTraits;

use App\Tests\Users\DbTestCase;
use App\Users\MySQLUsersRepository;

final class MySQLUsersRepositoryTest extends DbTestCase
{
    use UsersRepositoryTestCase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->usersRepository = $this->services[MySQLUsersRepository::class];
    }
}