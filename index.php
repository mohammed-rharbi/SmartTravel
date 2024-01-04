<?php

include_once __DIR__ . '/app/controllers/HomeController.php';
include_once __DIR__ . '/app/controllers/BusController.php';
include_once __DIR__ . '/app/controllers/RouteController.php';
include_once __DIR__ . '/app/controllers/ScheduleController.php';
include_once __DIR__ . '/app/controllers/SearchController.php';
include_once __DIR__ . '/app/controllers/FilterController.php';
include_once __DIR__ . '/app/controllers/AuthController.php';
include_once __DIR__ . '/app/controllers/AdminController.php';
include_once __DIR__ . '/app/controllers/ClientController.php';
include_once __DIR__ . '/app/controllers/OperatorController.php';
include_once __DIR__ . '/app/models/Bus.php';
include_once __DIR__ . '/app/models/BusDAO.php';
include_once __DIR__ . '/app/models/Route.php';
include_once __DIR__ . '/app/models/RouteDAO.php';
include_once __DIR__ . '/app/models/Schedule.php';
include_once __DIR__ . '/app/models/ScheduleDAO.php';
include_once __DIR__ . '/app/models/AuthDAO.php';
session_start();
// Routing.
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $routeController = new RouteController();
    $busController = new BusController();
    $scheduleController = new ScheduleController();
    $authController = new AuthController();
    $adminController = new AdminController();
    $clientController = new ClientController();
    $operatorController = new OperatorController();

    switch ($action) {
        case '/':
            $controller = new HomeController();
            $controller->index();
            break;
        case 'searchPage':
            $controller = new SearchController();
            $controller->index();
            break;
        case 'filterPage':
            $controller = new FilterController();
            $controller->index();
            break;
        case 'busindex':
            $controller = new BusController();
            $busController->index();
            break;
        case 'buscreate':
            $controller = new BusController();
            $busController->create();
            break;
        case 'busstore':
            $controller = new BusController();
            $busController->store();
            break;
        case 'busedit':
            $controller = new BusController();
            $busController->edit($_GET['id']);
            break;
        case 'busupdate':
            $controller = new BusController();
            $busController->update($_GET['id']);
            break;
        case 'busdelete':
            $controller = new BusController();
            $busController->delete($_GET['id']);
            break;
        case 'busdestroy':
            $controller = new BusController();
            $busController->destroy($_GET['id']);
            break;
        case 'routeindex':

            $controller = new RouteController();
            $routeController->index();
            break;
        case 'routecreate':
            $controller = new RouteController();
            $routeController->create();
            break;
        case 'routestore':
            $controller = new RouteController();
            $routeController->store();
            break;
        case 'routeedit':
            $controller = new RouteController();
            $routeController->edit($_GET['id']);
            break;
        case 'routeupdate':
            $controller = new RouteController();
            $controller->update($_GET['id']);
            break;
        case 'routedelete':
            $controller = new RouteController();
            $routeController->delete($_GET['id']);
            break;
        case 'routedestroy':
            $controller = new RouteController();
            $routeController->destroy($_GET['id']);
            break;
        case 'scheduleindex':
            $controller = new ScheduleController();
            $scheduleController->index();
            break;
        case 'schedulecreate':
            $controller = new ScheduleController();
            $scheduleController->create();
            break;
        case 'schedulestore':
            $controller = new ScheduleController();
            $scheduleController->store();
            break;
        case 'scheduleedit':
            $controller = new ScheduleController();
            $scheduleController->edit($_GET['id']);
            break;
        case 'scheduleupdate':
            $controller = new ScheduleController();
            $scheduleController->update($_GET['id']);
            break;
        case 'scheduledelete':
            $controller = new ScheduleController();
            $scheduleController->delete($_GET['id']);
            break;
        case 'scheduledestroy':
            $controller = new ScheduleController();
            $scheduleController->destroy($_GET['id']);
            break;
        case 'login':
            $controller = new AuthController();
            $authController->showloginForm();
            break;
        case 'login_store':
            $controller = new AuthController();
            $authController->login();
            break;
        case 'register':
            $controller = new AuthController();
            $authController->showRegisterForm();
            break;
        case 'logout':
            $controller = new AuthController();
            $authController->logout();
            break;
        case 'register_store':
            $controller = new AuthController();
            $authController->register();
            break;
        case 'adminPage':
            $controller = new AdminController();
            $adminController->index();
            break;
        case 'clientPage':
            $controller = new ClientController();
            $clientController->index();
            break;
        case 'operatorPage':
            $controller = new OperatorController();
            $operatorController->index();
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