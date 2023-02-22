<?php
    class User {
        private $id;
        private $username;
        private $email;
        private $password;
        private $isAdmin;
            
        public function __construct($id, $username, $password, $email, $isAdmin)
        {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->isAdmin = $isAdmin;    
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
    }
?>