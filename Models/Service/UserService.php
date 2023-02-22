<?php
    include_once("../Entity/User.php");
    class UserService {
        public function __construct() {}
        
        public function getListUser() {
            include_once("../connect_db.php");
            $sql="select *from User";
            $result=mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) >= 1) {
                return true;
            } 
            return false;
        }
    }
?>