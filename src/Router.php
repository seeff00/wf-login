<?php

namespace App;

use Exception;

class Router
{
    protected array $routes = [];

    public function get($route, $controller, $action) {
        if ($_SERVER["REQUEST_METHOD"] !== 'GET'){
            return;
        }

        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function post($route, $controller, $action) {
        if ($_SERVER["REQUEST_METHOD"] !== 'POST'){
            return;
        }

        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function put($route, $controller, $action) {
        if ($_SERVER["REQUEST_METHOD"] !== 'PUT'){
            return;
        }

        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function delete($route, $controller, $action) {
        if ($_SERVER["REQUEST_METHOD"] !== 'DELETE'){
            return;
        }

        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
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