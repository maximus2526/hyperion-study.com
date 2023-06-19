<?php

class Hyperion_Controller{
    public $hyperion_model;
    public $errors;
    public function __construct($hyperion_model){
        $this->hyperion_model = $hyperion_model;
    }

    public function render_main_page_action(){
        render('home');
    }
    public function render_shop_action(){
        render('shop');
    }
    public function render_about_us_action(){
        render('about-us');
    }
    public function render_contact_us_action(){
        render('contact-us');
    }
    public function render_single_page_action(){
        render('single-page');
    }




}