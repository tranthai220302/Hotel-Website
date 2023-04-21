<?php
    session_start();
    include_once('../Models/Service/RoomService.php');
    class RoomController {
        private $adminService = NULL;
        public function __construct(){
            $this->adminService = new RoomService();
        }

        public function invoke() {
            if(isset($_GET['action']))
            {
                $action = $_GET['action'];
                switch($action){
                    case 'getlist': 
                        $this->getlistRoom();
                        break;
                    case 'addRoom':
                        $this->addRoom();
                        break;
                    case 'delete':
                        $this->deleteRoom();
                        break;
                    case 'getRoom':
                        $this->getRoom();
                        break;
                    case 'editRoom':
                        $this->editRoom();
                        break;
                    case 'getRoombyUser':
                        $this->getRoombyUser();
                        break;
                    case 'book':
                        $this->Rooms();
                        break;
                    case 'getBookRoom':
                        $this->getBookRoom();
                        break;
                    case 'bookRoom':
                        $this->bookRoom();
                        break;
                    case 'search':
                        $this->search();
                        break;

                }
            }
        }
        public function search()
        {
            $idHotel = $_SESSION['id_hotel'];
            $search_option = $_POST['search'];
            $searc_Val = $_POST['val'];
            $arr = $this->adminService->getRoombyRequest($idHotel, $search_option, $searc_Val);
            include_once('../Views/bookRoom/Rooms.php');
        }
        public function bookRoom()
        {
            $idRoom = $_GET['id'];
            if(!isset($_SESSION['login']))
            {
                $_SESSION['is_loading'] = 1;
                echo "<script>alert('Bạn cần đăng nhập trước khi đặt phòng!')</script>";
                header("refresh:0; url=../Views/login.php");
            }else
            if($_SESSION['login'])
            {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $Adults = $_POST['Adults'];
                $Chilrens = $_POST['Childrens'];
                $idUser = $_SESSION['user']['id'];
                $book_room = $this->adminService->bookRoomService($idRoom, $idUser, $startDate, $endDate, $Adults, $Chilrens);
                if(!is_string($book_room))
                {
                    $username = $_SESSION['user']['username'];
                    $nameRoom = $book_room->getnameRoom();
                    $price = $book_room->getPrice();
                    $send_mail = $_SESSION['user']['email'];
                    include_once('../Mail/sendMail/sendMail.php');
                    if($sendMail == 'oke')
                    {
                        echo "<script>alert('Đặt phòng thành công!')</script>";
                        $link = "../Controllers/RoomController.php?action=book&is=1";
                        header("refresh:0; url=../Controllers/RoomController.php?action=book&is=1");
                    }
                    
                }
            }else{
                include_once('../Views/login.php');
            }
        }
        public function getBookRoom()
        {
            $id = $_GET['id'];
            $_SESSION['room']['id'] = $id;
            $Get_room = $this->adminService->getRooms($id);
            if(is_string($Get_room))
            {
                echo $Get_room;
            }else{
                include_once('../Views/bookRoom/bookRoom.php');
        
            }
        }
        public function Rooms()
        {
            $i = $_GET['is'];
            if($i == 0)
            {
                $_SESSION['city'] = $_POST['city'];
                $_SESSION['datestart'] = $_POST['datestart'];
                $_SESSION['dateend'] = $_POST['dateend'];
                $_SESSION['adult'] = $_POST['adult'];
                $_SESSION['children'] = $_POST['children'];
                if(!$_POST['children'] || !$_POST['adult'] || !$_POST['dateend'] || !$_POST['datestart'])
                {
                    $err = "Vui lòng nhập đầy đủ thồng tin";
                    $link = "../Controllers/HotelController.php?action=getHotelHome&id=".$_SESSION['id_hotel']."&isession=1&err=".$err."";
                    header("Location: $link");
                }else{
                    $arr = $this->adminService->getRoomNotBook($_SESSION['id_hotel']);
                    include_once('../Views/bookRoom/Rooms.php');
                }
            }else{
            $arr = $this->adminService->getRoomNotBook($_SESSION['id_hotel']);
            include_once('../Views/bookRoom/Rooms.php');
            }

        }

        public function getRoombyUser()
        {
            if($_SESSION['login'])
            {
                $id = $_GET['id'];
                $rooms = $this->adminService->getRoombyUser($id);
                include_once('../Views/User/UserbookRoom.php');
            }
            
        }
        public function getlistRoom()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1)
            {
               $_SESSION['id_hotel'] = $_GET['id'];
               $page = isset($_GET['page']) ? $_GET['page'] : 1;
               $arr = $this->adminService->getlistRoom($_GET['id'], $page);
               include_once('../Views/Room/ListRoom.php');
               
            }
        }
        public function addRoom()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1){
                $nameRoom = $_POST['nameRoom'];
                $Price = $_POST['Price'];
                $description = $_POST['description'];
                $imgRoom = $_FILES['imgRoom']['name'];
                $idHotel = $_SESSION['id_hotel'];

                $AddRoom = $this->adminService->addRoom($nameRoom, $Price, $description, $imgRoom, $idHotel);
                $target_dir = "../image/room/"; // Thư mục lưu trữ tệp tin
                $target_file = $target_dir . basename($_FILES["imgRoom"]["name"]); // Đường dẫn của tệp tin sau khi được upload
                move_uploaded_file($_FILES["imgRoom"]["tmp_name"], $target_file);
                if($AddRoom)
                {
                    $id = $_SESSION['id_hotel'];
                    $link = "../Controllers/RoomController.php?action=getlist&id=$id";
                    header("Location: $link");
                }
            }
        }
        public function deleteRoom()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1){
                $idRoom = $_GET['id'];
                $DeleteHotel = $this->adminService->deleteRoom($idRoom, $_SESSION['id_hotel']);
                if($DeleteHotel)
                {
                    $id = $_SESSION['id_hotel'];
                    $link = "../Controllers/RoomController.php?action=getlist&id=$id";
                    header("Location: $link");
                }
            }
        }
        public function getRoom()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1){
                $idRoom = $_GET['id'];
                $Get_room = $this->adminService->getRooms($idRoom);
                if(is_string($Get_room))
                {
                    echo $Get_room;
                }else{
                    include_once('../Views/Room/EditRoom.php');
            
                }
            }
        }
        public function editRoom()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1){
                $idRoom = $_GET['id'];
                $nameRoom = $_POST['nameRoom'];
                $description = $_POST['description'];
                $Price = $_POST['Price'];
                $imgRoom = $_FILES['imgRoom']['name'];
                $adult = $_POST['numAdults'];
                $children = $_POST['numChildren'];
                $Edit_hotel = $this->adminService->editRoom($idRoom, $nameRoom, $description, $Price, $imgRoom, $adult, $children);
                $target_dir = "../image/room/"; // Thư mục lưu trữ tệp tin
                $target_file = $target_dir . basename($_FILES["imgRoom"]["name"]); // Đường dẫn của tệp tin sau khi được upload
                move_uploaded_file($_FILES["imgRoom"]["tmp_name"], $target_file);
                if($Edit_hotel)
                {
                    $id = $_SESSION['id_hotel'];
                    $link = "../Controllers/RoomController.php?action=getlist&id=$id";
                    header("Location: $link");
                }
            }
        }
    }
    (new RoomController())->invoke();
?>