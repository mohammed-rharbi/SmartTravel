<?php

session_start();

class SearchController
{
    public function index()
    {
        // Fetch the list of companies
        $companyDAO = new CompanyDAO();
        $allCompanies = $companyDAO->getAllCompanies();

        // Initialize variables
        $availableSchedules = [];
        $filteredSchedules = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle Search Form submission
            if (isset($_POST['departureCity'], $_POST['arrivalCity'], $_POST['travelDate'], $_POST['numPeople'])) {
                // Handle search form submission, similar to your existing code

                // Query the database for available schedules based on the form selection
                $scheduleDAO = new ScheduleDAO();

                // Define the variables before calling the method
                $date = $_POST['travelDate'];
                $endCity = $_POST['arrivalCity'];
                $startCity = $_POST['departureCity'];
                $places = $_POST['numPeople'];


                $availableSchedules = $scheduleDAO->getScheduelByEndCityStartCity($date, $endCity, $startCity, $places);

                // Handle Company Filter
                if (isset($_POST['companyFilter'])) {
                    $selectedCompanyID = $_POST['companyFilter'];

                    // Adjust the logic based on your actual filter criteria
                    foreach ($availableSchedules as $schedule) {
                        $scheduleCompanyID = $schedule->getBusID()->getCompany()->getCompanyID();

                        if ($selectedCompanyID === '' || $scheduleCompanyID == $selectedCompanyID) {
                            $filteredSchedules[] = $schedule;
                        }
                    }
                } else {
                    // If "Show All" is selected, reset company filter and display all schedules
                    $filteredSchedules = $availableSchedules;
                }
            }
        } else {
            // If no form submission, initialize with all schedules
            $scheduleDAO = new ScheduleDAO();
            $availableSchedules = $scheduleDAO->getAllSchedules();
            $filteredSchedules = $availableSchedules;
        }

        // Load the view
        include_once 'app/views/searchPage.php';
    }
}