<?php
    class Review {
        private $idReview;
        private $idUser;
        private $idHotel;
        private $description;
        private $numStar;
        private $imgUser;
        private $nameUser;
        private $time;
        public function __construct($idUser, $idHotel, $numStar, $description, $idReview, $imgUser, $nameUser, $time)
        {
            $this->idUser = $idUser;
            $this->idHotel = $idHotel;
            $this->numStar = $numStar;
            $this->description = $description;
            $this->idReview = $idReview;
            $this->imgUser = $imgUser;
            $this->nameUser = $nameUser;
            $this->time = $time;
        }
        public function getTime()
        {
            return $this->time;
        }
        public function getimgUser() {
            return $this->imgUser;
        }
        public function getnameUser() {
            return $this->nameUser;
        }
        public function getidUser() {
            return $this->idUser;
        }
        public function getidHotel() {
            return $this->idHotel;
        }
        public function getnumStar() {
            return $this->numStar;
        }
        public function getdescription() {
            return $this->description;
        }
        public function setidHotel($idHotel) {
            $this->idHotel = $idHotel;
        }
        public function setnumStar($numStar) {
            $this->numStar = $numStar;   
        }
        public function getidReview()
        {
            return $this->idReview;
        }


    }
?>