<?php
    include_once('../Models/Entity/Room.php');
    include_once('../Models/Entity/Hotel.php');
    include_once('../Models/Entity/Booking.php');
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
            $sql = "SELECT room.*
                    FROM booking
                    JOIN room ON booking.idRoom = room.idRoom
                    WHERE booking.idUser = $id AND booking.isDelete=0";
            $result = mysqli_query($con, $sql);
            $i = 0;
            $j=0;
            while($row = mysqli_fetch_array($result)) {
                $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                $idRoom = $row['idRoom'];
                $sql_booking = "SELECT *FROM booking WHERE idUser = $id AND idRoom = $idRoom AND isDelete = 0";
                $result_booking = mysqli_query($con, $sql_booking);
                while($row_book = mysqli_fetch_array($result_booking)){
                    $booking[$j++] = new Booking($row_book['id'], $row_book['Date_start'], $row_book['Date_end'], $row_book['idUser'], $row_book['idRoom'], $row_book['adults'], $row_book['childrens'], $row_book['price'], $row_book['isDelete']);
                }
            }
            if(isset($rooms))
            {
                $arr = array();
                $arr['booking'] = $booking;
                $arr['rooms'] = $rooms;
                return $arr;
            }else{
                return "Bạn chưa đặt phòng";
            }
        }

        public function getRoombyRequest($idHotel, $search_option, $search_Val, $datestart, $dateend, $adult, $children)
        {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            if($search_option == 'priceMin')
            {
                $sql = "SELECT * FROM room  Where idHotel=$idHotel AND price < $search_Val AND isbook=0 AND adults >= $adult AND children >= $children";
                $result = mysqli_query($con, $sql);
                $i = 0;
                $h = 0;
                $rooms = [];
                while($row = mysqli_fetch_array($result)) {
                    $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                }
        
                $sql_idRoom = "SELECT room.*
                FROM booking
                JOIN room ON booking.idRoom = room.idRoom
                WHERE booking.Date_end >= STR_TO_DATE('$datestart', '%Y-%m-%d') AND booking.Date_start <= STR_TO_DATE('$dateend', '%Y-%m-%d') AND room.adults >= $adult AND room.children >= $children AND booking.isDelete = 0";
    
                $result_idRoom = mysqli_query($con, $sql_idRoom);
                $id_Room = [];
                while($row = mysqli_fetch_array($result_idRoom)) {
                    $id_Room[$h++] = $row['idRoom'];
                }
                $sql_room = "SELECT room.*
                FROM booking
                JOIN room ON booking.idRoom = room.idRoom
                WHERE booking.isDelete = 0 AND room.price < $search_Val AND (booking.Date_end < STR_TO_DATE('$datestart', '%Y-%m-%d') OR booking.Date_start > STR_TO_DATE('$dateend', '%Y-%m-%d')) AND room.adults >= $adult AND room.children >= $children 
                GROUP BY room.idRoom
                HAVING COUNT(*) >=1
                ";
                $result = mysqli_query($con, $sql_room);
                while($row = mysqli_fetch_array($result)) {
                    if(in_array($row['idRoom'], $id_Room) == false){
                        $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);

                    }
                }
                $sql = "SELECT *FROM hotels WHERE idHotel = $idHotel";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $hotels = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address'], $row['idUser'], $row['date']);
                }
                $nameHotel = $hotels->getnameHotel();
                $arr = array();
                $arr['rooms'] = $rooms;
                $arr['nameHotel'] = $nameHotel;
                return $arr;

            }else if($search_option == 'nameRoom'){
                    $sql = "SELECT * FROM room  Where idHotel=$idHotel  AND isbook=0 AND adults >= $adult AND children >= $children AND nameRoom LIKE '%$search_Val%'
                    ";
                    $result = mysqli_query($con, $sql);
                    $i = 0;
                    $h=0;
                    $rooms = [];
                    while($row = mysqli_fetch_array($result)) {
                        $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                    }
                    $sql_idRoom = "SELECT room.*
                    FROM booking
                    JOIN room ON booking.idRoom = room.idRoom
                    WHERE booking.Date_end >= STR_TO_DATE('$datestart', '%Y-%m-%d') AND booking.Date_start <= STR_TO_DATE('$dateend', '%Y-%m-%d') AND room.adults >= $adult AND room.children >= $children AND booking.isDelete = 0";
        
                    $result_idRoom = mysqli_query($con, $sql_idRoom);
                    $id_Room = [];
                    while($row = mysqli_fetch_array($result_idRoom)) {
                        $id_Room[$h++] = $row['idRoom'];
                    }
                    $sql_room = "SELECT room.*
                    FROM booking
                    JOIN room ON booking.idRoom = room.idRoom
                    WHERE booking.isDelete = 0 AND room.nameRoom LIKE '%$search_Val%' AND (booking.Date_end < STR_TO_DATE('$datestart', '%Y-%m-%d') OR booking.Date_start > STR_TO_DATE('$dateend', '%Y-%m-%d')) AND room.adults >= $adult AND room.children >= $children AND booking.isDelete = 0
                    GROUP BY room.idRoom
                    HAVING COUNT(*) >=1
                    ";
                    $result = mysqli_query($con, $sql_room);
                    while($row = mysqli_fetch_array($result)) {
                        if(in_array($row['idRoom'], $id_Room) == false){
                            $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                        }
                    }
                    $sql = "SELECT *FROM hotels WHERE idHotel = $idHotel";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result)) {
                        $hotels = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address'], $row['idUser'], $row['date']);
                    }
                    $nameHotel = $hotels->getnameHotel();
                    $arr = array();
                    $arr['rooms'] = $rooms;
                    $arr['nameHotel'] = $nameHotel;
                    if(count($arr['rooms']) == 0){
                        $arr['rooms'] = 'Không có phòng';
                        return $arr;
                    }
                    return $arr;
            }else if($search_option == 'Description'){
                    $sql = "SELECT * FROM room  Where idHotel=$idHotel  AND isbook=0 AND adults >= $adult AND children >= $children AND $search_option LIKE '%$search_Val%'
                    ";
                    $result = mysqli_query($con, $sql);
                    $i = 0;
                    $h=0;
                    $rooms = [];
                    while($row = mysqli_fetch_array($result)) {
                        $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                    }
                    $sql_idRoom = "SELECT room.*
                    FROM booking
                    JOIN room ON booking.idRoom = room.idRoom
                    WHERE booking.Date_end >= STR_TO_DATE('$datestart', '%Y-%m-%d') AND booking.Date_start <= STR_TO_DATE('$dateend', '%Y-%m-%d') AND room.adults >= $adult AND room.children >= $children AND booking.isDelete = 0";
        
                    $result_idRoom = mysqli_query($con, $sql_idRoom);
                    $id_Room = [];
                    while($row = mysqli_fetch_array($result_idRoom)) {
                        $id_Room[$h++] = $row['idRoom'];
                    }
                    $sql_room = "SELECT room.*
                    FROM booking
                    JOIN room ON booking.idRoom = room.idRoom
                    WHERE booking.isDelete = 0 AND room.Description LIKE '%$search_Val%' AND (booking.Date_end < STR_TO_DATE('$datestart', '%Y-%m-%d') OR booking.Date_start > STR_TO_DATE('$dateend', '%Y-%m-%d')) AND room.adults >= $adult AND room.children >= $children AND booking.isDelete = 0
                    GROUP BY room.idRoom
                    HAVING COUNT(*) >=1
                    ";
                    $result = mysqli_query($con, $sql_room);
                    while($row = mysqli_fetch_array($result)) {
                        if(in_array($row['idRoom'], $id_Room) == false){
                            $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                        }
                    }
                    $sql = "SELECT *FROM hotels WHERE idHotel = $idHotel";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result)) {
                        $hotels = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address'], $row['idUser'], $row['date']);
                    }
                    $nameHotel = $hotels->getnameHotel();
                    $arr = array();
                    $arr['rooms'] = $rooms;
                    $arr['nameHotel'] = $nameHotel;
                    if(count($arr['rooms']) == 0){
                        $arr['rooms'] = 'Không có phòng';
                        return $arr;
                    }
                    return $arr;
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
                $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
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
        public function getRoomNotBook($id, $datestart, $dateend, $adult, $children)
        {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "SELECT *FROM room WHERE idHotel = $id AND isbook = 0 AND adults >= $adult AND children >= $children";
            $result = mysqli_query($con, $sql);
            $i = 0;
            $j = 0;
            $h = 0;
            $rooms = [];
            while($row = mysqli_fetch_array($result)) {
                $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
            }
            $sql_idRoom = "SELECT room.*
            FROM booking
            JOIN room ON booking.idRoom = room.idRoom
            WHERE room.idHotel = $id AND booking.Date_end >= STR_TO_DATE('$datestart', '%Y-%m-%d') AND booking.Date_start <= STR_TO_DATE('$dateend', '%Y-%m-%d') AND room.adults >= $adult AND room.children >= $children AND booking.isDelete = 0";

            $result_idRoom = mysqli_query($con, $sql_idRoom);
            $id_Room = [];
            while($row = mysqli_fetch_array($result_idRoom)) {
                $id_Room[$h++] = $row['idRoom'];
            }

            $sql_room = "SELECT room.*
            FROM booking
            JOIN room ON booking.idRoom = room.idRoom
            WHERE room.idHotel = $id AND booking.isDelete = 0 AND (booking.Date_end < STR_TO_DATE('$datestart', '%Y-%m-%d') OR booking.Date_start > STR_TO_DATE('$dateend', '%Y-%m-%d')) AND room.adults >= $adult AND room.children >= $children
            GROUP BY room.idRoom";

            $result = mysqli_query($con, $sql_room);
            while($row = mysqli_fetch_array($result)) {
                if(in_array($row['idRoom'], $id_Room) == false){
                    $rooms[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                }
            }
            $sql = "SELECT *FROM hotels WHERE idHotel = $id";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($result)) {
                $hotels = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address'], $row['idUser'], $row['date']);
            }
            $nameHotel = $hotels->getnameHotel();
            // $rooms = array_merge($rooms, $rooms_date);
                $arr = array();
                $arr['rooms'] = $rooms;
                $arr['nameHotel'] = $nameHotel;
                if(count($arr['rooms']) == 0){
                    $arr['rooms'] = 'Không có phòng';
                }
                return $arr;
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
         public function addRoom($nameRoom, $Price, $description, $imgRoom, $idHotel, $adults, $children)
         {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "INSERT INTO room (nameRoom, Description, Price, imgRoom, idHotel, adults, children)
            VALUES ('$nameRoom', '$description', '$Price', '$imgRoom', '$idHotel', '$adults', '$children')";
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
                    $rooms = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'], $row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                }
                return $rooms;
            }else return "Loi";
         }
         public function editRoom($idRoom, $nameRoom, $description, $Price, $imgRoom, $adult, $children)
         {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql = "";
            if(!$imgRoom){
                $sql = "UPDATE room
                SET nameRoom = '$nameRoom', Description = '$description', Price = '$Price', adults = '$adult', children = '$children'
                WHERE idRoom = $idRoom";
            }
            else{
                $sql = "UPDATE room
                SET nameRoom = '$nameRoom', Description = '$description', Price = '$Price', imgRoom = '$imgRoom', adults = '$adult', children = '$children'
                WHERE idRoom = $idRoom";
            }
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