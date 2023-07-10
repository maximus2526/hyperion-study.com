<?php
function get_url()
{
    return 'http://' . $_SERVER['SERVER_NAME'];
}

function get_param_query($current_param)
{
    $params_list = [
        'action',
        'count_of_products',
        'layout',
        'page_num',
    ];

    $sort_params = [
        'by-name',
        'by-price',
        'by-date',
    ];

    $queryArray = [];
    parse_str($_SERVER['QUERY_STRING'], $queryArray);
    $queryParams = [];

    foreach ($params_list as $param) {
        if (isset($queryArray[$param])) {
            $queryParams[$param] = $queryArray[$param];
        }
    }

    foreach ($sort_params as $sort_param) {
        if (isset($current_param[$sort_param])) {
            $queryParams[$sort_param] = $current_param[$sort_param];
            break; 
        }
    }

    return http_build_query($queryParams);
}




function redirect(string $path = '')
{
    header("Location: /" . $path);
}

function render(string $name, array $tamplate_data = NULL)
{
    if (isset($tamplate_data))
        extract($tamplate_data);
    include_once 'views/header.php';
    include_once 'views/' . $name . '.php';
    include_once 'views/footer.php';
}

function render_admin_pages(string $name, array $tamplate_data = NULL)
{
    if (isset($tamplate_data))
        extract($tamplate_data);
    include_once 'views/header.php';
    include_once 'views/base.php';
}

function throw_404()
{
    redirect("404.php");
}

function render_auth(string $name)
{
    include_once 'views/' . $name . '.php';
}

function is_logged_in(){
    return isset($_SESSION["user_id"]);
}





