<?php
    class Hotel {
        private $idHotel;
        private $nameHotel;
        private $description;
        private $numRoom;
        private $numStart;
        private $idCity;
        private $imgHotel;
        private $address;
            
        public function __construct($idHotel, $nameHotel, $numRoom, $description, $numStart, $idCity, $imgHotel, $address)
        {
            $this->idHotel = $idHotel;
            $this->nameHotel = $nameHotel;
            $this->numRoom = $numRoom;
            $this->description = $description;
            $this->numStart = $numStart;    
            $this->idCity = $idCity;
            $this->imgHotel = $imgHotel;
            $this->address = $address;


        }
        public function getAddress()
        {
            return $this->address;
        }
        public function getidHotel() {
            return $this->idHotel;
        }
        public function getnameHotel() {
            return $this->nameHotel;
        }
        public function getnumRoom() {
            return $this->numRoom;
        }
        public function getdescription() {
            return $this->description;
        }
        public function getnumStart() {
            return $this->numStart;
        }
        public function setnameHotel($nameHotel) {
            $this->nameHotel = $nameHotel;
        }
        public function setnumRoom($numRoom) {
            $this->numRoom = $numRoom;   
        }
        public function getidCity() 
        {
           return  $this->idCity;
        }
        public function getImg()
        {
            return $this->imgHotel;
        }

    }
?>