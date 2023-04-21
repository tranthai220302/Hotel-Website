<?php
    include_once('../Models/Entity/Hotel.php');
    include_once('../Models/Entity/Room.php');
    include_once('../Models/Entity/City.php');
    include_once('../Models/Entity/Review.php');
    include_once('../Models/Entity/User.php');
    class HotelService
    {
        public function __construct() {}
        public function searchItem($search_Val, $idCity, $page, $searchItem)
        {
            include_once('../Models/connect_db.php');
            include_once('../Models/ExitRoom.php');
            $limit = 4;
            $start = ($page - 1) * $limit;
            $sql = "SELECT * FROM hotels WHERE $searchItem LIKE '%$search_Val%' AND idCity = $idCity";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result)/$limit;
            $sql = "SELECT * FROM  hotels Where $searchItem LIKE '%$search_Val%' AND idCity = $idCity LIMIT $start, $limit";
            $result = mysqli_query($con, $sql);
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $hotels[$i++] = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address']);
                $i++;
            }
            $sql ="SELECT *FROM city WHERE idCity=$idCity";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($result)) {
                $citys = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
            }
            mysqli_free_result($result);
            mysqli_close($con);
            if(isset($hotels))
            {
                $arr = array();
                $arr['hotels'] = $hotels;
                $arr['numPage'] = ceil($num);
                $arr['page']= $page;
                $arr['nameCity'] = $citys->getnameCity();
                return $arr;
            }else{
                return "Không có khách sạn";
            }
        }
        public function getListHotel($id, $page) {
            include_once('../Models/connect_db.php');
            include_once('../Models/ExitRoom.php');
            $limit = 4;
            $start = ($page - 1) * $limit;
            $sql = "SELECT * FROM hotels  Where idCity=$id";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result)/$limit;
            $sql = "SELECT * FROM hotels  Where idCity=$id LIMIT $start, $limit";
            $result = mysqli_query($con, $sql);
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $hotels[$i++] = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address']);
                $i++;
            }
            $sql ="SELECT *FROM city WHERE idCity=$id";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($result)) {
                $citys = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
            }
            mysqli_free_result($result);
            mysqli_close($con);
            if(isset($hotels))
            {
                $arr = array();
                $arr['hotels'] = $hotels;
                $arr['numPage'] = ceil($num);
                $arr['page']= $page;
                $arr['nameCity'] = $citys->getnameCity();
                return $arr;
            }else{
                return "Không có khách sạn";
            }
        }
        public function addHotel($nameHotel, $nummStar, $description, $imgHotel, $idCity, $address)
        {
            include_once('../Models/connect_db.php');
            include_once('../Models/ExitRoom.php');
            $sql = "INSERT INTO hotels (nameHotel, numStart, Description, imgHotel, idCity, address)
            VALUES ('$nameHotel', '$nummStar', '$description', '$imgHotel', '$idCity', '$address')";

            $result = mysqli_query($con, $sql);
            if($result)
            {
                $sql = "UPDATE city
                SET NumHotels = NumHotels + 1
                WHERE IdCity = $idCity";
                $result = mysqli_query($con, $sql);
                if($result)
                {
                    return true;
                }
            }
            return false;
         }
         public function deleteHotel($idHotel, $idCity)
         {
            include_once('../Models/connect_db.php');
            include_once('../Models/ExitRoom.php');
            $sql = "DELETE FROM hotels WHERE idHotel = $idHotel";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                $sql = "UPDATE city
                SET NumHotels = NumHotels - 1
                WHERE IdCity = $idCity";
                $result = mysqli_query($con, $sql);
                if($result)
                {
                    $sql = "DELETE FROM room WHERE idHotel = $idHotel";
                    $result = mysqli_query($con, $sql);
                    if($result)
                    {
                        return true;
                    }
                }
            }else return false;
         }
         public function getHotel($id)
         {
            include_once('../Models/connect_db.php');
            include_once('../Models/ExitRoom.php');
            $sql = "SELECT *FROM hotels WHERE idHotel = $id";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                while($row = mysqli_fetch_array($result)) {
                    $hotels = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'],$row['address']);
                }
                return $hotels;
                
            }else return "Loi";
         }
         public function getHotelHome($id)
         {
            include_once('../Models/connect_db.php');
            include_once('../Models/ExitRoom.php');
            $arr = array();
            /*ds hotel*/
            $sqlHotel = "SELECT *FROM hotels WHERE idHotel = $id";
            $resultHotel = mysqli_query($con, $sqlHotel);
            if($resultHotel)
            {
                while($row = mysqli_fetch_array($resultHotel)) {
                    $hotels = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address']);
                }
                /*ds hotel 4*/
                $idCity = $hotels->getidCity();
                $sql = "SELECT *FROM room WHERE idHotel = $id LIMIT 5;";
                $result = mysqli_query($con, $sql);
                $i = 0;
                while($row = mysqli_fetch_array($result)) {
                    $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook'], $row['startDay'], $row['enDay'], $row['idUser']);
                    $i++;
                }
                /*ds city*/
                $sql = "SELECT *FROM city WHERE idCity = $idCity";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $citys = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
                }
                $_SESSION['id_city_search'] = $citys->getidCity();
                /*ds review*/
                $sqlReview = "select * from review where idHotel = $id";
                $resultReview = mysqli_query($con, $sqlReview);
                $i = 0;
                while($row = mysqli_fetch_array($resultReview)) {
                    $reviews[$i++] = new Review($row['idUser'], $row['idHotel'], $row['numStar'], $row['description'], $row['idReview'], $row['imgUser'], $row['nameUser'], $row['time']);  
                    $i++;
                }
                /* num */
                if(!isset($reviews))
                {
                    $arr['reviews'] = "Không có bình luận!";
                }else{
                    $arr['reviews'] = $reviews;
                }
                $sql = "SELECT *FROM room WHERE idHotel = $id AND isbook = 0";
                $result = mysqli_query($con, $sql);
                $n = mysqli_num_rows($result);
                $arr['Hotels'] = $hotels;
                $arr['Rooms']= $rooms;
                $arr['City'] = $citys;
                $arr['numRoom'] = $n;
                return $arr;

            }else return "Loi";
         }
         public function editHotel($idHotel, $nameHotel, $description, $nummStar, $imgHotel)
         {
            include_once('../Models/connect_db.php');
            include_once('../Models/ExitRoom.php');
            $sql = "UPDATE hotels
            SET nameHotel = '$nameHotel', Description = '$description', numStart = '$nummStar', imgHotel = '$imgHotel'
            WHERE idHotel = $idHotel";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                return true;
            }else{
                return false;
            }
         }
         
    }

?>