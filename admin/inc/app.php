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
        include "../config/config.php";
        $dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;';
        if (!$this->pdo)
            $this->pdo = new PDO($dns, DB_USERNAME, DB_PASSWORD, $this->PDO_OPTIONS);
    }
    public function run()
    {
        include_once "errors.php";
        include_once '../inc/helper.php';
        include_once "models/auth-model.php";
        include_once "models/products-model.php";
        include_once 'controllers/auth-controller.php';
        include_once 'controllers/products-controller.php';
        include_once 'controllers/admin-controller.php';
        include_once 'router.php';
        $errors = new Errors;
        $auth_model = new Auth_Model($this->pdo);
        $products_model = new Products_Model($this->pdo);
        $auth_controller = new Auth_Controller($auth_model , $this->pdo);
        $admin_controller = new Admin_Controller();
        $products_controller = new Products_Controller($products_model);

        $to_route_list = [
            "auth_controller" => $auth_controller,
            "products_controller" => $products_controller,
            "admin_controller" => $admin_controller,
        ];

        $router = new Router($to_route_list);
        $router->route();
       
        
    }
}

$app = new App();
$app->run();



?>