<?php

use Framework\Kernel;
use Framework\Request;

require __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel();

//define routes
$router = $kernel->getRouter();
$router->addRoute("GET", "/", "Welcome to Taskey");
$router->addRoute("GET", "/about", "About");
$router->addRoute("GET", "/admin", "all your base are belong to us");

/**
 * extract path from URI
 */
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (!is_string($urlPath)) {
    $urlPath = '/';
}

$request = new Request($_SERVER['REQUEST_METHOD'], $urlPath, $_GET, $_POST);

$response = $kernel->handle($request);

$response->echo();
