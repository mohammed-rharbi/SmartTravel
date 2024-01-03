<?php

class UserController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the login form data
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Authenticate user, you can use your logic here

            // Example: Check if the user exists and password matches
            $user = $this->userDAO->getUserByEmail($email);

            if ($user && password_verify($password, $user->getPassword())) {
                // User is authenticated, redirect to the dashboard or another page
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                // Authentication failed, display an error message or redirect to login page
                echo "Invalid email or password.";
            }
        }

        // Display the login form (include 'login.php')
        include 'app/views/auth/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process the registration form data
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $fullName = $_POST['fullName'];

            // Create a new User object
            $newUser = new User($username, $email, $password, $fullName);

            // Add the new user to the database (you need to implement this)
            $this->userDAO->addUser($newUser);

            // Redirect to the login page or another page after successful registration
            header("Location: index.php?action=login");
            exit();
        }

        // Display the registration form (include 'register.php')
        include 'app/views/auth/register.php';
    }

    // Add more methods as needed

}

?>