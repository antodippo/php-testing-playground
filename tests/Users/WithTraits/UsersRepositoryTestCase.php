<?php
declare(strict_types=1);

namespace App\Tests\Users\WithTraits;

use App\Users\User;
use App\Users\UserNotFound;
use App\Users\UsersRepository;

trait UsersRepositoryTestCase
{
    private UsersRepository $usersRepository;

    public function testItRetrievesAUser(): void
    {
        // Arrange
        $this->usersRepository->store(new User(1, 'John'));

        // Act
        $retrievedUser = $this->usersRepository->findById(1);

        // Assert
        self::assertEquals(new User(1, 'John'), $retrievedUser);
    }

    public function testItRetrievesAllUsers(): void
    {
        // Arrange
        $this->usersRepository->store(new User(1, 'John'));
        $this->usersRepository->store(new User(2, 'Paul'));

        // Act
        $retrievedUsers = $this->usersRepository->findAll();

        // Assert
        self::assertCount(2, $retrievedUsers);
        self::assertEquals(new User(2, 'Paul'), array_pop($retrievedUsers));
        self::assertEquals(new User(1, 'John'), array_pop($retrievedUsers));
    }

    public function testItThrowsAnExceptionWhenUserIsNotFound(): void
    {
        // Assert
        $this->expectException(UserNotFound::class);

        // Act
        $this->usersRepository->findById(1);
    }
}