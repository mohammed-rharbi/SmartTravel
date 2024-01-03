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
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userDAO->getUserByEmail($email);
            if ($user && password_verify($password, $user->getPassword())) {
                // Login successful
                $_SESSION['user'] = $user;

                // Redirect based on user role
                switch ($user->getRole()) {
                    case 'Admin':
                        header("Location: xxx.php");
                        break;
                    case 'Operator':
                        header("Location: xxx.php");
                        break;
                    case 'Client':
                        header("Location: xxx.php");
                        break;
                    default:
                        // Handle other roles if needed
                        break;
                }

                exit();
            } else {
                // Login failed
                // Handle error or redirect to login page with a message
            }
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
            $isActive = true; // You may set this based on your logic
            $registrationDate = date('Y-m-d');
            // Set the role to 'Client'
            $role = 'Client';
            $companyID = null;
            // You may want to add additional validation and error handling

            $user = new User(0, $username, $email, $password, $role, $isActive, $registrationDate, $companyID);

            // Add user to the database
            $this->userDAO->addUser($user);

            // Redirect to login page or show a success message
            header("Location: index.php?action=showLoginForm");
            exit();
        }
    }
}

?>