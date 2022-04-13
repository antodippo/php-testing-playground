<?php
declare(strict_types=1);

namespace App;

interface TemperatureSensor
{
    public function currentTemperature(): int;
}