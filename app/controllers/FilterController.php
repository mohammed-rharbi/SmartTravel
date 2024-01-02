<?php
// session_start();
class FilterController
{
    public function index()
    {
        if (isset($_SESSION['departureCity']) && isset($_SESSION['arrivalCity']) && isset($_SESSION['travelDate']) && isset($_SESSION['numPeople'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $startDate = new DateTime($_POST['startDate']);
                $endDate = new DateTime($_POST['endDate']);
                $com = $_POST['Company'];
                $price = $_POST['Price'];
                $departureCityID = $_SESSION['departureCity'];
                $arrivalCityID = $_SESSION['arrivalCity'];
                $travelDate = $_SESSION['travelDate'];
                $numPeople = $_SESSION['numPeople'];
                $scheduleDAO = new ScheduleDAO();
                // Define the variables before calling the method
                $date = $travelDate;
                $endCity = $arrivalCityID;
                $startCity = $departureCityID;
                $places = $numPeople;


                $availableSchedules = $scheduleDAO->getScheduelByEndCityStartCity($date, $endCity, $startCity, $places);
                $cm = array();
                if ($price && $com && ($startDate && $endDate)) {
                    foreach ($availableSchedules as $availabel) {
                        $scheduleDate = new DateTime($availabel->getDate());
                        if ($availabel->getBusID()->getCompany()->getCompanyID() == $com && $availabel->getPrice() <= $price && $startDate <= $scheduleDate && $endDate >= $scheduleDate) {

                            $cm[] = $availabel;
                        }
                    }
                } else if ($price) {
                    foreach ($availableSchedules as $availabel) {
                        if ($availabel->getPrice() <= $price) {

                            $cm[] = $availabel;
                        }
                    }

                } else if ($com) {
                    foreach ($availableSchedules as $availabel) {
                        if ($availabel->getBusID()->getCompany()->getCompanyID() == $com) {

                            $cm[] = $availabel;
                        }
                    }

                } else if ($startDate && $endDate) {
                    foreach ($availableSchedules as $availabel) {
                        $scheduleDate = new DateTime($availabel->getDate());
                        if ($scheduleDate >= $startDate && $scheduleDate <= $endDate) {

                            $cm[] = $availabel;
                        }
                    }

                } else {
                    header("Location: index.php");
                    exit();
                }
                // Pass the data to the view
                include_once 'app/views/filterPage.php';
            } else {
                // Handle other cases or redirect to home if needed
                header("Location: index.php");
                exit();
            }
        } else {
            header("Location: index.php");
            exit();
        }


    }
}