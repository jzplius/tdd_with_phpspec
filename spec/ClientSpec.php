<?php

namespace spec;

use callbacks\IMessageSender;
use Clothes;
use Laundry;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Worker;

class ClientSpec extends ObjectBehavior
{

    function let()
    {
        $laundry = new Laundry();
        $clothes = new Clothes();
        $worker = new Worker($laundry);
        $this->beConstructedWith($clothes, $worker);
    }

    function it_should_agree_to_clean_clothes(IMessageSender $messageSender)
    {
        // "send me a message that says, 'Can you get my clothes laundred, please'"
        $messageSender->sendMessage()->shouldBeCalled();
        $messageSender->sendMessage()->willReturn("Can you get my clothes laundred, please?");

        $this->askForALaundryService($messageSender)->shouldReturn(true);
    }

    function it_should_clean_clothes()
    {
        $this->cleanClothes()->shouldReturn("clean");
    }

    /*
    Client
        -Clothes
        // "I give you your clean clothes and say, 'Here are your clean clothes.'" client-worker
        -// "Maybe you speak French,"
    Laundry
        -Clothes
    TaxiCab
        -Clothes
        // "So I go out and hail a taxicab and tell the driver to take me to this place in San Francisco." irrelevant
        // "I jump back in the cab, I get back here."
    Worker
        -Clothes
        // "send me a message that says, 'Can you get my clothes laundred, please'" worker-client
        // "You can give me your dirty clothes" worker-client,
        // "I happen to know where the best laundry place in San Francisco is"
        // "I go get your clothes laundered,"   message and clothes laundry-worker
        -// "And I speak English,"
        -// "and I have dollars in my pockets"
       */
}
