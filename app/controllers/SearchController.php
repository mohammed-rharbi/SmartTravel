<?php
session_start();
class SearchController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $departureCityID = $_POST['departureCity'];
            $arrivalCityID = $_POST['arrivalCity'];
            $travelDate = $_POST['travelDate'];
            $numPeople = $_POST['numPeople'];
            $_SESSION['departureCity'] = $departureCityID;

            $_SESSION['arrivalCity'] = $arrivalCityID;

            $_SESSION['travelDate'] = $travelDate;

            $_SESSION['numPeople'] = $numPeople;


            // Query the database for available schedules based on the form selection
            $scheduleDAO = new ScheduleDAO();

            // Define the variables before calling the method
            $date = $travelDate;
            $endCity = $arrivalCityID;
            $startCity = $departureCityID;
            $places = $numPeople;

            $availableSchedules = $scheduleDAO->getScheduelByEndCityStartCity($date, $endCity, $startCity, $places);
            // $availableSchedules = $scheduleDAO->getAllSchedules();
            // print_r($availableSchedules);

            // Pass the data to the view
            include_once 'app/views/searchPage.php';
        } else {
            // Handle other cases or redirect to home if needed
            header("Location: index.php");
            exit();
        }

    }
}