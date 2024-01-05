<?php
class UserController{

    function getAllUsers(){
        $users = new usersDAO();
        $usersDATA = $users->getAllUsers();
        include 'app/views/usersView.php';
    }

    function addUser(){
        $username = $_POST["username"] ; 
        $password = $_POST["password"] ; 
        $email = $_POST["email"] ; 
        $isActive = $_POST["isActive"] ; 
        $registrationDate = $_POST["registrationDate"] ; 
        $role = $_POST["role"] ; 
        if($_POST["companyID"]== 'NULL'){
            $companyID ='';
        }else{
            $companyID = $_POST["companyID"] ; 
        }
        $users = new usersDAO();
        $usersDATA = $users->addUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID);
        include('app/views/usersView.php');
    }
    
    function ShowAddUser(){
        $companyDAO = new companyDAO();
        $companyDATA = $companyDAO->getAllCompanies();
        include('app/views/addUser.php');
    }
    
    function updateForm(){
        $id = $_GET['id'];
        $usersDAO = new usersDAO();
        $usersDATA = $usersDAO->getAllUsers();
        // $routeDAO = new RouteDAO();
        // $routeDATA = $routeDAO->getAllRoute();
        // $horaire = new horaireDAO();
        // $horaireDATA = $horaire->getHoraireById($id);
        include 'app/views/updateHoraire.php';
    }

    function updateUser(){
        $id = $_GET['id'];
        $username = $_POST["username"] ; 
        $password = $_POST["password"] ; 
        $email = $_POST["email"] ; 
        $isActive = $_POST["isActive"] ; 
        $registrationDate = $_POST["registrationDate"] ; 
        $role = $_POST["role"] ; 
        $companyID = $_POST["companyID"] ; 
        $user = new usersDAO();
        $usersDATA = $user->UpdateUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID);
        include 'app/views/updateRoute.php';
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

    function disableUser(){
        $id = $_GET['id'];
        $user = new usersDAO();
        $user->disableUser($id);
    }
}
?>