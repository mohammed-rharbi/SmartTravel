<?php

include_once 'DatabaseDAO.php';
include_once 'UserDAO.php';


class UserDAO extends DatabaseDAO
{
    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $params = [':username' => $username];

        $result = $this->fetch($query, $params);

        if ($result) {
            return new User($result['userID'], $result['username'], $result['password'], $result['email']);
        } else {
            return null;
        }
    }

    public function createUser($username, $password, $email)
    {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $params = [
            ':username' => $username,
            ':password' => $hashedPassword,
            ':email' => $email,
        ];

        return $this->execute($query, $params);
    }

    // Add other methods as needed for user management
    // Example: updateUser, deleteUser, etc.
}