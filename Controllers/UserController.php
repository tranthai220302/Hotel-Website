<?php
    session_start();
    include_once("../Models/Service/UserService.php");
    class UserController {
        private $adminService = NULL;
        public function __construct(){
            $this->adminService = new UserService();
        }

        public function invoke() {
            $this->login();
        }

        public function login() {
            if($this->adminService->getListUser()) {
                $listUser = "helo";
                include_once("../views/index.php");
            }
            $listUser = "helo";
            include_once("../views/index.php");
            
        }
        
    }
    (new UserController())->invoke();
?>