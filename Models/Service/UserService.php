<?php
    include_once('../Models/Entity/User.php');
    include_once('../Models/Entity/Hotel.php');
    include_once('../Models/Entity/City.php');
    class UserService {
        public function __construct() {}
        
        public function updateAdmin($idUser)
        {
            include_once('../Models/connect_db.php');
            $sql = "UPDATE user SET isAdmin = 1 WHERE id='$idUser'";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                return true;
            }
            return false;
        }
        public function getListUser($page) {
            include_once('../Models/connect_db.php');
            $limit = 12;
            $start = ($page - 1) * $limit;
            $sql = "SELECT *FROM user";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result)/$limit;
            $sql = "SELECT *FROM user WHERE isAdmin=0 LIMIT $start, $limit";
            $result = mysqli_query($con, $sql);
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                $users[$i++] = new User($row['id'], $row['username'], $row['password'], $row['email'], $row['isAdmin'], $row['address'], $row['phoneNumber'], $row['img'], $row['firstName'], $row['lastName'], $row['numberRoom']);
                $i++;
            }
            mysqli_free_result($result);
            mysqli_close($con);
            if(isset($users))
            {
                $arr = array();
                $arr['users'] = $users;
                $arr['numPage'] = ceil($num);
                $arr['page']= $page;
                return $arr;
            }else{
                return "Không có phòng";
            }
        }
        public function getHome()
        {
            include_once('../Models/connect_db.php');
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
            $arr = array();
            $arr['Hotels'] = $hotels;
            return $arr;
        }
        public function login($username, $password)
        {

            include_once('../Models/connect_db.php');
            $sql="SELECT *FROM user WHERE username = '".$username."'";
            $result = mysqli_query($con, $sql);
            $row1 = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            $error = '';
            if($row1 > 0)
            {
                if($row['password'] == $password)
                {
                    $User_login = new User($row['id'], $row['username'], $row['password'], $row['email'], $row['isAdmin'], $row['address'], $row['phoneNumber'], $row['img'], $row['firstName'], $row['lastName'], $row['numberRoom']);
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
                    $sql = "SELECT *FROM city ORDER BY NumHotels DESC LIMIT 4";
                    $result = mysqli_query($con, $sql);
                    $i = 0;
                    while($row = mysqli_fetch_array($result)) {
                        $city[$i++] = new City($row['IdCity'], $row['NameCity'], $row['NumHotels'], $row['Description'],  $row['imgCity']);
                        $i++;
                    }
                    $arr= array();
                    $arr['User_login'] = $User_login;
                    $arr['Hotels'] = $hotels;
                    $arr['Citys'] = $citys;
                    $arr['City_numHotel'] = $city;
                    return $arr;
                }else{
                    $err = "Mật khẩu không chính xác";
                }
            }else{
                $err = "Tài khoản không chính xác";
            }
            return $err;

            
            // Giải phóng kết quả truy vấn
            mysqli_free_result($result);
            
            // Đóng kết nối
            mysqli_close($con);
        }

        public function register($username, $password, $confirmpasswordd, $email, $address, $numberPhone, $imge, $firsName, $lastName)
        {
            include_once('../Models/connect_db.php');
            $err = array();
            $sql="SELECT *FROM user WHERE username = '".$username."'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_num_rows($result);
            if($password != $confirmpasswordd)
            {
                $err['ConfirmPassword'] = "Mật khẩu nhập lại không chính xác";
            }
            if(strlen($password) < 8)
            {
                $err['password'] = "Mật khẩu phải lớn hơn 8 chữ số";
            }
            if($row > 0)
            {
                $err['username'] = 'Tài khoản này đã tồn tại';
            }else{
                $sql="SELECT *FROM user WHERE email = '".$email."'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_num_rows($result);
                if($row > 0)
                {
                    $err['email'] = "Email này đã tồn tại";
                }else{
                    $sql = "INSERT INTO user (username, password, email, address, phoneNumber, img, firstName, lastName)
                    VALUES ('$username', '$password', '$email', '$address', '$numberPhone', '$imge', '$firsName', '$lastName')";
                    $result = mysqli_query($con, $sql);
                    if($result)
                    {
                        $user_id = mysqli_insert_id($con);
                        $sql = "SELECT *from user where id = $user_id";
                        $result = mysqli_query($con, $sql);
                        $row1 = mysqli_num_rows($result);
                        $row = mysqli_fetch_assoc($result);
                        if($row1 > 0)
                        {
                            $User_login = new User($row['id'], $row['username'], $row['password'], $row['email'], $row['isAdmin'], $row['address'], $row['phoneNumber'], $row['img'], $row['firstName'], $row['lastName'], $row['numberRoom']);
                            return $User_login;
                        }
                    }
                }
            }
            return $err;
            
        }
        public function getUser($id)
        {
            include_once('../Models/connect_db.php');
            $sql = "SELECT *from user where id = $id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $User_get= new User($row['id'], $row['username'], $row['password'], $row['email'], $row['isAdmin'], $row['address'], $row['phoneNumber'], $row['img'], $row['firstName'], $row['lastName'], $row['numberRoom']);
            return $User_get;
        }
        public function editUser($id, $firsName, $phonenumber, $address, $email, $lastName)
        {
            include_once('../Models/connect_db.php');
            $err = array();
                $sql = "UPDATE user SET firstName='$firsName', phonenumber='$phonenumber', address='$address', email='$email', lastName = '$lastName' WHERE id='$id'";
                $result = mysqli_query($con, $sql);
                if($result)
                {
                    $sql = "SELECT *from user where id = $id";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $User_Edit= new User($row['id'], $row['username'], $row['password'], $row['email'], $row['isAdmin'], $row['address'], $row['phoneNumber'], $row['img'], $row['firstName'], $row['lastName'], $row['numberRoom']);
                    return $User_Edit;
                }else{
                    $err["edit"] = "loi";
                }
                return $err;
        }
        
    }
?>