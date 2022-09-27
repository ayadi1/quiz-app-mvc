<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$config = require_once __DIR__ . '/config/config.php';

use App\Controllers\DashboardController;
use App\Controllers\LoginController;

// register router start
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    //login start
    $r->get('/login', LoginController::class . ':show');
    $r->post('/login', LoginController::class . ':store');
    //login end
    //dashboard start
    $r->get('/dashboard', DashboardController::class . ':show');
//dashboard end
});
// register router end
// Fetch method and URI from somewhere start
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$uri = str_replace($config['base_url'], '/', $uri);
// Fetch method and URI from somewhere end


$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        list($class, $method) = explode(":", $handler, 2);
        call_user_func_array(array(new $class, $method), $vars);

        break;
}
