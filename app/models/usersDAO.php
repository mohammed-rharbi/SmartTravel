<?php
    class usersDAO extends DatabaseDAO{

        public function addUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID){
            $insert = "INSERT INTO users VALUES(0,'$username', '$password', '$email', '$isActive', '$registrationDate', '$role', '$companyID')";
            $this->execute($insert);
            // header('Location:index.php?action=horaires');
        }
        
        
        public function getAllUsers(){
            $selectAll = "SELECT * from users";
            $usersDATA = array();
            $AllUsers = $this->fetchAll($selectAll);
            foreach($AllUsers as $user){
                $usersDATA[] = new Users($user['userID'],$user['username'],$user['password'],$user['email'],$user['isActive'],$user['registrationDate'],$user['role'],$user['companyID']);
            }
            return $usersDATA;
        }
        public function getUserById($id){
            $selectAll = "SELECT * from users where userID='$id'";
            $user = $this->fetch($selectAll);
                $userDATA = new Users($user['userID'],$user['username'],$user['password'],$user['email'],$user['isActive'],$user['registrationDate'],$user['role'],$user['companyID']);
            return $userDATA;
        }
        
        
        public function UpdateUser($username, $password, $email, $isActive, $registrationDate, $role, $companyID){
            $UpdateUser = "UPDATE users set username = '$username', password = '$password', email = '$email', isActive = '$isActive', registrationDate = '$registrationDate', role = '$role', companyID = '$companyID'";
            $this->execute($UpdateUser);
            // header('Location:index.php?action=horaires');
        }
        
        
        public function disableUser($userID){
            $disableUser = "UPDATE users set isActive = 0 where userID='$userID'";
            $this->execute($disableUser);
            header('Location:index.php?action=usersindex');
        }
    }
?>