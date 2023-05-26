<?php
    include_once('../Models/Entity/Room.php');
    include_once('../Models/Entity/Hotel.php');
    class RoomService
    {
        public function __construct() {}
        public function n_review(){
            
        }
        public function getRoombyUser($id)
        {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "SELECT  *FROM room WHERE idUser = $id";
            $result = mysqli_query($con, $sql);
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook'], $row['startDay'], $row['enDay'], $row['idUser']);
                $i++;
            }
            if(isset($rooms))
            {
                return $rooms;
            }else{
                return "Bạn chưa đặt phòng";
            }
        }
        public function bookRoomService($idRoom, $idUser,$startDate, $endDate, $Adults, $Chilrens){
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "UPDATE room
            SET adults = '$Adults', children = '$Chilrens', startDay = STR_TO_DATE('$startDate', '%Y-%m-%d'), enDay = STR_TO_DATE('$endDate', '%Y-%m-%d'), idUser = '$idUser', isbook = 1
            WHERE idRoom = $idRoom";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                $sql = "UPDATE user SET numberRoom = numberRoom + 1  WHERE id='$idUser'";
                $result = mysqli_query($con, $sql);
                if($result)
                {
                    $sql = "SELECT *FROM room WHERE idRoom = $idRoom";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result)) {
                        $roomBook = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook'], $row['startDay'], $row['enDay'], $row['idUser']);
                    }
                    return $roomBook;
                }
            }else{
                echo $idRoom;
            }
            return "loi";

        }
        public function getRoombyRequest($idHotel, $search_option, $search_Val)
        {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            if($search_option == 'priceMin')
            {
                $sql = "SELECT * FROM room  Where idHotel=$idHotel AND price < $search_Val AND isbook=0";
            }else{
                $sql = "SELECT * FROM room  Where idHotel=$idHotel AND $search_option LIKE '%$search_Val%' AND isbook=0";
            }
            $result = mysqli_query($con, $sql);
            if(!$result)
            {
                return "Không có phòng";
            }

            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook'], $row['startDay'], $row['enDay'], $row['idUser']);
                $i++;
            }
            mysqli_free_result($result);
            mysqli_close($con);
            if(isset($rooms))
            {
                $arr = array();
                $arr['rooms'] = $rooms;
                return $arr;
            }else{
                return "Không có phòng";
            }
        }
        public function getListRoom($idhotel, $page) {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $limit = 4;
            $start = ($page - 1) * $limit;
            $sql = "SELECT * FROM room  Where idHotel=$idhotel";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result)/$limit;
            $sql = "SELECT * FROM room  Where idHotel=$idhotel LIMIT $start, $limit";
            $result = mysqli_query($con, $sql);
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook'], $row['startDay'], $row['enDay'], $row['idUser']);
                $i++;
            }
            mysqli_free_result($result);
            mysqli_close($con);
            if(isset($rooms))
            {
                $arr = array();
                $arr['rooms'] = $rooms;
                $arr['numPage'] = ceil($num);
                $arr['page']= $page;
                return $arr;
            }else{
                return "Không có phòng";
            }
        }
        public function getRoomNotBook($id)
        {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "SELECT *FROM room WHERE idHotel = $id AND isbook = 0";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                $i = 0;
                while($row = mysqli_fetch_array($result)) {
                    $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook'], $row['startDay'], $row['enDay'], $row['idUser']);
                }
                $sql = "SELECT *FROM hotels WHERE idHotel = $id";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $hotels = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address'], $row['idUser'], $row['date']);
                }
                $nameHotel = $hotels->getnameHotel();
                    $arrr = array();
                    $arr['rooms'] = $rooms;
                    $arr['nameHotel'] = $nameHotel;
                    return $arr;
            }else return "Hết phòng! Vui lòng quý khách quay lại lần sau!";
        }
        public function deleteRoom($idRoom, $idhotel)
        {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "DELETE FROM room WHERE idRoom = $idRoom";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                $sql = "UPDATE hotels
                SET numRoom = numRoom - 1
                WHERE idHotel = $idhotel";
                $result = mysqli_query($con, $sql);
                if($result)
                {
                    return true;
                }
            }
            return false;
         }
         public function addRoom($nameRoom, $Price, $description, $imgRoom, $idHotel)
         {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "INSERT INTO room (nameRoom, Description, Price, imgRoom, idHotel)
            VALUES ('$nameRoom', '$description', '$Price', '$imgRoom', '$idHotel')";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                $sql = "UPDATE hotels
                SET numRoom = numRoom + 1
                WHERE idHotel = $idHotel";
                $result = mysqli_query($con, $sql);
                if($result)
                {
                    return true;
                }
            }
            return false;
         }
         public function getRooms($idRoom)
         {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "SELECT *FROM room WHERE idRoom = $idRoom";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                while($row = mysqli_fetch_array($result)) {
                    $rooms = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook'], $row['startDay'], $row['enDay'], $row['idUser']);
                }
                return $rooms;
            }else return "Loi";
         }
         public function editRoom($idRoom, $nameRoom, $description, $Price, $imgRoom, $adult, $children)
         {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "UPDATE room
            SET nameRoom = '$nameRoom', Description = '$description', Price = '$Price', imgRoom = '$imgRoom', adults = '$adult', children = '$children'
            WHERE idRoom = $idRoom";
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