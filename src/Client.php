<?php

use callbacks\IMessageSender;

class Client
{

    public function __construct(Clothes $clothes, Worker $worker)
    {
        $this->clothes = $clothes;
        $this->worker = $worker;
    }

    public function askForALaundryService(IMessageSender $messageSender)
    {
        if ($this->worker->respondToMessage($messageSender->sendMessage())) {
            return true;
        } else {
             return false;
        }
    }

    public function cleanClothes()
    {
        if ($this->clothes->getStatus() == "dirty") {
            $this->worker->cleanClothes($this->clothes);
        }

        return $this->clothes->getStatus();
    }
}
