<?php
    class City {
        private $idCity;
        private $nameCity;
        private $description;
        private $numHotels;
        private $imgCity;
            
        public function __construct($idCity, $nameCity, $numHotels, $description, $imgCity)
        {
            $this->idCity = $idCity;
            $this->nameCity = $nameCity;
            $this->numHotels = $numHotels;
            $this->description = $description;
            $this->imgCity = $imgCity;

        }
        public function getidCity() {
            return $this->idCity;
        }
        public function getnameCity() {
            return $this->nameCity;
        }
        public function getnumHotels() {
            return $this->numHotels;
        }
        public function getdescription() {
            return $this->description;
        }
        public function setnameCity($nameCity) {
            $this->nameCity = $nameCity;
        }
        public function setnumHotels($numHotels) {
            $this->numHotels = $numHotels;   
        }

        public function getImg()
        {
            return $this->imgCity;
        }

    }
?>