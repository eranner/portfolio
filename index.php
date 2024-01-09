<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    '/' => 'controllers/index.php'
];

function routeToController($uri, $routes) {
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    } else {
        abort(404);
        
    }
}
routeToController($uri, $routes);
function abort($code = 404) {
    http_response_code($code);
    if ($code == 404) {
        require "views/404.php"; // Assuming you have a 404.php file in the 'views' directory
    } else {
        require "controllers/{$code}.php";
    }
    die();
}