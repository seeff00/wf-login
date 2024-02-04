<?php

use App\Router;
use App\Controller\UserController;

$router = new Router();

// Home page
$router->get('/', UserController::class, 'index');

// Login page
$router->get('/login', UserController::class, 'login');
$router->post('/login', UserController::class, 'loginPost');

// Registration page
$router->get('/register', UserController::class, 'register');
$router->post('/register', UserController::class, 'registerPost');

// Logout page
$router->get('/logout', UserController::class, 'logout');

try {
    $router->dispatch($_SERVER['REQUEST_URI']);
} catch (Exception $e) {
    echo $e->getMessage();
}