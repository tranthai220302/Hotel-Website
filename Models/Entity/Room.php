<?php
    class Room {
        private $idRoom;
        private $nameRoom;
        private $description;
        private $idHotel;
        private $Price;
        private $imgRoom;
        private $adult;
        private $children;
        private $isbook;
        public function __construct($idRoom, $nameRoom, $idHotel, $description, $Price,  $imgRoom, $adult, $children, $isbook)
        {
            $this->idRoom = $idRoom;
            $this->nameRoom = $nameRoom;
            $this->idHotel = $idHotel;
            $this->description = $description;
            $this->Price = $Price;    
            $this->imgRoom = $imgRoom;
            $this->adult = $adult;
            $this->children = $children;
            $this ->isbook = $isbook;


        }
        public function getAdult()
        {
            return $this->adult;
        }
        public function getChildren()
        {
            return $this->children;
        }
        public function getIsbook()
        {
            return $this->isbook;
        }
        public function getidRoom() {
            return $this->idRoom;
        }
        public function getnameRoom() {
            return $this->nameRoom;
        }
        public function getidHotel() {
            return $this->idHotel;
        }
        public function getdescription() {
            return $this->description;
        }
        public function getPrice() {
            return $this->Price;
        }
        public function setnameRoom($nameRoom) {
            $this->nameRoom = $nameRoom;
        }
        public function setidHotel($idHotel) {
            $this->idHotel = $idHotel;   
        }
        public function getImg()
        {
            return $this->imgRoom;
        }

    }
?>