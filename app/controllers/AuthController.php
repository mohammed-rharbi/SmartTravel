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
                $this->handleSuccessfulLogin($user);
            } else {
                $this->handleFailedLogin();
            }
        } else {
            $this->displayLoginForm();
        }
    }

    private function comparePasswords($inputPassword, $storedPassword)
    {
        return $inputPassword === $storedPassword;
    }

    private function handleSuccessfulLogin($user)
    {
        $_SESSION['user'] = $user;
        error_log("User Role: " . $user->getRole());

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
                error_log("Unknown Role: " . $user->getRole());
                break;
        }
    }

    private function handleFailedLogin()
    {
        header("Location: index.php?action=login&error=1");
        exit();
    }

    private function displayLoginForm()
    {
        include_once 'app/views/auth/login.php';
    }

    public function showForgotPasswordForm()
    {
        include_once 'app/views/auth/forgot_password.php';
    }

    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $user = $this->authDAO->getUserByEmail($email);

            if ($user) {
                $token = bin2hex(random_bytes(32));
                error_log("Generated Token: $token");

                $this->authDAO->updateResetToken($user->getId(), $token);

                $resetLink = "http://localhost/Smarttravel/index.php?action=reset_password&token=" . urlencode($token);
                $to = $user->getEmail();
                $this->sendPasswordResetEmail($to, $resetLink);

                $this->handlePasswordResetSuccess();
            } else {
                $this->handlePasswordResetError();
            }
        } else {
            include_once 'app/views/auth/forgot_password.php';
        }
    }

    private function sendPasswordResetEmail($to, $resetLink)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = 'ss.ngnlzero@gmail.com';
            $mail->Password = 'jfwg nnun noyf lplj';

            $mail->setFrom('ss.ngnlzero@gmail.com', 'SmartTravel');
            $mail->addAddress($to);
            $mail->Subject = 'Password Reset';
            $mail->Body = "Click the following link to reset your password: $resetLink";

            $mail->send();
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    private function handlePasswordResetSuccess()
    {
        header("Location: index.php?action=login");
        exit();
    }

    private function handlePasswordResetError()
    {
        header("Location: index.php?action=forget_password&error=1");
        exit();
    }

    public function showResetPasswordForm()
    {
        include_once 'app/views/auth/reset_password.php';
    }

    public function resetPassword($token)
    {
        $userId = $this->authDAO->getUserIdByToken($token);

        if ($userId) {
            include_once 'app/views/auth/reset_password.php';
        } else {
            error_log("Invalid or expired token: $token");
            echo "Invalid or expired token. Please try again.";
        }
    }

    public function resetPasswordStore()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'];
            $email = $_POST['email'];
            $newPassword = $_POST['new_password'];

            $userId = $this->authDAO->getUserIdByToken($token);

            if ($userId) {
                $this->updatePassword($userId, $newPassword);
                $this->authDAO->updateResetToken($userId, null);

                header("Location: index.php?action=login");
                exit();
            } else {
                error_log("Invalid or expired token: $token");
                echo "Invalid or expired token. Please try again.";
            }
        } else {
            echo "Invalid access. Please use the provided form.";
        }
    }

    private function updatePassword($userId, $password)
    {
        $this->authDAO->updatePassword($userId, $password);
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
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $isActive = true;
            $registrationDate = date('Y-m-d');
            $role = 'Client';
            $companyID = null;

            $user = new Auth(0, $username, $email, $password, $role, $isActive, $registrationDate, $companyID);

            $this->authDAO->addUser($user);

            header("Location: index.php?action=login");
            exit();
        }
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}

?>