<?php

class Bus
{
    public $busID;
    public $busNumber;
    public $licensePlate;
    public $company;
    public $capacity;

    public function __construct($busID, $busNumber, $licensePlate, $company, $capacity)
    {
        $this->busID = $busID;
        $this->busNumber = $busNumber;
        $this->licensePlate = $licensePlate;
        $this->company = $company;
        $this->capacity = $capacity;
    }

    function getBusID()
    {
        return $this->busID;
    }
    function getBusNumber()
    {
        return $this->busNumber;
    }
    function getLicensePlate()
    {
        return $this->licensePlate;
    }
    public function getCompany()
    {
        return $this->company;
    }
    function getCapacity()
    {
        return $this->capacity;
    }
}