<?php

class Contact_Us_Controller
{
    public $errors;
    public function __construct($errors)
    {
        $this->errors = $errors;
    }
    public function render_contact_us_action()
    {
        $this->errors::add_error("Test boom~!");
        $this->errors::set_message("Test good boom~!");
        render('contact-us');
        
    }

    // Contact-us form handling
}