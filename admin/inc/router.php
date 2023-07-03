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
        if (!is_logged_in()) {
            $this->auth_controller->render_login_action();
        } else {
            switch ($_GET['action']) {
                case 'login':
                    $this->auth_controller->login_action();
                    break;
                case 'register':
                    $this->auth_controller->add_user_action();
                    break;
                case 'products':
                    $this->products_controller->render_products_action();
                    break;
                case 'delete-products':
                    $this->products_controller->delete_products_action();
                    break;
                case 'update-product':
                    $this->products_controller->update_product_action();
                    break;
                case 'add-product':
                    $this->products_controller->add_product_action();
                    break;
                case 'logout':
                    $this->auth_controller->log_out_action();
                    break;

                default:
                    $this->admin_controller->render_main_page_action();
            }

        }
    }

}