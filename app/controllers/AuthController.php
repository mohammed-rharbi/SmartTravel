<?php

class AuthController
{
    private $authDAO;

    public function __construct()
    {
        $this->authDAO = new AuthDAO();
    }

    public function showLoginForm()
    {
        include_once 'app/views/auth/login.php';
    }

    // UserController.php

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->authDAO->getUserByEmail($email);

            if ($user) {

                // Login successful
                $_SESSION['user'] = $user;

                // Debugging: Output user role
                error_log("User Role: " . $user->getRole());

                // Redirect based on user role
                switch ($user->getRole()) {
                    case 'Admin':
                        header("Location: index.php?action=adminPage");
                        exit();
                    case 'Operator':
                        header("Location: index.php?action=operatorPage");
                        exit();
                    case 'Client':
                        header("Location: index.php?action=clientPage");
                        exit();
                    default:
                        // Debugging: Output unknown role
                        error_log("Unknown Role: " . $user->getRole());
                        break;
                }

            } else {
                // Login failed
                header("Location: index.php?action=login&error=1");
                exit();
            }
            // Redirect to login page with an error message
            header("Location: index.php?action=login&error=1");
            exit();
        } else {
            // Display login form
            include_once 'app/views/auth/login.php';
        }
    }



    public function showRegisterForm()
    {
        include_once 'app/views/auth/register.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process registration data
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $isActive = true;
            $registrationDate = date('Y-m-d');
            $role = 'Client';
            $companyID = null;

            $user = new Auth(0, $username, $email, $password, $role, $isActive, $registrationDate, $companyID);

            // Add user to the database
            $this->authDAO->addUser($user);

            // Redirect to login page or show a success message
            header("Location: index.php?action=login");
            exit();
        }
    }
    public function logout()
    {

        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to the login page or any other page as needed
        header("Location: index.php?action=login");
        exit();
    }
}

?>