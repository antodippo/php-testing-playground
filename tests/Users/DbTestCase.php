<?php
declare(strict_types=1);

namespace App\Tests\Users;

use App\Users\InMemoryUsersRepository;
use App\Users\MySQLUsersRepository;
use PHPUnit\Framework\TestCase;

class DbTestCase extends TestCase
{
    protected array $services = [];

    protected function setUp(): void
    {
        parent::setUp();

        $pdo = new \PDO('mysql:host=db;dbname=testing-playground', 'root', 'root');
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT(11) NOT NULL,
                name VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
            )");

        $this->services[MySQLUsersRepository::class] = new MySQLUsersRepository($pdo);
        $this->services[InMemoryUsersRepository::class] = new InMemoryUsersRepository();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $pdo = new \PDO('mysql:host=db;dbname=testing-playground', 'root', 'root');
        $pdo->exec("TRUNCATE TABLE users");
    }
}