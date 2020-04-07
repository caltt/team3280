<?php

// Tong
// jsonSerialize() added

class AdminLogin{

    // // AdminUserId VARCHAR(45) NOT NULL UNIQUE,
    // // AdminPassword VARCHAR(45) NOT NULL UNIQUE,
    // EmployeeUserId VARCHAR(45) NOT NULL UNIQUE,
    // EmployeePassword VARCHAR(45) NOT NULL UNIQUE,

    //For Admin
    private $AdminUserId="";
    private $AdminPassword="";
    


    //Setter
    public function setAdminUserId($newAdminUserId) {
        $this->AdminUserId = $newAdminUserId;
    }
    public function setAdminPassword($newAdminPassword) {
        $this->AdminPassword = $newAdminPassword;
    }
   
    //Getter 
    public function getAdminUserId():string {
        return $this->AdminUserId;
    }
    public function getAdminUserPassword():string {
        return $this->AdminPassword;
    }
   
    //Verify the Admin password
    public function verifyAdminPassword(string $passwordToVerify) {
        return password_verify($passwordToVerify, $this->AdminPassword);
    }

    public function jsonSerialize(){
        return get_object_vars($this); 
    }

}

?>