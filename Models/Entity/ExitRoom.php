<?php
    include_once('../Models/Entity/Room.php');
    include_once('../Models/Entity/Booking.php');
    $k = 0;
    $iscc = 0;
    $currentDate = date('Y-m-d');
    $sql_book = "SELECT *FROM booking WHERE Date_end < '$currentDate'";
    $result = mysqli_query($con, $sql_book);
    while($row = mysqli_fetch_array($result)) {
        $book_check[$k++] = new Booking($row['id'], $row['Date_start'], $row['Date_end'], $row['idUser'], $row['idRoom'], $row['adults'], $row['childrens']);
        $id_book= $row['id'];
        $sql_room = "UPDATE room
            INNER JOIN booking ON room.idRoom = booking.idRoom
            SET room.isbook = room.isbook - 1
            WHERE room.isbook != 0 AND booking.id = $id_book";
        $result_room = mysqli_query($con, $sql_room);
        if($result_room){
            $sql_delete_book = "DELETE FROM booking WHERE id = $id_book";
            $result_delete =  mysqli_query($con, $sql_delete_book);
        }
        $iscc = 0;
    }
?>