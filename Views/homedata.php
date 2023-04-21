<?php
include_once('../Models/Entity/Hotel.php');
include_once('../Models/Entity/City.php');
$con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
//Lựa chọn cơ sở dữ liệu
mysqli_select_db($con,"quanlyks");
$sql = 'SELECT *
        FROM hotels
        ORDER BY numStart DESC
        LIMIT 5';
        $result = mysqli_query($con, $sql);
$i=0;
while($row = mysqli_fetch_assoc($result)){
    $hotels[$i++] = new Hotel($row['idHotel'], $row['nameHotel'], $row['numRoom'], $row['Description'], $row['numStart'], $row['idCity'], $row['imgHotel'], $row['address']);
    $i++;
}
$sql = "select * from city";
$result = mysqli_query($con, $sql);
$i = 0;
while($row = mysqli_fetch_array($result)) {
    $citys[$i++] = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
    $i++;
}
$sql = "select * from city";
$result = mysqli_query($con, $sql);
$i = 0;
while($row = mysqli_fetch_array($result)) {
    $citys[$i++] = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
    $i++;
}
$sql = "SELECT *FROM city ORDER BY NumHotels DESC LIMIT 4";
$result = mysqli_query($con, $sql);
$i = 0;
while($row = mysqli_fetch_array($result)) {
    $city[$i++] = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
    $i++;
    
}
$arr = array();
$arr['Hotels'] = $hotels;
$arr['Citys'] = $citys;
$arr['City_numHotel'] = $city;
return $arr;
?>