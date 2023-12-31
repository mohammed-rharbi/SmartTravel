<?php

class BusController
{
    private $busDAO;

    public function __construct()
    {
        $this->busDAO = new BusDAO();
    }

    public function index()
    {
        // Fetch all buses from the database
        $buses = $this->busDAO->getAllBuses();

        include_once 'app/views/bus/index.php';
    }

    public function create()
    {
        // Example: Render the form for creating a new bus
        include( '/app/views/bus/create.php');
    }

    public function store()
    {
        // Example: Save the new bus to the database
        // Retrieve form data using $_POST or another method
        // $this->busDAO->addBus($formData);

        // Redirect back to the list of buses
        header("Location: /bus");
    }

    public function edit($id)
    {
        // Example: Fetch the bus by ID from the database
        $bus = $this->busDAO->getBusById($id);

        // Example: Render the form for editing the bus
        include( '/app/views/bus/edit.php');
    }

    public function update($id)
    {
        // Example: Update the bus in the database
        // Retrieve form data using $_POST or another method
        // $this->busDAO->updateBus($id, $formData);

        // Redirect back to the list of buses
        header("Location: /bus");
    }

    public function destroy($id)
    {
        // Example: Delete the bus from the database
        // $this->busDAO->deleteBus($id);

        // Redirect back to the list of buses
        header("Location: /bus");
    }
}