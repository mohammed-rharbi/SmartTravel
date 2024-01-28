<?php

require 'app/PHPMailer/src/PHPMailer.php';
require 'app/PHPMailer/src/Exception.php';
require 'app/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->authDAO->getUserByEmail($email);

            if ($user && $this->comparePasswords($password, $user->getPassword())) {
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
        } else {
            // Display login form
            include_once 'app/views/auth/login.php';
        }
    }

    private function comparePasswords($inputPassword, $storedPassword)
    {
        // Use appropriate password comparison method
        return $inputPassword === $storedPassword;
    }

    public function showForgotPasswordForm()
    {
        include_once 'app/views/auth/forgot_password.php';
    }

    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<p style="color: red;">Error: Invalid email or user not found.</p>';

            // Get email from the form
            $email = $_POST['email'];

            // Check if the email exists in the database
            $user = $this->authDAO->getUserByEmail($email);

            if ($user) {
                // Generate a unique token for password reset
                $token = bin2hex(random_bytes(32));

                // Store the token and its expiration time in the database
                $this->authDAO->updateResetToken($user->getId(), $token);

                // Send an email to the user with a link to reset their password
                $resetLink = "http://localhost/index.php?action=reset_password&token=$token";

                // Implement your email sending logic here
                $this->sendPasswordResetEmail($user->getEmail(), $resetLink);

                // You can customize the success message or redirect as needed
                header("Location: index.php?action=login");
                exit();
            } else {
                // You can customize the error message or redirect as needed
                header("Location: index.php?action=forget_password&error=1");
                exit();
            }
        } else {
            // Display forget password form
            include_once 'app/views/auth/forgot_password.php';
        }
    }

    private function sendPasswordResetEmail($to, $resetLink)
    {
        $mail = new PHPMailer(true);

        try {
            // Set up your SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_username';
            $mail->Password = 'your_password';

            // Set up email parameters
            $mail->setFrom('your_email@example.com', 'Your Name');
            $mail->addAddress($to);
            $mail->Subject = 'Password Reset';
            $mail->Body = "Click the following link to reset your password: $resetLink";

            // Send the email
            $mail->send();
        } catch (Exception $e) {
            // Handle exception
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function showResetPasswordForm()
    {
        include_once 'app/views/auth/reset_password.php';
    }

    public function resetPassword($token)
    {
        // Check if the token exists in the database
        $userId = $this->authDAO->getUserIdByToken($token);

        if ($userId) {
            // Token is valid, show the reset password form
            include_once 'app/views/auth/reset_password.php';
        } else {
            // Token is invalid or expired, show an error message or redirect
            echo "Invalid or expired token. Please try again.";
        }
    }

    public function updatePassword($userId, $password)
    {
        // Update the user's password in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->authDAO->updatePassword($userId, $hashedPassword);

        // Redirect to the login page or any other page as needed
        header("Location: index.php?action=login");
        exit();
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

            // Create a new Auth instance without hashing the password
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