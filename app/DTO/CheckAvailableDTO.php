<?php

namespace App\DTO;

class CheckAvailableDTO
{
    private $status;
    private $position;
    private $serialNo;

    public function __construct($status, $position, $serialNo)
    {
        $this->status = $status;
        $this->position = $position;
        $this->serialNo = $serialNo;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getSerialNo()
    {
        return $this->serialNo;
    }
}
