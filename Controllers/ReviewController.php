<?php
    session_start();
    include_once('../Models/Service/ReviewService.php');
    class ReviewController {
        private $adminService = NULL;
        public function __construct(){
            $this->adminService = new ReviewService();
        }

        public function invoke() {
            if(isset($_GET['action']))
            {
                $action = $_GET['action'];
                switch($action){
                    case 'comment': 
                        $this->comment();
                        break;
                    case 'delete':
                        $this->delete();
                }
            }
        }
        public function delete()
        {
            if(!isset($_SESSION['login']))
            {
                $errLogin = 'Bạn cần đăng nhập trước khi xoá bình luận này!';
                echo $errLogin;
            }else{
                if($_SESSION['user']['id'] !== $_GET['idUser'])
                {

                    $errMessage = 'Bạn không thể xoá bình luận của người khác!';
                    echo $errMessage;
                }else{
                    $idReview = $_GET['idReview'];
                    $isDelete = $this->adminService->deleteReview($idReview);
                    if($isDelete){
                        echo 'oke';
                    }else{
                        echo 'Lỗi';
                    }
                }
            }
        }
        public function comment()
        {
            if(!isset($_SESSION['login']))
            {

                echo "loi";
            }else{
                $idUser = $_SESSION['user']['id'];
                $idHotel = $_SESSION['id_hotel'];
                $imgUser = $_SESSION['user']['avatar'];
                $nameUser = $_SESSION['user']['username'];
                $desc = $_POST['desc'];
                if($desc == "")
                {
                    echo "no";
                }else{
                $reviewCreate = $this->adminService->comment($idUser, $idHotel, $desc, $nameUser, $imgUser);
                $reviewJson = array(
                    "idReview"=>$reviewCreate->getidReview(),
                    "idUser"=>$reviewCreate->getidUser(),
                    "idHotel"=>$reviewCreate->getidHotel(),
                    "description"=>$reviewCreate->getdescription(),
                    "nameUser"=>$reviewCreate->getnameUser(),
                    "imgUser"=>$reviewCreate->getimgUser(),
                    "time"=>$reviewCreate->getTime(),
                );
            }
        
        // Trả về đối tượng JSON
                echo json_encode($reviewJson);
        }
    }

        }
    (new ReviewController())->invoke();
?>