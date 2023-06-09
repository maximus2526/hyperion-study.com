<?php
class Errors
{
    static function has_errors()
    {
        return !empty($_SESSION['errors']);
    }

    static function has_message()
    {
        return !empty($_SESSION['success']);
    }

    static public function add_error(string $error_text)
    {
        $_SESSION['errors'][] = $error_text;
    }

    static public function set_message(string $message_text)
    {
        $_SESSION['success'] = $message_text;
    }

    static public function display()
    {
        if (Errors::has_message()) {
            Errors::tamplate_massage();
        } 
        elseif(Errors::has_errors()) {
            Errors::tamplate_error();
        }
        Errors::clean();
    }


    static public function clean()
    {
        unset($_SESSION['errors']);
        unset($_SESSION['success']);
    }

    static public function tamplate_massage()
    {
        if (!empty($_SESSION['success'])) {
            echo "<div class='massage'>";
            $message = $_SESSION['success'];
            echo "<p class='massage-text'>{$message}</p>";
            echo "</div>";
        }
    }

    static public function tamplate_error()
    {
        if (!empty($_SESSION['errors'])) {
            echo "<div class='errors'>";
            echo "<p class='text'>We are having problems:</p>";
            foreach ($_SESSION['errors'] as $error) {
                echo "<p class='text bold'>$error</p>";
            }
            echo "</div>";
        }
    }



}