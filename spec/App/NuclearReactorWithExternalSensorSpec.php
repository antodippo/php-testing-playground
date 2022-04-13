<?php

namespace spec\App;

use App\NuclearReactorWithExternalSensor;
use App\TemperatureSensor;
use PhpSpec\ObjectBehavior;

class NuclearReactorWithExternalSensorSpec extends ObjectBehavior
{
    public function it_is_initializable(TemperatureSensor $temperatureSensor)
    {
        $this->beConstructedWith($temperatureSensor);
        $this->shouldHaveType(NuclearReactorWithExternalSensor::class);
    }

    public function it_returns_true_when_dangerous(TemperatureSensor $temperatureSensor)
    {
        $this->beConstructedWith($temperatureSensor);
        $temperatureSensor->currentTemperature()->shouldBeCalled()->willReturn(2000);

        $this->isDangerous()->shouldBe(true);
    }

    public function it_returns_false_when_not_dangerous(TemperatureSensor $temperatureSensor)
    {
        $this->beConstructedWith($temperatureSensor);
        $temperatureSensor->currentTemperature()->shouldBeCalled()->willReturn(500);

        $this->isDangerous()->shouldBe(false);
    }
}
