<?php
use app\Router;

define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME']);

require_once 'app/Autoloader.php';
Autoloader::register();

//
$url = $_SERVER['REQUEST_URI'];

$routes = array(
    '/'                       => array('Controller' => 'Index', 'Action' => 'Index'),
    '/utilisateur/:id'        => array('Controller' => 'Index', 'Action' => 'User'),
    '/utilisateur/toggle/:id' => array('Controller' => 'Index', 'Action' => 'AjaxUserToggle')
);

$router = new Router($routes);

$router->getRoute($url);



