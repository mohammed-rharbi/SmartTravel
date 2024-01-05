<?php
include_once 'DatabaseDAO.php';
include_once 'Auth.php';

class AuthDAO extends DatabaseDAO
{
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM Users WHERE email = :email";
        $params = [':email' => $email];
        $result = $this->fetch($query, $params);

        if ($result) {
            return new Auth(
                $result['userID'],
                $result['username'],
                $result['email'],
                $result['password'], // Assuming the plain text password is stored in 'password'
                $result['role'],
                $result['isActive'],
                $result['registrationDate'],
                $result['companyID']
            );
        }
        return null;
    }

    public function addUser($user)
    {
        $query = "INSERT INTO Users (username, password, email, isActive, registrationDate, role, companyID) 
                  VALUES (:username, :password, :email, :isActive, :registrationDate, :role, :companyID)";
        $params = [
            ':username' => $user->getUsername(),
            ':password' => $user->getPassword(),
            ':email' => $user->getEmail(),
            ':isActive' => $user->isActive(),
            ':registrationDate' => $user->getRegistrationDate(),
            ':role' => $user->getRole(),
            ':companyID' => $user->getCompanyID()
        ];

        return $this->execute($query, $params);
    }

    public function updatePassword($userId, $newPassword)
    {
        $query = "UPDATE Users SET password = :password WHERE userID = :userId";
        $parameters = array(':userId' => $userId, ':password' => $newPassword);

        return $this->execute($query, $parameters);
    }

    public function updateResetToken($userId, $resetToken)
    {
        $query = "UPDATE Users SET resetToken = :resetToken WHERE userID = :userId";
        $parameters = array(':userId' => $userId, ':resetToken' => $resetToken);

        return $this->execute($query, $parameters);
    }

    public function getUserIdByToken($token)
    {
        $query = "SELECT userID FROM Users WHERE resetToken = :token";
        $parameters = array(':token' => $token);

        $result = $this->fetch($query, $parameters);

        return ($result) ? $result['userID'] : null;
    }


}

?>