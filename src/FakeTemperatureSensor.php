<?php
declare(strict_types=1);

namespace App;

class FakeTemperatureSensor implements TemperatureSensor
{
    private int $temperatureToReturn;

    public function __construct(int $temperatureToReturn)
    {
        $this->temperatureToReturn = $temperatureToReturn;
    }

    public function currentTemperature(): int
    {
        return $this->temperatureToReturn;
    }
}