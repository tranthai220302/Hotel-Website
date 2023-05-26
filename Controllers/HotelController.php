<?php
    session_start();
    include_once('../Models/Service/HotelService.php');
    include_once('../Models/Service/UserService.php');
    class UserController {
        private $adminService = NULL;
        private $adminUser = NULL;
        public function __construct(){
            $this->adminService = new HotelService();
            $this->adminUser = new UserService();
        }

        public function invoke() {
            if(isset($_GET['action']))
            {
                $action = $_GET['action'];
                switch($action){
                    case 'listHotel': 
                        $this->getListHotel();
                        break;
                    case 'addHotel':
                        $this->addHotel();
                        break;
                    case 'delete':
                        $this->deleteHotel();
                        break;
                    case 'edit':
                        $this->editHotel();
                        break;
                    case 'getHotelHome':
                        $this->getHotelHome();
                        break;
                    case 'search':
                        $this->search();
                        break;
                    case 'searchItem':
                        $this->searchItem();
                        break;
                }
            }
        }
        public function searchItem()
        {
            $search_Item = $_POST['search'];
            $idCity = $_SESSION['id_city_search'];
            $search_Val = $_POST['address'];
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $arr = $this->adminService->searchItem($search_Val, $idCity, $page, $search_Item);
            include_once('../Views/Search/Search.php');
        }
        public function search()
        {
            if(!isset($_GET['is']))
            {
            $idCity = isset($_POST['City']) ? $_POST['City'] : '';
            $_SESSION['id_city_search'] = $idCity; 
            $Startdate = isset($_POST['Startdate']) ? $_POST['Startdate'] : '';
            $Enddate = isset($_POST['Enddate']) ? $_POST['Enddate'] : '';
            $Adults = isset($_POST['Adults']) ? $_POST['Adults'] : '';
            $Children = isset($_POST['Childrens']) ? $_POST['Childrens'] : '';
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $_SESSION['search'] = array(
                'startdate'=>$Startdate,
                'enddate'=>$Enddate,
                'adults'=>$Adults,
                'children'=>$Children,
            );
            $arr = $this->adminService->getListHotel($idCity, $page);
            include_once('../Views/Search/Search.php');
            }else if($_GET['is'] == 1)
            {
                $_SESSION['id_city_search'] = $_GET['id'];
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $arr = $this->adminService->getListHotel($_GET['id'], $page);
                include_once('../Views/Search/Search.php');
            }

        }
        public function getListHotel()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1)
            {
               $_SESSION['id_city'] = $_GET['id'];
               $page = isset($_GET['page']) ? $_GET['page'] : 1;
               $arr = $this->adminService->getListHotel($_GET['id'], $page);
               foreach($arr['hotels'] as $hotel){
                if($hotel->getIdUser()){
                    $users[$hotel->getidHotel()] = $this->adminUser->getUser($hotel->getIdUser());
                    
                }
               }
               
               include_once('../Views/Hotels/ListHotel.php');
               
            }
        }
        public function addHotel()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1){
                $nameHotel = $_POST['nameHotel'];
                $nummStar = $_POST['numStar'];
                $address = $_POST['address'];
                $description = $_POST['description'];
                $imgHotel = $_FILES['imgHotel']['name'];
                $idCity = $_SESSION['id_city'];

                $AddHotel = $this->adminService->addHotel($nameHotel, $nummStar, $description, $imgHotel, $idCity, $address);
                $target_dir = "../image/hotel/"; // Thư mục lưu trữ tệp tin
                $target_file = $target_dir . basename($_FILES["imgHotel"]["name"]); // Đường dẫn của tệp tin sau khi được upload
                move_uploaded_file($_FILES["imgHotel"]["tmp_name"], $target_file);
                if($AddHotel)
                {
                    $id = $_SESSION['id_city'];
                    $link = "../Controllers/HotelController.php?action=listHotel&id=$id";
                    header("Location: $link");
                }
            }
        }
        public function deleteHotel()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1){
                $idHotel = $_GET['id'];
                $DeleteHotel = $this->adminService->deleteHotel($idHotel,$_SESSION['id_city']);
                if($DeleteHotel)
                {
                    $id = $_SESSION['id_city'];
                    $link = "../Controllers/HotelController.php?action=listHotel&id=$id";
                    header("Location: $link");
                }
            }
        }

        public function getHotelHome()
        {
            $idHotel = $_GET['id'];
            $is = isset($_GET['is']) ? $_GET['is'] : '';
            $_SESSION['id_hotel']=$idHotel;
            if(isset($_GET['isession']))
            {
                $isession = $_GET['isession'];
            }
            $arr = $this->adminService->getHotelHome($idHotel);
            if(is_string($arr))
            {
                echo $arr;
            }else{
                if(isset($_GET['err']))
                {
                    $err = $_GET['err'];
                }
                include_once('../Views/Search/SearchItem.php');
            }

        }
        public function editHotel()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1){
                $idHotel = $_GET['id'];
                $nameHotel = $_POST['nameHotel'];
                $description = $_POST['description'];
                $nummStar = $_POST['numStar'];
                $imgHotel = $_FILES['imgHotel']['name'];
                $Edit_hotel = $this->adminService->editHotel($idHotel, $nameHotel, $description, $nummStar, $imgHotel);
                $target_dir = "../image/hotel/"; // Thư mục lưu trữ tệp tin
                $target_file = $target_dir . basename($_FILES["imgHotel"]["name"]); // Đường dẫn của tệp tin sau khi được upload
                move_uploaded_file($_FILES["imgHotel"]["tmp_name"], $target_file);
                if($Edit_hotel)
                {
                    $id = $_SESSION['id_city'];
                    $link = "../Controllers/HotelController.php?action=listHotel&id=$id";
                    header("Location: $link");
                }
            }
        }
    }
    (new UserController())->invoke();
?>