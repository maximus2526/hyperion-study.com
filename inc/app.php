<?php


class App
{
    public $pdo;
    public $PDO_OPTIONS;
    public function __construct()
    {
        $this->PDO_OPTIONS = $PDO_OPTIONS = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        // create session
        if (empty($_SESSION))
            session_start();
        // connect to db
        include "config.php";
        $dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;';
        if (!$this->pdo)
            $this->pdo = new PDO($dns, DB_USERNAME, DB_PASSWORD, $this->PDO_OPTIONS);
    }
    public function run()
    {
        include_once 'helper.php';
        include_once "models/products-model.php";
        include_once "errors.php";
        include_once 'controllers/pages-controller.php';
        include_once 'controllers/shop-controller.php';
        include_once 'controllers/single-product-controller.php';
        include_once 'controllers/contact-us-controller.php';
        include_once 'router.php';
        $products_model = new Products_Model($this->pdo);
        $pages_controller = new Pages_Controller($products_model);
        $shop_controller = new Shop_Controller($products_model);
        $contact_us_controller = new Contact_Us_Controller();
        $single_product_controller = new Single_Product_Controller($products_model);
        $router = new Router($pages_controller, $shop_controller, $single_product_controller, $contact_us_controller);
        $router->route();
    }
}

$app = new App();
$app->run();
?>