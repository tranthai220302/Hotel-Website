<?php
    session_start();
    include_once('../Models/Service/UserService.php');
    class UserController {
        private $adminService = NULL;
        public function __construct(){
            $this->adminService = new UserService();
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
                    case 'updateAdmin':
                        $this->updateAdmin();
                        break;
                }
            }
        }
        public function updateAdmin()
        {
            $idUser = $_GET['id'];
            $updateAdmin = $this->adminService->updateAdmin($idUser);
            if($updateAdmin)
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
                );
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
        }
    (new UserController())->invoke();
?>