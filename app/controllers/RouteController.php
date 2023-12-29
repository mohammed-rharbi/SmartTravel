<?php
include_once 'model/RouteDAO.php';
class RouteController
{
    private $routeDAO;

    public function __construct()
    {
        $this->routeDAO = new RouteDAO();
    }

    public function add()
    {
        // Handle the addition of a new route
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $startCityID = $_POST['startCityID'];
            $endCityID = $_POST['endCityID'];
            $distance = $_POST['distance'];
            $duration = $_POST['duration'];

            // Create a Route object
            $route = new Route(null, $startCityID, $endCityID, $distance, $duration);

            // Add the route to the database
            $this->routeDAO->addRoute($route);

            // Redirect to the index page or show a success message
            header('Location: index.php');
            exit();
        } else {
            // Display the form to add a new route
            // Include your view file (e.g., route/add.php)
            include '../view/route/add.php';
        }
    }

    public function edit($routeID)
    {
        // Handle the editing of an existing route
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the form data
            $startCityID = $_POST['startCityID'];
            $endCityID = $_POST['endCityID'];
            $distance = $_POST['distance'];
            $duration = $_POST['duration'];

            // Create a Route object
            $route = new Route($routeID, $startCityID, $endCityID, $distance, $duration);

            // Update the route in the database
            $this->routeDAO->updateRoute($route);

            // Redirect to the index page or show a success message
            header('Location: index.php');
            exit();
        } else {
            // Display the form to edit an existing route
            $route = $this->routeDAO->getRouteById($routeID);
            // Include your view file (e.g., route/edit.php)
            include '../view/route/edit.php';
        }
    }

    public function delete($routeID)
    {
        // Handle the deletion of an existing route
        $this->routeDAO->deleteRoute($routeID);
        // Redirect to the index page or show a success message
        header('Location: index.php');
        exit();
    }
}
