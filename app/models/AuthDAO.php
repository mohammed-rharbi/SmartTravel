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
                $result['password'],
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
            ':password' => $user->getPassword(), // Hashed password
            ':email' => $user->getEmail(),
            ':isActive' => $user->isActive(),
            ':registrationDate' => $user->getRegistrationDate(),
            ':role' => $user->getRole(),
            ':companyID' => $user->getCompanyID()
        ];

        return $this->execute($query, $params);
    }
}

?>