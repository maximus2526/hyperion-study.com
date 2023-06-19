<?php 


    class App{
        public function run(){
            include_once 'helper.php';
            include_once "models/hyperion-model.php";
            include_once "errors.php";
            include_once 'controllers/hyperion-controller.php';
            include_once 'router.php';
            $hyperion_model = new Hyperion_Model();
            $hyperion_controller = new Hyperion_Controller($hyperion_model);
            $router = new Router($hyperion_controller);
            $router->route();
            
        }
    }

    $app = new App();
    $app->run();
?>