<?php
include_once('../Models/Entity/Room.php');
$sql = "SELECT  *FROM room";
$result = mysqli_query($con, $sql);
$i = 0;
$currentDate = date('Y-m-d');
while($row = mysqli_fetch_array($result)) {
    $rooms_check[$i++] = new Room($row['idRoom'], $row['nameRoom'], $row['idHotel'], $row['Description'],$row['Price'], $row['imgRoom'], $row['adults'], $row['children'], $row['isbook'], $row['startDay'], $row['enDay'], $row['idUser']);
    $i++;
}
foreach($rooms_check as $room)
{
    $idRoom_check = $room->getidRoom();
    $idUser_check = $room->getidUser();
    if($currentDate > $room->getendDay())
    {
        $sql = "UPDATE room SET isbook = 0, startDay = 0, enDay = 0, idUser = 0, adults = 0, children = 0 WHERE idRoom = $idRoom_check ";
        $result = mysqli_query($con, $sql);
        if($result)
        {
            $sql = "UPDATE user SET numberRoom = numberRoom - 1 WHERE id = $idUser_check ";
            $result = mysqli_query($con, $sql);
        }
    }
}

?>