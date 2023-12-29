<?php

class Schedule
{
    private $scheduleID;
    private $date;
    private $departureTime;
    private $arrivalTime;
    private $availableSeats;
    private $bus;
    private $route;

    public function __construct($scheduleID, $date, $departureTime, $arrivalTime, $availableSeats, $bus, $route)
    {
        $this->scheduleID = $scheduleID;
        $this->date = $date;
        $this->departureTime = $departureTime;
        $this->arrivalTime = $arrivalTime;
        $this->availableSeats = $availableSeats;
        $this->bus = $bus;
        $this->route = $route;
    }

    public function getScheduleID()
    {
        return $this->scheduleID;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    public function getAvailableSeats()
    {
        return $this->availableSeats;
    }

    public function getBusID()
    {
        return $this->bus;
    }

    public function getRouteID()
    {
        return $this->route;
    }

    // Add setters if needed
}
