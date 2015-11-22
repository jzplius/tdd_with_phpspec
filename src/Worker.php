<?php


class Worker
{

    public function __construct(Laundry $laundry)
    {
        $this->laundry = $laundry;
    }

    public function respondToMessage($message)
    {
        if ($message == "Can you get my clothes laundred, please?") {
            return true;
        } else {
            return false;
        }
    }

    public function cleanClothes(Clothes $clothes)
    {
        if ($clothes->getStatus() == "dirty") {
            $clothes = $this->laundry->cleanClothes($clothes);
            return $clothes;
        } else {
            return false;
        }
    }
}
