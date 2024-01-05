<?php
include_once 'model/usersDAO.php';
include_once 'model/companyDAO.php';

class UserController
{

    function getAllUserss()
    {
        $users = new usersDAO();
        $usersDATA = $users->getAllUsers();
        include 'view\horaireView.php';
    }

    function addUser()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $isActive = $_POST["isActive"];
        $registrationDate = $_POST["registrationDate"];
        $role = $_POST["role"];
        $companyID = $_POST["companyID"];
        $users = new usersDAO();
        $usersDATA = $users->addUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID);
        include('view/addUser.php');
    }

    function ShowAddUser()
    {
        $usersDAO = new usersDAO();
        $usersDATA = $usersDAO->getAllUsers();
        $companyDAO = new companyDAO();
        $companyDATA = $companyDAO->getAllCompanies();
        include('view/addUser.php');
    }

    function updateForm()
    {
        $id = $_GET['id'];
        $usersDAO = new usersDAO();
        $usersDATA = $usersDAO->getAllUsers();
        // $routeDAO = new RouteDAO();
        // $routeDATA = $routeDAO->getAllRoute();
        // $horaire = new horaireDAO();
        // $horaireDATA = $horaire->getHoraireById($id);
        include 'view/updateHoraire.php';
    }

    function updateUser()
    {
        $id = $_GET['id'];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $isActive = $_POST["isActive"];
        $registrationDate = $_POST["registrationDate"];
        $role = $_POST["role"];
        $companyID = $_POST["companyID"];
        $user = new usersDAO();
        $usersDATA = $user->UpdateUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID);
        include 'view/updateRoute.php';
    }
    // function searchHoraire(){
    //     $vDepart = $_POST["vDepart"] ; 
    //     $vArrivee = $_POST["vArrivee"] ; 
    //     $date = $_POST["date"] ; 
    //     $NumCustom = $_POST["NumCustom"] ; 
    //     $horaire = new horaireDAO();
    //     $horaireDATA = $horaire->searchHoraires($vDepart,$vArrivee,$date,$NumCustom);

    //     $ville = new VilleDAO();
    //     $villesDATA = $ville->getAllVilles();
    //     include 'view/homeUser.php';
    // }

    function disableUser()
    {
        $id = $_GET['id'];
        $user = new usersDAO();
        $user->disableUser($id);
    }
}
?>