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
        'page_num'
    ];

    $queryArray = [];
    parse_str($_SERVER['QUERY_STRING'], $queryArray);
    $queryParams = [];

    foreach ($params_list as $param) {
        if (isset($queryArray[$param])) {
            $queryParams[$param] = $queryArray[$param];
        }
    }

    if (!empty($current_param)) {
        $queryParams = array_merge($queryParams, $current_param);
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

function throw_404()
{
    redirect("404.php");
}