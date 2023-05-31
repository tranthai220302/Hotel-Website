<?php
    include_once('../Models/Entity/Room.php');
    include_once('../Models/Entity/Hotel.php');
    include_once('../Models/Entity/Booking.php');
    class BookingService
    {
        public function __construct() {}
        public function n_review(){
            
        }

        public function bookingService($idRoom, $idUser,$startDate, $endDate, $Adults, $Chilrens){
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            mysqli_select_db($con,"quanlyks");
            include_once('../Models/Entity/ExitRoom.php');

            $sql = "INSERT INTO booking(idUser, idRoom, Date_start, Date_end, adults, childrens) VALUES($idUser, $idRoom, STR_TO_DATE('$startDate', '%Y-%m-%d'), STR_TO_DATE('$endDate', '%Y-%m-%d'), $Adults, $Chilrens)";
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
            echo "cc";
            return "loi";

        }

    }

?>