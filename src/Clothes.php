<?php
/**
 * Created by PhpStorm.
 * User: jzplius
 * Date: 15.11.19
 * Time: 21.58
 */


class Clothes
{

    private $status;

    public function __construct() {
        $this->status = "dirty";
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }
}