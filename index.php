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
include_once __DIR__ . '/app/controllers/UserController.php';
include_once __DIR__ . '/app/models/Bus.php';
include_once __DIR__ . '/app/models/users.php';
include_once __DIR__ . '/app/models/BusDAO.php';
include_once __DIR__ . '/app/models/Route.php';
include_once __DIR__ . '/app/models/RouteDAO.php';
include_once __DIR__ . '/app/models/Schedule.php';
include_once __DIR__ . '/app/models/ScheduleDAO.php';
include_once __DIR__ . '/app/models/AuthDAO.php';
include_once __DIR__ . '/app/models/usersDAO.php';
include_once __DIR__ . '/app/models/companyDAO.php';
session_start();
// Routing.
if (isset($_GET['action'])) {
    $action = $_GET['action'];


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
            $controller->index();
            break;
        case 'buscreate':
            $controller = new BusController();
            $controller->create();
            break;
        case 'busstore':
            $controller = new BusController();
            $controller->store();
            break;
        case 'busedit':
            $controller = new BusController();
            $controller->edit($_GET['id']);
            break;
        case 'busupdate':
            $controller = new BusController();
            $controller->update($_GET['id']);
            break;
        case 'busdelete':
            $controller = new BusController();
            $controller->delete($_GET['id']);
            break;
        case 'busdestroy':
            $controller = new BusController();
            $controller->destroy($_GET['id']);
            break;
        case 'routeindex':

            $controller = new RouteController();
            $controller->index();
            break;
        case 'routecreate':
            $controller = new RouteController();
            $controller->create();
            break;
        case 'routestore':
            $controller = new RouteController();
            $controller->store();
            break;
        case 'routeedit':
            $controller = new RouteController();
            $controller->edit($_GET['id']);
            break;
        case 'routeupdate':
            $controller = new RouteController();
            $controller->update($_GET['id']);
            break;
        case 'routedelete':
            $controller = new RouteController();
            $controller->delete($_GET['id']);
            break;
        case 'routedestroy':
            $controller = new RouteController();
            $controller->destroy($_GET['id']);
            break;
        case 'scheduleindex':
            $controller = new ScheduleController();
            $controller->index();
            break;
        case 'schedulecreate':
            $controller = new ScheduleController();
            $controller->create();
            break;
        case 'schedulestore':
            $controller = new ScheduleController();
            $controller->store();
            break;
        case 'scheduleedit':
            $controller = new ScheduleController();
            $controller->edit($_GET['id']);
            break;
        case 'scheduleupdate':
            $controller = new ScheduleController();
            $controller->update($_GET['id']);
            break;
        case 'scheduledelete':
            $controller = new ScheduleController();
            $controller->delete($_GET['id']);
            break;
        case 'scheduledestroy':
            $controller = new ScheduleController();
            $controller->destroy($_GET['id']);
            break;
        case 'login':
            $controller = new AuthController();
            $controller->login();
            break;
        case 'login_As_Operator':
            $controller = new AuthController();
            $controller->loginAsOperator();
            break;
        case 'register':
            $controller = new AuthController();
            $controller->showRegisterForm();
            break;

        case 'register_store':
            $controller = new AuthController();
            $controller->register();
            break;

        case 'forgot_password':
            $controller = new AuthController();
            $controller->showForgotPasswordForm();
            break;

        case 'forgot_password_store':
            $controller = new AuthController();
            $controller->forgotPassword();
            break;

        case 'reset_password':
            // The token is usually passed as a parameter in the URL
            if (isset($_GET['token'])) {
                $token = $_GET['token'];
                $controller = new AuthController();
                $controller->resetPassword($token);
            } else {
                // Handle the case where the token is missing
                echo "Token is missing.";
            }
        case 'reset_password_store':
            $controller = new AuthController();
            $controller->resetPasswordStore();
            break;

        case 'adminPage':
            $controller = new AdminController();
            $controller->index();
            break;
        case 'clientPage':
            $controller = new ClientController();
            $controller->index();
            break;
        case 'operatorPage':
            $controller = new OperatorController();
            $controller->index();
            break;
        case 'usersindex':
            $userController = new UserController();
            $userController->getAllUsers();
            break;
        case 'showAddUser':
            $userController = new UserController();
            $userController->ShowAddUser();
            break;
        case 'ShowUserEdit':
            $userController = new UserController();
            $userController->ShowUserEdit();
            break;
        case 'UserEdit':
            $userController = new UserController();
            $userController->updateUser();
            break;
        case 'addUser':
            $userController = new UserController();
            $userController->addUser();
            break;
        case 'disable':
            $userController = new UserController();
            $userController->disableUser();
            break;
        case 'enable':
            $userController = new UserController();
            $userController->enableUser();
            break;

        default:
            $controller = new HomeController();
            $controller->index();
            break;
    }
} else {
    $controller = new HomeController();
    $controller->index();
}