<?php
use core\Router;

require_once 'core/Autoloader.php';
require_once 'config/Approutes.php';

define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME']);

Autoloader::register();
$router = new Router(Approutes::getRoutes());

$url = $_SERVER['REQUEST_URI'];
$router->getRoute($url);