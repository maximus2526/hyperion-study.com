<?php
class Router
{
    public $pages_controller;
    public $shop_controller;
    public $single_product_controller;
    public $contact_us_controller;
    public $cart_controller;
    public $order_controller;
    public function __construct(array $to_route_list)
    {
        $this->pages_controller = $to_route_list['pages_controller'];
        $this->shop_controller = $to_route_list['shop_controller'];
        $this->single_product_controller = $to_route_list['single_product_controller'];
        $this->contact_us_controller = $to_route_list['contact_us_controller'];
        $this->cart_controller = $to_route_list['cart_controller'];
        $this->order_controller = $to_route_list['order_controller'];
    }
    public function route()
    {
        switch ($_GET['action']) {
            case 'shop':
                $this->shop_controller->render_action();
                break;
            case 'add-to-cart':
                $this->cart_controller->add_action();
                break;
            case 'cart':
                if (isset($_GET["delete_product"])) {
                    $this->cart_controller->delete_action();
                }
                $this->cart_controller->render_action();
                break;
            case 'post-order':
                if(isset($_POST['add_order'])) {
                    $this->order_controller->post_action();
                } elseif (isset($_POST['increase_cart'])) {
                    $this->cart_controller->increase_count();
                }
                break;
            case 'about-us':
                $this->pages_controller->render_action();
                break;
            case 'contact-us':
                $this->contact_us_controller->render_action();
                break;
            case 'product':
                $this->shop_controller->render_single_action();
                break;
            case 'order-complete':
                $this->order_controller->render_action();
                break;
            default:
                $this->pages_controller->render_main_page_action();
        }
    }

}