<?php

class Users {
    private $id;
    private $userName;
    private $password;
    private $email;
    private $isActive;
    private $registrationDate;
    private $role;

    public function __construct($id, $userName, $password, $email, $isActive, $registrationDate, $role) {
        $this->id = $id;
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
        $this->isActive = $isActive;
        $this->registrationDate = $registrationDate;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function getRegistrationDate() {
        return $this->registrationDate;
    }

    public function getRole() {
        return $this->role;
    }
}


?>