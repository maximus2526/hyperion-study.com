<?php
class Auth_Controller{

    public $auth;
    public $pdo;
    public function __construct($auth, $pdo){
        $this->auth = $auth;
        $this->pdo = $pdo;
    }

    public function render_login_action(){
        if(!is_logged_in()){
            render_auth('auth'); 
        }
    }
    public function is_user_exist($user_name){
        // Returns 1 / 0
        $params = ['user_name' => $user_name ];
        $sql = "SELECT(EXISTS(SELECT `user_id` FROM `users` WHERE  `user_name` = :user_name));";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement->fetchColumn(); 
    }
    public function login_action(){
        if (!is_logged_in()){
            $user_name = strip_tags($_POST['user_login']);
            $password = $_POST['user_password'];
            if ($this->auth->check_password($password, $user_name)){
                if(!Errors::has_errors()){
                    $user_id = $this->auth->get_user_id($user_name);
                    $this->auth->log_in($user_id);
                    Errors::set_message("You successfully logined!");
                    redirect('admin/');
                }
                
            } else {
                Errors::add_error('Invalid password!');
                redirect('admin/?action=auth');
            }      
        } else {
            Errors::add_error("User is logged in.");
            redirect('admin/');
        }
    }

    public function add_user_action(){
        if (!is_logged_in()){
            $user_name = htmlspecialchars($_POST['user_name']);
            $password = htmlspecialchars($_POST['user_password']);
            $password_repeat = htmlspecialchars($_POST['user_password_repeat']);
            $user_existense = $this->auth->is_user_exist($user_name);
            if($user_existense == 1){
                Errors::add_error("Username is used.");
                redirect('admin/?action=auth');
            }
            else if ((strlen($user_name) < 5) or (strlen($user_name) > 20)){
                Errors::add_error('The required login is more than 5 characters or less then 20 chars.');
                redirect('admin/?action=auth');
            }
            else if((strlen($password ) < 5) or (strlen($password ) > 25)){
                Errors::add_error('Bad password. The required password is more than 5 characters and lesser then 25 chars. ');
                redirect('admin/?action=auth');
            } 
            else if($password != $password_repeat){
                Errors::add_error("Passwords don't match");
                redirect('admin/?action=auth');
            }
            else if(!Errors::has_errors()){
                $user_id = $this->auth->add_user($user_name, $password);
                $this->auth->log_in($user_id);
                Errors::set_message("Register complete! You auto logined and redirected to main page.");
                redirect();
            } else{
                redirect('admin/?action=auth');
            }
        } else {
            Errors::add_error("User is logged in.");
            redirect();
        }
    }

    public function log_out_action(){
        if(is_logged_in()){
            $this->auth->log_out();
        }
        redirect('admin/');
    }


}




?>