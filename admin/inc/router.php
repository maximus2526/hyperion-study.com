<?php
class Router
{
    public $products_controller;
    public $auth_controller;
    public $admin_controller;

    public function __construct(array $to_route_list)
    {
        $this->products_controller = $to_route_list['products_controller'];
        $this->auth_controller = $to_route_list['auth_controller'];
        $this->admin_controller = $to_route_list['admin_controller'];
    }
    public function route()
    {
        switch ($_GET['action']) {
            case 'login':
                $this->auth_controller->login_action();
                break;
            case 'register':
                $this->auth_controller->add_user_action();
                break;     
            default:        
            if (!is_logged_in()) {
                $this->auth_controller->render_login_action();
            } else {
                $this->admin_controller->render_main_page_action();
            }
                
        }
    }

}