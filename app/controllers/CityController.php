<?php
include_once 'model/CityDAO.php';
class CityController
{
    private $routeDAO;

    public function __construct()
    {
        $this->routeDAO = new CityDAO();
    }

    public function indexCity()
    {
        // Display a list of routes
        $routes = $this->routeDAO->getAllCities();
        // Include your view file (e.g., route/index.php) to display the list
        include '../view/route/index.php';
    }
}
