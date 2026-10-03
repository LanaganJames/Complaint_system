<?php
class Employee {
    private $employeeId,$userId,$firstName,$lastName,$email,$phoneExtension,$password,$level;
    public function __construct($employeeId,$userId,$firstName,$lastName,$email,$phoneExtension,$password,$level){
        $this->employeeId=$employeeId;$this->userId=$userId;$this->firstName=$firstName;$this->lastName=$lastName;$this->email=$email;$this->phoneExtension=$phoneExtension;$this->password=$password;$this->level=$level;
    }
    public function getEmployeeId(){return $this->employeeId;} public function getUserId(){return $this->userId;}
    public function getFirstName(){return $this->firstName;} public function getLastName(){return $this->lastName;}
    public function getEmail(){return $this->email;} public function getPhoneExtension(){return $this->phoneExtension;}
    public function getPassword(){return $this->password;} public function getLevel(){return $this->level;}
}
?>
