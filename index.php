<?php

require_once('vendor/autoload.php');

// Load app configs
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Load URL routes
require_once('src/routes.php');