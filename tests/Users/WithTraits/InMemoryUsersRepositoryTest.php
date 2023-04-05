<?php
declare(strict_types=1);

namespace App\Tests\Users\WithTraits;

use App\Users\InMemoryUsersRepository;
use PHPUnit\Framework\TestCase;

final class InMemoryUsersRepositoryTest extends TestCase
{
    use UsersRepositoryTestCase;

    protected function setUp(): void
    {
        $this->usersRepository = new InMemoryUsersRepository();
    }
}