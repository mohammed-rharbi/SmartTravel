<?php
include_once 'model/ScheduleDAO.php';
// Instantiate ScheduleDAO
$scheduleDAO = new ScheduleDAO();

// Get all schedules
$schedules = $scheduleDAO->getAllSchedules();

// Include the view file
include_once 'view/schedules.php';
class ScheduleController
{
    private $scheduleDAO;

    public function __construct()
    {
        $this->scheduleDAO = new ScheduleDAO();
    }

    public function indexSchedule()
    {
        // Display a list of schedules
        $schedules = $this->scheduleDAO->getAllSchedules();
        // Include your view file (e.g., schedule/index.php) to display the list
        include '../view/schedule/index.php';
    }

    public function add()
    {
        // Handle the addition of a new schedule
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $date = $_POST['date'];
            $departureTime = $_POST['departureTime'];
            $arrivalTime = $_POST['arrivalTime'];
            $availableSeats = $_POST['availableSeats'];
            $busID = $_POST['busID'];
            $routeID = $_POST['routeID'];

            // Create a Schedule object
            $schedule = new Schedule(null, $date, $departureTime, $arrivalTime, $availableSeats, $busID, $routeID);

            // Add the schedule to the database
            $this->scheduleDAO->addSchedule($schedule);

            // Redirect to the index page or show a success message
            header('Location: index.php');
            exit();
        } else {
            // Display the form to add a new schedule
            // Include your view file (e.g., schedule/add.php)
            include '../view/schedule/add.php';
        }
    }

    public function edit($scheduleID)
    {
        // Handle the editing of an existing schedule
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $date = $_POST['date'];
            $departureTime = $_POST['departureTime'];
            $arrivalTime = $_POST['arrivalTime'];
            $availableSeats = $_POST['availableSeats'];
            $busID = $_POST['busID'];
            $routeID = $_POST['routeID'];

            // Create a Schedule object
            $schedule = new Schedule($scheduleID, $date, $departureTime, $arrivalTime, $availableSeats, $busID, $routeID);

            // Update the schedule in the database
            $this->scheduleDAO->updateSchedule($schedule);

            // Redirect to the index page or show a success message
            header('Location: index.php');
            exit();
        } else {
            // Display the form to edit an existing schedule
            $schedule = $this->scheduleDAO->getScheduleById($scheduleID);
            // Include your view file (e.g., schedule/edit.php)
            include '../view/schedule/edit.php';
        }
    }

    public function delete($scheduleID)
    {
        // Handle the deletion of an existing schedule
        $this->scheduleDAO->deleteSchedule($scheduleID);
        // Redirect to the index page or show a success message
        header('Location: index.php');
        exit();
    }
}
