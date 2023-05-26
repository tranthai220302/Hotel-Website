<?php
    include_once('../Models/Entity/City.php');
    class CityService
    {
        public function __construct() {}

        public function getListCity() {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            $sql = "select * from city";
            $result = mysqli_query($con, $sql);
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $citys[$i++] = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
                $i++;
            }
            mysqli_free_result($result);
            mysqli_close($con);
            return $citys;
        }
        public function getCityBy($idCity){
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            $sql = "select * from city where idCity = '".$idCity."'";
            $result = mysqli_query($con, $sql);
            $row =  mysqli_fetch_assoc($result);
            $citys = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
            mysqli_free_result($result);
            mysqli_close($con);
            return $citys;
        }
    }

?>