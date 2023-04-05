<?php
declare(strict_types=1);

namespace App\Tests\Users\WithAbstractClass;

use App\Tests\Users\DbTestCase;
use App\Users\User;
use App\Users\UserNotFound;
use App\Users\UsersRepository;

abstract class UsersRepositoryTestCase extends DbTestCase
{
    abstract protected function getUsersRepository(): UsersRepository;

    public function testItRetrievesAUser(): void
    {
        // Arrange
        $userRepository = $this->getUsersRepository();
        $userRepository->store(new User(1, 'John'));

        // Act
        $retrievedUser = $userRepository->findById(1);

        // Assert
        self::assertEquals(new User(1, 'John'), $retrievedUser);
    }

    public function testItRetrievesAllUsers(): void
    {
        // Arrange
        $userRepository = $this->getUsersRepository();
        $userRepository->store(new User(1, 'John'));
        $userRepository->store(new User(2, 'Paul'));

        // Act
        $retrievedUsers = $userRepository->findAll();

        // Assert
        self::assertCount(2, $retrievedUsers);
        self::assertEquals(new User(2, 'Paul'), array_pop($retrievedUsers));
        self::assertEquals(new User(1, 'John'), array_pop($retrievedUsers));
    }

    public function testItThrowsAnExceptionWhenUserIsNotFound(): void
    {
        // Arrange
        $userRepository = $this->getUsersRepository();

        // Assert
        $this->expectException(UserNotFound::class);

        // Act
        $userRepository->findById(1);
    }
}