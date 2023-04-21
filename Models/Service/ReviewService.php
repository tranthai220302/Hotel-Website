<?php
    include_once('../Models/Entity/Review.php');
    class ReviewService
    {
        public function __construct() {}

        public function getlistReview($idHotel) {
            $con = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
            //Lựa chọn cơ sở dữ liệu
            mysqli_select_db($con,"quanlyks");
            $sql = "select * from review where idHotel = $idHotel";
            $result = mysqli_query($con, $sql);
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $reviews = new Review($row['idUser'], $row['idHotel'], $row['numStar'], $row['description'], $row['idReview'], $row['imgUser'], $row['nameUser'], $row['time']); 
                $i++;
            }
            mysqli_free_result($result);
            mysqli_close($con);
            if(isset($reviews))
            {
                return $reviews;
            }
            return "Không có bình luận!";
        }
        public function comment($idUser, $idHotel, $desc, $nameUser, $imgUser)
        {
            include_once('../Models/connect_db.php');
            $currentDate = date('Y-m-d');
            $sql = "INSERT INTO review (idUser, idHotel, description, nameUser, imgUser, time) 
            VALUES ('$idUser', '$idHotel', '$desc', '$nameUser', '$imgUser', '$currentDate')";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                $sql = "SELECT *FROM review WHERE idReview = LAST_INSERT_ID()";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $reviews = new Review($row['idUser'], $row['idHotel'], $row['numStar'], $row['description'], $row['idReview'], $row['imgUser'], $row['nameUser'],$row['time']); 
                }
                return $reviews;
            }

        }
        public function deleteReview($idReview)
        {
            include_once('../Models/connect_db.php');
            $sql = "DELETE FROM review WHERE idReview = $idReview";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                return true;
            }
            return false;
        }
    }

?>