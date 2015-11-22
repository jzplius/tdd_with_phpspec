<?php

namespace spec;

use Clothes;
use Laundry;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WorkerSpec extends ObjectBehavior
{

    function let()
    {
        $laundry = new Laundry();
        $this->beConstructedWith($laundry);
    }

    public function it_should_respond() {
        $message = "Can you get my clothes laundred, please?";

        // "You can give me your dirty clothes"
        $this->respondToMessage($message)->shouldReturn(true);
    }

    public function it_should_clean_clothes() {
        $clothes = new Clothes();

        $this->cleanClothes($clothes)->shouldReturn($clothes);
    }
}
