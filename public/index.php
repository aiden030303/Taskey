<?php

use App\Controllers\HomeController;
use App\Controllers\TaskController;
use Framework\Kernel;
use Framework\Request;

require __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel();

//define routes
$router = $kernel->getRouter();
$homeController = new HomeController();
$router->addRoute("GET", "/", [$homeController, "index"]);
$router->addRoute("GET", "/about", [$homeController, "about"]);

$taskController = new TaskController();
$router->addRoute("GET", "/tasks", [$taskController, "index"]);
$router->addRoute("GET", "/tasks/create", [$taskController, "create"]);

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
