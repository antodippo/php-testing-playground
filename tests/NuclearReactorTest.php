<?php
declare(strict_types=1);

namespace App\Tests;

use App\NuclearReactor;
use Eris\Generator;
use PHPUnit\Framework\TestCase;

class NuclearReactorTest extends TestCase
{
    use \Eris\TestTrait;

    public function testIsDangerous(): void
    {
        $nuclearReactor = new NuclearReactor();
        $this->assertFalse($nuclearReactor->isDangerous(500));
        $this->assertTrue($nuclearReactor->isDangerous(2000));
        $this->assertTrue($nuclearReactor->isDangerous(1000));
    }

    public function testIsDangerousProperties(): void
    {
        $nuclearReactor = new NuclearReactor();

        $this->forAll(Generator\neg())
            ->then(function (int $temperature) use ($nuclearReactor) {
                $this->assertFalse($nuclearReactor->isDangerous($temperature));
            });

        $this->forAll(Generator\choose(0, 999))
            ->then(function (int $temperature) use ($nuclearReactor) {
                $this->assertFalse($nuclearReactor->isDangerous($temperature));
            });

        $this->forAll(Generator\choose(1000, 99999))
            ->then(function (int $temperature) use ($nuclearReactor) {
                $this->assertTrue($nuclearReactor->isDangerous($temperature));
            });
    }
}
