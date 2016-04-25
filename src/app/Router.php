<?php

namespace app;

use controller\ErrorController;

/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class Router
{

    protected $routes;

    private $error;

    /**
     * @param array() $router
     */
    function __construct($routes)
    {
        $this->routes = $routes;
        $this->error  = new ErrorController();
    }

    /**
     * @param string $url
     */
    public function getRoute($url)
    {
        // Clean the url
        $url_parts = $this->getCleanPathPart($url);
        // Find the key equal with the url
        $router_keys = array_keys($this->routes);
        $key_counter = 0;
        $valid_route = false;
        while (!$valid_route && $key_counter < count($router_keys)) {
            $route_key = $router_keys[$key_counter];
            // Clean the route
            $route_parts = $this->getCleanPathPart($route_key);
            $url_params  = array();
            // Check if the path as the same size
            if (count($url_parts) == count($route_parts)) {
                $valid_route = true;
                for ($i = 0; $i < count($url_parts); $i++) {
                    if ($url_parts[$i] == $route_parts[$i]) {
                        // part as equal, do nothing
                    } elseif (strpos($route_parts[$i], ':') !== false) {
                        // attribut found
                        $url_params[str_replace(':', '', $route_parts[$i])] = $url_parts[$i];
                    } else {
                        $valid_route = false;
                    }
                }
            }
            if ($valid_route) {
                // Route valid, get the controller and action
                $route           = $this->routes[$route_key];
                $controller_name = 'controller\\' . $route['Controller'] . 'Controller';
                $controller      = new $controller_name();
                $action_name     = $route['Action'] . 'Action';
                $controller->$action_name($url_params);
            }
            $key_counter++;
        }
        if (!$valid_route) {
            // Route not found, get 404 error
            $this->error->IndexAction();
        }
    }

    /**
     * @param string $path
     *
     * @return array
     */
    private function getCleanPathPart($path)
    {
        $path = strtolower($path);
        if (strpos($path, '?') !== false) {
            $path = substr($path, 0, strpos($path, '?'));
        }

        return array_values(
            array_filter(
                explode('/', $path),
                function ($value) {
                    return $value != '';
                }
            )
        );
    }
}
 