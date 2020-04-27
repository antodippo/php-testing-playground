<?php
declare(strict_types=1);

namespace App\Tests;

use App\NuclearReactor;
use PHPUnit\Framework\TestCase;

class NuclearReactorTest extends TestCase
{
    public function testIsDangerous(): void
    {
        $nuclearReactor = new NuclearReactor();
        $this->assertFalse($nuclearReactor->isDangerous(500));
        $this->assertTrue($nuclearReactor->isDangerous(2000));
        $this->assertFalse($nuclearReactor->isDangerous(1000));
    }
}
