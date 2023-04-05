<?php
declare(strict_types=1);

namespace App\Users;

readonly class User
{
    public function __construct(private int $id, private string $name) {}

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}