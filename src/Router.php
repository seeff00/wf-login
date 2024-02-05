<?php

namespace App;

use Exception;

class Router
{
    /**
     * @var array
     */
    protected array $routes = [];

    /**
     * Creates HTTP GET route handler
     * @param $route
     * @param $controller
     * @param $action
     * @return void
     */
    public function get($route, $controller, $action) {
        if ($_SERVER["REQUEST_METHOD"] !== 'GET'){
            return;
        }

        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * Creates HTTP POST route handler
     * @param $route
     * @param $controller
     * @param $action
     * @return void
     */
    public function post($route, $controller, $action) {
        if ($_SERVER["REQUEST_METHOD"] !== 'POST'){
            return;
        }

        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * Creates HTTP PUT route handler
     * @param $route
     * @param $controller
     * @param $action
     * @return void
     */
    public function put($route, $controller, $action) {
        if ($_SERVER["REQUEST_METHOD"] !== 'PUT'){
            return;
        }

        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * Creates HTTP DELETE route handler
     * @param $route
     * @param $controller
     * @param $action
     * @return void
     */
    public function delete($route, $controller, $action) {
        if ($_SERVER["REQUEST_METHOD"] !== 'DELETE'){
            return;
        }

        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * Dispatch registered routes and handles unregistered
     * @throws Exception
     */
    public function dispatch($uri) {
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new Exception("No route found for URI: $uri");
        }
    }
}