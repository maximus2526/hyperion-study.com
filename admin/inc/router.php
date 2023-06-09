<?php
class Router
{
    public $products_controller;
    public $orders_controller;
    public $auth_controller;
    public $admin_controller;

    public function __construct(array $to_route_list)
    {
        $this->products_controller = $to_route_list['products_controller'];
        $this->orders_controller = $to_route_list['orders_controller'];
        $this->auth_controller = $to_route_list['auth_controller'];
        $this->admin_controller = $to_route_list['admin_controller'];
    }
    public function route()
    {
        if (!is_logged_in()) {
            switch ($_GET['action']) {
                case 'auth':
                    $this->auth_controller->render_action();
                    break;
                case 'login':
                    $this->auth_controller->login_action();
                    break;
                case 'register':
                    $this->auth_controller->register_action();
                    break;
                default:
                    redirect('admin/?action=auth');
            }
        } else {
            switch ($_GET['action']) {
                case 'products':
                    $this->products_controller->render_action();
                    break;
                case 'delete-products':
                    $this->products_controller->delete_action();
                    break;
                case 'update-product':
                    $this->products_controller->update_action();
                    break;
                case 'add-product':
                    $this->products_controller->add_action();
                    break;
                case 'orders':
                    $this->orders_controller->render_action();
                    break;
                case 'order':
                    $this->orders_controller->render_single_action();
                    break;
                case 'delete-orders':
                    $this->orders_controller->delete_action();
                    break;
                case 'logout':
                    $this->auth_controller->log_out_action();
                    break;
                default:
                    $this->admin_controller->render_action();
            }
        }


    }


}