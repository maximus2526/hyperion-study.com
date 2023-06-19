<?php 
    class Router{
        public $hyperion_controller;
        public function __construct($hyperion_controller){
            $this->hyperion_controller = $hyperion_controller;

        }
        public function route(){
            switch($_GET['action']){
                case 'shop':
                    $this->hyperion_controller->render_shop_action();
                    break;
                case 'about-us':
                    $this->hyperion_controller->render_about_us_action();
                    break;
                case 'contact-us':
                    $this->hyperion_controller->render_contact_us_action();
                    break;
                case 'single-page':
                    $this->hyperion_controller->render_single_page_action();
                    break;
                default:
                    $this->hyperion_controller->render_main_page_action();
            }
        }

    }





