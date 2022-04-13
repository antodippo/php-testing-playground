<?php
declare(strict_types=1);

namespace App\Tests;

use App\FakeTemperatureSensor;
use App\NuclearReactorWithExternalSensor;
use App\TemperatureSensor;
use PHPUnit\Framework\TestCase;

class NuclearReactorWithExternalSensorTest extends TestCase
{
    public function testItTellsWhenDangerousWithMock(): void
    {
        $temperatureSensorMock = $this->createMock(TemperatureSensor::class);
        $temperatureSensorMock->method('currentTemperature')->willReturn(2000);

        $nuclearReactor = new NuclearReactorWithExternalSensor($temperatureSensorMock);
        $this->assertTrue($nuclearReactor->isDangerous());
    }

    public function testItReturnsFalseWhenNotDangerousWithMock(): void
    {
        $temperatureSensorMock = $this->createMock(TemperatureSensor::class);
        $temperatureSensorMock->method('currentTemperature')->willReturn(500);

        $nuclearReactor = new NuclearReactorWithExternalSensor($temperatureSensorMock);
        $this->assertFalse($nuclearReactor->isDangerous());
    }

    public function testItReturnsTrueWhenDangerousWithoutMocks(): void
    {
        $temperatureSensor = new FakeTemperatureSensor(2000);

        $nuclearReactor = new NuclearReactorWithExternalSensor($temperatureSensor);
        $this->assertTrue($nuclearReactor->isDangerous());
    }

    public function testItReturnsFalseWhenNotDangerousWithoutMocks(): void
    {
        $temperatureSensor = new FakeTemperatureSensor(500);

        $nuclearReactor = new NuclearReactorWithExternalSensor($temperatureSensor);
        $this->assertFalse($nuclearReactor->isDangerous());
    }
}
