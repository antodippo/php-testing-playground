<?php

namespace spec\App;

use App\NuclearReactor;
use PhpSpec\ObjectBehavior;

class NuclearReactorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(NuclearReactor::class);
    }

    public function it_shows_when_is_dangerous()
    {
        $this->isDangerous(500)->shouldBe(false);
        $this->isDangerous(2000)->shouldBe(true);
        //$this->isDangerous(1000)->shouldBe(false);
    }
}
