<?php
    class Booking {
        private $id;
        private $idRoom;
        private $startDate;
        private $endDate;
        private $idUser;
        private $adults;
        private $childrens;
        public function __construct($idRoom, $startDate, $endDate, $idUser, $id, $adults, $childrens)
        {
            $this->id = $id;
            $this->idRoom = $idRoom;
            $this->startDate = $startDate;
            $this->endDate = $endDate;
            $this->idUser = $idUser;
            $this->adults = $adults;
            $this->childrens = $childrens;

        }
        public function getAdults(){
            return $this->adults;
        }
        public function getChildrens(){
            return $this->childrens;
        }
        public function getstartDate()
        {
            return $this->startDate;
        }
        public function getendDate()
        {
            return $this->endDate;
        }
        public function getId(){
            return $this->id;
        }
        public function getIdUsder(){
            return $this->idUser;
        }
        public function getIdRoom(){
            return $this->idRoom;
        }

    }
?>