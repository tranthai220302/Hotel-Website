<?php
    //Khai báo kết nối
    $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
    //Lựa chọn cơ sở dữ liệu
    mysqli_select_db($con,"quanlyks");
?>