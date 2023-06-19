<?php
function get_url(){
    return 'http://' . $_SERVER['SERVER_NAME'];
}

function redirect(string $path = ''){
    header("Location: /".$path);
}

function render(string $name){
    include_once 'views/header.php';
    include_once 'views/' . $name . '.php';
    include_once 'views/footer.php';
}