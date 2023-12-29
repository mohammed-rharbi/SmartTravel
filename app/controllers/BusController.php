<?php

include_once 'model/BusDAO.php';

class BusController
{
    private $busDAO;

    public function __construct()
    {
        $this->busDAO = new BusDAO();
    }

    public function indexBus()
    {
        // Fetch all buses from the database
        $buses = $this->busDAO->getAllBuses();
        // Set the $buses variable for the view
        include "view\bus\busIndex.php";
    }
    public function addBus(){
        $busNumber = $_POST['busNumber'];
        $licensePlate = $_POST['licensePlate'];
        $companyID = $_POST['companyID'];
        $capacity = $_POST['capacity'];
        $bus=new Bus(0,$busNumber,$licensePlate,$companyID,$capacity);
        $this->busDAO->addBus($bus);
        include "view/bus/add.php";

    }
    // You can implement methods for other CRUD operations here
}
