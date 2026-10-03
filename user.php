<?php
class User {
    private $userId, $firstName, $lastName, $email, $password;
    private $streetAddress, $city, $state, $zipCode, $phone;

    public function __construct($firstName, $lastName, $email, $password, $userId = null,
                                $streetAddress = '', $city = '', $state = '', $zipCode = '', $phone = '') {
        $this->firstName=$firstName; $this->lastName=$lastName; $this->email=$email;
        $this->password=$password; $this->userId=$userId; $this->streetAddress=$streetAddress;
        $this->city=$city; $this->state=$state; $this->zipCode=$zipCode; $this->phone=$phone;
    }
    public function getUserId(){return $this->userId;}
    public function getFirstName(){return $this->firstName;}
    public function getLastName(){return $this->lastName;}
    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;}
    public function getStreetAddress(){return $this->streetAddress;}
    public function getCity(){return $this->city;}
    public function getState(){return $this->state;}
    public function getZipCode(){return $this->zipCode;}
    public function getPhone(){return $this->phone;}
}
?>
