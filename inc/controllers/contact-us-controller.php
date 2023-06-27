<?php

class Contact_Us_Controller {

    public function render_contact_us_action()
    {
        Errors::add_error("Test boom~!");
        Errors::set_message("Test good boom~!");
        render('contact-us');
        
    }

    // Contact-us form handling
}