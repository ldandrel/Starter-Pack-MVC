<?php

require dirname(__DIR__) . '/vendor/autoload.php';

session_start();

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Posts', 'action' => 'Home']);


$router->dispatch($_SERVER['QUERY_STRING']);
