<?php
    session_start();
    include_once('../Models/Service/CityService.php');
    class CityController {
        private $adminService = NULL;
        public function __construct(){
            $this->adminService = new CityService();
        }

        public function invoke() {
            if(isset($_GET['action']))
            {
                $action = $_GET['action'];
                switch($action){
                    case 'listCity': 
                        $this->getListHotel();
                        break;
                }
            }
        }
        public function getListHotel()
        {
            if($_SESSION['login'] && $_SESSION['user']['isAdmin'] == 1)
            {
               $citys = $this->adminService->getListCity();
               include_once('../Views/QuanlyHotels.php');
               
            }
        }

        }
    (new CityController())->invoke();
?>