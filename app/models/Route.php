<?php

class Route
{
    private $routeID;
    private $startCityID;
    private $endCityID;
    private $distance;
    private $duration;

    public function __construct($routeID, $startCityID, $endCityID, $distance, $duration)
    {
        $this->routeID = $routeID;
        $this->startCityID = $startCityID;
        $this->endCityID = $endCityID;
        $this->distance = $distance;
        $this->duration = $duration;
    }

    public function getRouteID()
    {
        return $this->routeID;
    }

    public function getStartCityID()
    {
        return $this->startCityID;
    }

    public function getEndCityID()
    {
        return $this->endCityID;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    // Add setters if needed
}
