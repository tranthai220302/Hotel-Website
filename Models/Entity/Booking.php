<?php
    class Booking {
        private $id;
        private $idRoom;
        private $startDate;
        private $endDate;
        private $idUser;
        private $adults;
        private $childrens;
        private $price;
        private $isDelete;
        public function __construct($idRoom, $startDate, $endDate, $idUser, $id, $adults, $childrens, $price, $isDelete)
        {
            $this->id = $id;
            $this->idRoom = $idRoom;
            $this->startDate = $startDate;
            $this->endDate = $endDate;
            $this->idUser = $idUser;
            $this->adults = $adults;
            $this->childrens = $childrens;
            $this->price = $price;
            $this->isDelete = $isDelete;

        }
        public function getPrice(){
            return $this->price;
        }
        public function getIsDelete(){
            return $this->isDelete;
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