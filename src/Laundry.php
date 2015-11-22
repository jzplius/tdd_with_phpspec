<?php


class Laundry
{

    public function cleanClothes(Clothes $clothes)
    {
        if ($clothes->getStatus() == "dirty") {
            $clothes->setStatus("clean");

            return $clothes;
        } else {
            return false;
        }
    }
}
