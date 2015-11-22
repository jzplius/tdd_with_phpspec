<?php

namespace spec;

use Clothes;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LaundrySpec extends ObjectBehavior
{

    function it_should_clean_clothes() {
        $clothes = new Clothes();

        $this->cleanClothes($clothes)->shouldReturn($clothes);
    }
}
