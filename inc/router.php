<?php 
    class Router{
        public $etc_controller;
        public $auth_controller;
        public function __construct($etc_controller, $auth_controller){
            $this->etc_controller = $etc_controller;
            $this->auth_controller = $auth_controller;

        }
        public function route(){
            switch($_GET['action']){
                case '1':
                    echo 'actions';
                default:
                    $this->etc_controller->render_main_page_action();
            }
        }

    }



