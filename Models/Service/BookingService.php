<?php
    include_once('../Models/Entity/Room.php');
    include_once('../Models/Entity/Hotel.php');
    include_once('../Models/Entity/Booking.php');
    class BookingService
    {
        public function __construct() {}
        public function n_review(){
            
        }
        public function huyPhongService($idRoom, $Date_end){
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            $sql_room = "UPDATE room SET isbook = isbook - 1 WHERE idRoom = $idRoom";
            $result_room = mysqli_query($con, $sql_room);
            if($result_room)
            {
                $sql = "DELETE FROM booking WHERE idRoom = $idRoom AND Date_end = STR_TO_DATE('$Date_end', '%Y-%m-%d')";
                $result = mysqli_query($con, $sql);
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
            return false;
        }
        public function bookingService($idRoom, $idUser,$startDate, $endDate, $Adults, $Chilrens){
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');
            $sql_price = "SELECT price FROM room WHERE idRoom = $idRoom";
            $result_price = mysqli_query($con, $sql_price);
            $row = mysqli_fetch_array($result_price);
            $price = $row['price'];
            $sql = "INSERT INTO booking(idUser, idRoom, Date_start, Date_end, adults, childrens, price, isDelete) VALUES($idUser, $idRoom, STR_TO_DATE('$startDate', '%Y-%m-%d'), STR_TO_DATE('$endDate', '%Y-%m-%d'), $Adults, $Chilrens, $price, 0)";
            $result = mysqli_query($con, $sql);
            if($result){
                $sql_update = "UPDATE room SET isbook = isbook + 1 WHERE idRoom = $idRoom";
                $result_update = mysqli_query($con, $sql_update);
                if($result_update){
                    $sql = "SELECT *FROM room WHERE idRoom = $idRoom ";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result)) {
                        $roomBook = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook']);
                    }
                    return $roomBook;
                }else return 'loi';

            }
            return "loi";

        }
        public function dataThongke($idHotel, $date_start, $date_end){
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            $sql = "SELECT booking.* FROM booking JOIN room ON booking.idRoom = room.idRoom 
            WHERE booking.date_start >= STR_TO_DATE('$date_start', '%Y-%m-%d') 
            AND booking.date_start <= STR_TO_DATE('$date_end', '%Y-%m-%d')
            AND room.idHotel = $idHotel
            ";
            $result = mysqli_query($con, $sql);
            $i = 0;
            $arr = array();
            while($row = mysqli_fetch_array($result)){
                $brr = array(
                    "date" => $row['Date_start'],
                    "price" => $row['price']
                );
                array_push($arr, $brr);
            }
            $result = array();

            // Lặp qua mảng $bookings
            foreach ($arr as $booking) {
                $date = $booking['date'];
                $price = $booking['price'];
                $index = null;
                foreach ($result as $key => $item) {
                    if ($item['date'] == $date) {
                        $index = $key;
                        break;
                    }
                }
                if ($index !== null) {
                    $result[$index]['price'] += $price;
                } else {
                    $result[] = array("date" => $date, "price" => $price);
                }
            }
            return $result;
        }

    }

?>