<?php

class User
{
    private $userID;
    private $username;
    private $password; // Make sure to hash passwords before storing in the database
    private $email;

    // Add other properties as needed

    public function __construct($userID, $username, $password, $email)
    {
        $this->userID = $userID;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    // Add getters and setters as needed
    // Example:
    public function getUserID()
    {
        return $this->userID;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
}