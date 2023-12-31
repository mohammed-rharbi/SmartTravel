<?php
include_once __DIR__ . '/app/controllers/AdminController.php';
include_once __DIR__ . '/app/controllers/HomeController.php';
include_once __DIR__ . '/app/controllers/BusController.php';
include_once __DIR__ . '/app/controllers/RouteController.php';
include_once __DIR__ . '/app/controllers/ScheduleController.php';
include_once __DIR__ . '/app/controllers/SearchController.php'; // Add SearchController
include_once __DIR__ . '/app/models/Bus.php';
include_once __DIR__ . '/app/models/BusDAO.php';
include_once __DIR__ . '/app/models/Route.php';
include_once __DIR__ . '/app/models/RouteDAO.php';
include_once __DIR__ . '/app/models/Schedule.php';
include_once __DIR__ . '/app/models/ScheduleDAO.php';

// Routing.
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case '/':
            $controller = new HomeController();
            $controller->index();
            break;
        case 'admin':
            $controller = new AdminController();
            $controller->index();
            break;
        case 'busindex':
            $controller = new BusController();
            $controller->index();
            break;
        case 'searchPage':
            $controller = new SearchController();
            $controller->index();
            break;
        default:
            $homeController = new HomeController();
            $homeController->index();
            break;
    }
} else {
    $homeController = new HomeController();
    $homeController->index();
}