<?php
declare(strict_types=1);

namespace App\Tests\Users\WithDataProviders;

use App\Tests\Users\DbTestCase;
use App\Users\InMemoryUsersRepository;
use App\Users\MySQLUsersRepository;
use App\Users\User;
use App\Users\UserNotFound;
use App\Users\UsersRepository;

final class UsersRepositoryTest extends DbTestCase
{
    /** @dataProvider getUsersRepositoryImplementations */
    public function testItRetrievesAUser(string $userRepositoryClassName): void
    {
        // Arrange
        $userRepository = $this->services[$userRepositoryClassName];
        $userRepository->store(new User(1, 'John'));

        // Act
        $retrievedUser = $userRepository->findById(1);

        // Assert
        self::assertEquals(new User(1, 'John'), $retrievedUser);
    }

    /** @dataProvider getUsersRepositoryImplementations */
    public function testItRetrievesAllUsers(string $userRepositoryClassName): void
    {
        // Arrange
        $userRepository = $this->services[$userRepositoryClassName];
        $userRepository->store(new User(1, 'John'));
        $userRepository->store(new User(2, 'Paul'));

        // Act
        $retrievedUsers = $userRepository->findAll();

        // Assert
        self::assertCount(2, $retrievedUsers);
        self::assertEquals(new User(2, 'Paul'), array_pop($retrievedUsers));
        self::assertEquals(new User(1, 'John'), array_pop($retrievedUsers));
    }

    /** @dataProvider getUsersRepositoryImplementations */
    public function testItThrowsAnExceptionWhenUserIsNotFound(string $userRepositoryClassName): void
    {
        // Arrange
        $userRepository = $this->services[$userRepositoryClassName];

        // Assert
        $this->expectException(UserNotFound::class);

        // Act
        $userRepository->findById(1);
    }

    /** @return array<array<UsersRepository>> */
    public function getUsersRepositoryImplementations(): array
    {
        return[
            InMemoryUsersRepository::class => [InMemoryUsersRepository::class],
            MySQLUsersRepository::class => [MySQLUsersRepository::class],
        ];
    }
}