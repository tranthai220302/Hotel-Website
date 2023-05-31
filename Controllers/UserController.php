<?php
    session_start();
    include_once('../Models/Service/UserService.php');
    include_once('../Models/Service/RoomService.php');
    include_once('../Models/Service/CityService.php');
    class UserController {
        private $adminService = NULL;
        private $adminRoom = NULL;
        private $adminCity = NULL;
        public function __construct(){
            $this->adminService = new UserService();
            $this->adminRoom = new RoomService();
            $this->adminCity = new CityService();
        }

        public function invoke() {
            if(isset($_GET['action']))
            {
                $action = $_GET['action'];
                switch($action){
                    case 'login': 
                        $this->login();
                        break;
                    case 'register':
                        $this->register();
                        break;
                    case 'logout':
                        $this->logout();
                        break;
                    case 'getUser':
                        $this->getUser();
                        break;
                    case 'back':
                        $this->Back();
                        break;
                    case 'edit':
                        $this->editUser();
                        break;
                    case 'listUser':
                        $this->getlistUser();
                        break;
                    case 'home':
                        $this->getHome();
                        break;
                    case 'detailUser':
                        $this->detaiUser();
                        break;
                    case 'deleteUser':
                        $this->deleteUser();
                        break;
                    case 'userbookRoom':
                        $this->UserbookRoom();
                        break;
                    case 'home1':
                        $this->home();
                        break;
                    case 'home2':
                        $this->home2();
                        break;
                    case 'home_admin':
                        $this->home_admin();
                        break;
                    case 'createUserByHotel':
                        $this->createUserByHotel();
                        break;
                    case 'editUser':
                        $this->editUsers();
                        break;
                }
            }
        }
        public function editUsers(){
            if($_SESSION['user']['isAdmin'] == 1){
                $id = $_GET['id'];
                $firstName = $_POST['firstname'];
                $lastName = $_POST['lastname'];
                $phonenumber = $_POST['phone-number'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $User_edit = $this->adminService->editUser($id, $firstName, $phonenumber, $address, $email, $lastName);
                if(is_array($User_edit))
                {
                    echo 'Loi';
                }else{
                    $link = '../Controllers/UserController.php?action=listUser';
                    header("refresh:0; url=$link");
                }
            }
        }
        public function home_admin(){
            if($_SESSION['user']['isAdmin'] == 1){
                $citys = $this->adminCity->getListCity();
                include_once('../Views/QuanlyHotels.php');
            }
        }

        public function home2(){
            $idUser = $_SESSION['user']['id'];
            $hotel = $this->adminService->getHotelByUser($idUser);
            $_SESSION['id_hotel'] = $hotel->getidHotel();
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $arr = $this->adminRoom->getListRoom($hotel->getidHotel(), $page);
            $count = count($arr);
            $n_review = $this->adminService->n_review($_SESSION['id_hotel']);
            if($n_review!=0){
                $n_review = count($n_review);
            }
            $city = $this->adminCity->getCityBy($hotel->getidCity());
            include_once('../Views/Employee/home/index.php');
        }
        public function home(){
            $idUser = $_SESSION['user']['id'];
            $hotel = $this->adminService->getHotelByUser($idUser);
            $_SESSION['id_hotel'] = $hotel->getidHotel();
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $arr = $this->adminRoom->getListRoom($hotel->getidHotel(), $page);
            include_once('../Views/Employee/home.php');
        }
        public function UserbookRoom()
        {
            $id_Hotel = $_SESSION['id_hotel'];
            $users = $this->adminService->UserbookRoom($id_Hotel);
            if(!$users){
                $users = "Không có khách hàng đặt phòng!";
                include_once('../Views/Employee/ListCustomer.php');
            }else{
                include_once('../Views/Employee/ListCustomer.php');
            }
        }
        public function deleteUser()
        {
            $idUser = $_GET['id'];
            $deleteUser = $this->adminService->deleteUser($idUser);
            if($deleteUser)
            {
                $link = '../Controllers/UserController.php?action=listUser';
                header("refresh:0; url=$link");
            }else echo "Error";
            
        }
        public function detaiUser()
        {

            include_once('../Views/User/ThongtinUser.php');
        }
        public function getHome()
        {
            $arr = $this->adminService->getHome();
            include_once('../Views/home.php');

        }
        public function login() {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $arr = $this->adminService->login($username, $password);
            if(is_string($arr))
            {
                include_once('../Views/login.php');
            }else{
    
                $_SESSION['login'] = true;
                $_SESSION['user'] = array(
                    'id' =>  $arr['User_login']->getId(),
                    'username' => $arr['User_login']->getUsername(),
                    'address' => $arr['User_login']->getAddress(),
                    'numberphone' => $arr['User_login']->getPhone(),
                    'avatar' => $arr['User_login']->getImg(),
                    'email' =>$arr['User_login']->getEmail(),
                    "isAdmin" =>$arr['User_login']->getIsAdmin(),
                    'firstName' =>$arr['User_login']->getFirstName(),
                    'lastName'=>$arr['User_login']->getLastName(),
                    'isHotel'=>$arr['User_login']->getIsHotel(),
                );
                if($_SESSION['user']['isHotel'] == 1)
                {
                    $idUser = $_SESSION['user']['id'];
                    $hotel = $this->adminService->getHotelByUser($idUser);
                    $_SESSION['id_hotel'] = $hotel->getidHotel();
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $arr = $this->adminRoom->getListRoom($hotel->getidHotel(), $page);
                    $count = count($arr);
                    $n_review = $this->adminService->n_review($_SESSION['id_hotel']);
                    if($n_review!=0){
                        $n_review = count($n_review);
                    }
                    $city = $this->adminCity->getCityBy($hotel->getidCity());
                    include_once('../Views/Employee/home/index.php');
                    
                }else if($_SESSION['user']['isAdmin'] == 1){
                    $citys = $this->adminCity->getListCity();
                    include_once('../Views/QuanlyHotels.php');
                }
                else{
                    if(!isset($_SESSION['is_loading']))
                    {
                        include_once('../Views/home.php');
                    }else if($_SESSION['is_loading'] == 1){
                        $idRoom= $_SESSION['room']['id'];
                        $link = "../../Hotel-Website/Controllers/RoomController.php?action=getBookRoom&id=$idRoom";
                        header("refresh:0; url=$link");
                    }
                }
            }
        }
        public function logout()
        {
            session_unset();
            session_destroy();
            header("Location: ../Views/home.php");
        }
        public function register()
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmpasswordd = $_POST['confirmpassword'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $numberPhone = $_POST['Numberphone'];
            $lastName = $_POST['lastName'];
            $firstName = $_POST['firstName'];
            $imge = $_FILES['Avatar']['name'];
            $User_login = $this->adminService->register($username, $password, $confirmpasswordd, $email, $address, $numberPhone, $imge, $firstName, $lastName);
            if(is_array($User_login))
            {
                include_once('../Views/register.php');
 
            }else{
                $_SESSION['login'] = true;
                $target_dir = "../image/user/"; // Thư mục lưu trữ tệp tin
                $target_file = $target_dir . basename($_FILES["Avatar"]["name"]); // Đường dẫn của tệp tin sau khi được upload
                move_uploaded_file($_FILES["Avatar"]["tmp_name"], $target_file);
                $_SESSION['user'] = array(
                    'id' =>  $User_login->getId(),
                    'username' => $User_login->getUsername(),
                    'address' => $User_login->getAddress(),
                    'numberphone' => $User_login->getPhone(),
                    'avatar' => $User_login->getImg(),
                    'email' =>$User_login->getEmail(),
                    'firstName' =>$User_login->getFirstName(),
                    'lastName'=>$User_login->getLastName(),
                    'isAdmin'=>$User_login->getIsAdmin(),
                );
                include_once('../Views/home.php');
            }
        }
        public function getUser()
        {
            if($_SESSION['login'])
            {
                include_once('../Views/User/ThongtinUser.php');

            }
        }
        public function Back()
        {
            if($_SESSION['login'])
            {
            include_once('../Views/home.php');
            }

        }

        public function editUser()
        {
            if($_SESSION['login'])
            {
                $id = $_SESSION['user']['id'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $phonenumber = $_POST['phone-number'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $User_edit = $this->adminService->editUser($id, $firstName, $phonenumber, $address, $email, $lastName);
                if(is_array($User_edit))
                {
                    echo $User_edit['email'];
                }else{
                    $_SESSION['user'] = array(
                        'id' =>$User_edit->getId(),
                        'avatar' => $User_edit->getImg(),
                        'username' => $User_edit->getUsername(),
                        'address' => $User_edit->getAddress(),
                        'numberphone' => $User_edit->getPhone(),
                        'email' =>$User_edit->getEmail(),
                        'isAdmin'=> $User_edit->getIsAdmin(),
                        'firstName'=>$User_edit->getFirstName(),
                        'lastName'=>$User_edit->getLastName()
                    );
                    include_once('../Views/User/ThongtinUser.php');
                }
            }
        }
        public function getlistUser()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1)
            {
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $listUser =  $this->adminService->getlistUser($page);
                include_once('../Views/User/ListUser.php');
            }
        }
        public function createUserByHotel(){
            $id_Hotel = $_GET['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $numberPhone = $_POST['Numberphone'];
            $lastName = $_POST['lastName'];
            $firstName = $_POST['firstName'];
            $imge = $_FILES['Avatar']['name'];
            $User_login = $this->adminService->createUserByHotel($username, $password,  $email, $address, $numberPhone, $imge, $firstName, $lastName, $id_Hotel);
            if($User_login){
                $target_dir = "../image/user/"; // Thư mục lưu trữ tệp tin
                $target_file = $target_dir . basename($_FILES["Avatar"]["name"]); // Đường dẫn của tệp tin sau khi được upload
                move_uploaded_file($_FILES["Avatar"]["tmp_name"], $target_file);
                $id = $_SESSION['id_city'];
                $page = $_GET['page'];
                $link = "../../Hotel-Website/Controllers/HotelController.php?action=listHotel&id=$id&page=$page";
                header("refresh:0; url=$link");
            }else{
                
            }

        }
        }
    (new UserController())->invoke();
?>