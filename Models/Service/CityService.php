<?php
    include_once('../Models/Entity/City.php');
    class CityService
    {
        public function __construct() {}

        public function getListCity() {
            include_once('../Models/connect_db.php');
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
    }

?>