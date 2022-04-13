<?php
declare(strict_types=1);

namespace App;

class NuclearReactorWithExternalSensor
{
    public function __construct(private TemperatureSensor $temperatureSensor) {}

    public function isDangerous(): bool
    {
        $temperature = $this->temperatureSensor->currentTemperature();

        if ($temperature >= 1000) {
            return true;
        } else {
            return false;
        }
    }
}
