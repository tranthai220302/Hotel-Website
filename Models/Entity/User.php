<?php
    class User {
        private $id;
        private $username;
        private $email;
        private $password;
        private $isAdmin;
        private $address;
        private $phoneNumber;
        private $img;
        private $firstName;
        private $lastName;
        private $numRoom;
        private $isHotel;
            
        public function __construct($id, $username, $password, $email, $isAdmin, $address, $phoneNumber, $img, $firstName, $lastName,$numRoom,  $isHotel)
        {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->isAdmin = $isAdmin;    
            $this->address = $address;
            $this->phoneNumber = $phoneNumber;
            $this->img = $img;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->numRoom = $numRoom;
            $this->isHotel = $isHotel;
        }
        public function getIsHotel(){
            return $this->isHotel;
        }
        public function getnumRoom()
        {
            return $this->numRoom;
        }
        public function getId() {
            return $this->id;
        }
        public function getUsername() {
            return $this->username;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getIsAdmin() {
            return $this->isAdmin;
        }
        public function setUsername($username) {
            $this->username = $username;
        }
        public function setPassword($password) {
            $this->password = $password;   
        }
        public function getAddress() 
        {
           return  $this->address;
        }
        public function getPhone()
        {
            return $this->phoneNumber;
        }
        public function getImg()
        {
            return $this->img;
        }
        public function getFirstName()
        {
            return $this->firstName;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

    }
?>