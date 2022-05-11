<?php

// Display all warnings and errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Starting the session so that is available on all pages
session_start();

//Base path configuration
define('BP', __DIR__ . DIRECTORY_SEPARATOR);
define('BP_APP', __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);

//Defining our routes
$routes = implode(PATH_SEPARATOR, [
    BP_APP . 'model',
    BP_APP . 'controller',
    BP_APP . 'core'
]);

//Include routes into path
set_include_path($routes);

//Autoload register
spl_autoload_register(function ($class) {
    $routes = explode(PATH_SEPARATOR, get_include_path());
    foreach ($routes as $route) {
        $file = $route . DIRECTORY_SEPARATOR . $class . '.php';
        if (file_exists($file)) {
            include_once $file;
            break;
        }
    }
});

// and boom! Let's go!
App::start();