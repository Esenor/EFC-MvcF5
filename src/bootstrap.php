<?php
use controller\IndexController;
use controller\ErrorController;

define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);

require_once 'app/Autoloader.php';
Autoloader::register();

// load controller
$application = new IndexController();
$error       = new ErrorController();

//
$url = $_SERVER['REQUEST_URI'];


$router = array(
    '/'      => array('Controller' => 'Index', 'Action' => 'Index'),
    '/hello' => array('Controller' => 'Index', 'Action' => 'Azerty')
);

if (array_key_exists($url, $router)) {
    $route           = $router[$url];
    $controller_name = 'controller\\' . $route['Controller'] . 'Controller';
    $controller      = new $controller_name();
    $action_name     = $route['Action'] . 'Action';
    $controller->$action_name();
} else {
    $error->IndexAction();
}

