<?php
    session_start();
    include_once('../Models/Service/BookingService.php');
    class BookingController {
        private $adminService = NULL;
        public function __construct(){
            $this->adminService = new BookingService();
        }

        public function invoke() {
            if(isset($_GET['action']))
            {
                $action = $_GET['action'];
                switch($action){
                    case 'bookRoom':
                        $this->bookRoom();
                        break;
                    case 'huyphong':
                        $this->huyPhong();
                        break;
                }
            }
        }
        public function huyPhong(){
            if($_SESSION['login']){
                $Date_end = $_GET['date_end'];
                $idRoom = $_GET['id'];
                $isHuy = $this->adminService->huyPhongService($idRoom, $Date_end);
                if($isHuy){
                    $id= $_SESSION['user']['id'];
                    $link = "../Controllers/RoomController.php?action=getRoombyUser&id=$id";
                    header("Location: $link");
                }else{
                    echo "loi";
                }
            }
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
                $book_room = $this->adminService->bookingService($idRoom, $idUser, $startDate, $endDate, $Adults, $Chilrens);
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

        }
    (new BookingController())->invoke();
?>