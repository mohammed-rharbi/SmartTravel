<?php

include_once 'DatabaseDAO.php';
include_once 'RouteDAO.php';
include_once 'BusDAO.php';
include_once 'Schedule.php';

class ScheduleDAO extends DatabaseDAO
{
    public function getAllSchedules()
    {
        $query = "SELECT * FROM Schedule";
        $result = $this->fetchAll($query);
        $schedules = array();
        foreach ($result as $row) {
            $BusDao = new BusDao();
            $RouteDao = new RouteDao();
            $bus = $BusDao->getBusById($row['busID']);
            $route = $RouteDao->getRouteById($row['routeID']);

            $schedules[] = new Schedule($row['scheduleID'], $row['date'], $row['departureTime'], $row['arrivalTime'], $row['availableSeats'], $bus, $route);
        }
        return $schedules;
    }

    public function getScheduleById($scheduleID)
    {
        $query = "SELECT * FROM Schedule WHERE scheduleID = :scheduleID";
        $params = [':scheduleID' => $scheduleID];
        $result = $this->fetch($query, $params);
        $BusDao = new BusDao();
        $RouteDao = new RouteDao();
        $bus = $BusDao->getBusById($result['busID']);
        $route = $RouteDao->getRouteById($result['routeID']);
        return new Schedule($result['scheduleID'], $result['date'], $result['departureTime'], $result['arrivalTime'], $result['availableSeats'], $bus, $route); // Return null if schedule with given ID is not found
    }
    public function addSchedule($schedule)
    {
        $date = $schedule->getDate();
        $departureTime = $schedule->getDepartureTime();
        $arrivalTime = $schedule->getArrivalTime();
        $availableSeats = $schedule->getAvailableSeats();
        $busID = $schedule->getBus()->getBusID();
        $routeID = $schedule->getRoute()->getRouteID();

        $query = "INSERT INTO Schedule (date, departureTime, arrivalTime, availableSeats, busID, routeID) 
                  VALUES (:date, :departureTime, :arrivalTime, :availableSeats, :busID, :routeID)";
        $params = [
            ':date' => $date,
            ':departureTime' => $departureTime,
            ':arrivalTime' => $arrivalTime,
            ':availableSeats' => $availableSeats,
            ':busID' => $busID,
            ':routeID' => $routeID
        ];

        return $this->execute($query, $params);
    }

    public function updateSchedule($schedule)
    {
        $scheduleID = $schedule->getScheduleID();
        $date = $schedule->getDate();
        $departureTime = $schedule->getDepartureTime();
        $arrivalTime = $schedule->getArrivalTime();
        $availableSeats = $schedule->getAvailableSeats();
        $bus = $schedule->getBus()->getBusID();
        $route = $schedule->getRoute()->getRouteID();

        $query = "UPDATE Schedule SET date = :date, departureTime = :departureTime, 
                  arrivalTime = :arrivalTime, availableSeats = :availableSeats, 
                  busID = :busID, routeID = :routeID 
                  WHERE scheduleID = :scheduleID";
        $params = [
            ':scheduleID' => $scheduleID,
            ':date' => $date,
            ':departureTime' => $departureTime,
            ':arrivalTime' => $arrivalTime,
            ':availableSeats' => $availableSeats,
            ':busID' => $bus,
            ':routeID' => $route
        ];

        return $this->execute($query, $params);
    }

    public function deleteSchedule($scheduleID)
    {
        $query = "DELETE FROM Schedule WHERE scheduleID = :scheduleID";
        $params = [':scheduleID' => $scheduleID];

        return $this->execute($query, $params);
    }
    public function getScheduelByEndCityStartCity($endCity, $StartCity, $date, $places)
    {

        $query = "SELECT * FROM Schedule inner join route on routeID=route.routeID  WHERE date >= :date AND availableSeats = :places AND route. = :startCity";
        $params = [
            ':date' => $date,
            ':endCity' => $endCity,
            ':startCity' => $StartCity,
            ':places' => $places
        ];
        $result = $this->fetch($query, $params);
        $BusDao = new BusDao();
        $RouteDao = new RouteDao();
        $bus = $BusDao->getBusById($result['busID']);
        $route = $RouteDao->getRouteById($result['routeID']);
        return new Schedule($result['scheduleID'], $result['date'], $result['departureTime'], $result['arrivalTime'], $result['availableSeats'], $bus, $route); // Return null if schedule with given ID is not found


    }
}
$sc = new ScheduleDAO();
$c = $sc->getScheduleById(1);
print_r($c);
