<?php
include_once 'app\models\usersDAO.php';
include_once 'app/models/companyDAO.php';

class UserController
{

    function getAllUsers()
    {
        $users = new usersDAO();
        $usersDATA = $users->getAllUsers();
        include 'app/views/usersView.php';
    }


    function addUser(){
        $username = $_POST["username"] ; 
        $password = $_POST["password"] ; 
        $email = $_POST["email"] ; 
        $isActive = $_POST["isActive"] ; 
        $registrationDate = date("Y-m-d H:i:s");
        $role = $_POST["role"] ; 
        $companyID =$_POST["companyID"];

        $users = new usersDAO();
        $users->addUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID);
        include('app/views/usersView.php');
    }

    


    function ShowAddUser()
    {
        $usersDAO = new usersDAO();
        $usersDATA = $usersDAO->getAllUsers();

        $companyDAO = new companyDAO();
        $companyDATA = $companyDAO->getAllCompanies();
        include('app/views/addUser.php');
    }
    function ShowUserEdit()
    {
        $userId = $_GET['id'];
        $usersDAO = new usersDAO();
        $userDATA = $usersDAO->getUserById($userId);
        $companyDAO = new companyDAO();
        $companyDATA = $companyDAO->getAllCompanies();
        include('app/views/updateUser.php');
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
        $user->UpdateUser($id,$username, $password, $email, $isActive, $registrationDate, $role, $companyID);
        include 'app/views/updateUser.php';
    }

    function disableUser()
    {
        $id = $_GET['id'];
        $user = new usersDAO();
        $user->disableUser($id);
    }
    function enableUser()
    {
        $id = $_GET['id'];
        $user = new usersDAO();
        $user->enableUser($id);
    }
}
?>