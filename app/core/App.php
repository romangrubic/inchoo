<?php

class App
{
    public static function start()
    {
        $route = App::getRoute();
        $parts = explode(DIRECTORY_SEPARATOR, $route);

        // This one takes parts[1] and sets the name of the controller class
        $class='';
        if (!isset($parts[1]) || $parts[1] === '') {
            $class = 'Index';
        } else {
            $class = ucfirst($parts[1]);
        }
        $class .= 'Controller';

        // This one takes parts[2] and sets the name of the method
        $method = '';
        if (!isset($parts[2]) || $parts[2] == '') {
            $method = 'index';
        } else {
            $method = lcfirst($parts[2]);
        }

        // Now we check if the class and method in the same class exist and activate it. Otherwise we show 404error page.
        if (class_exists($class) && method_exists($class, $method)) {
            $instance = new $class();
            $instance->$method();
        } else {
            $view = new View();
            $view->render('error404', [
                'error' => $class . '->' . $method
            ]);
        }
    }

    // Getting the user route so that we can use it to point to correct controller and method
    public static function getRoute()
    {
        $route = '/';

        if (isset($_SERVER['REDIRECT_PATH_INFO'])) {
            $route = $_SERVER['REDIRECT_PATH_INFO'];
        } else if (isset($_SERVER['REQUEST_URI'])) {
            $route = $_SERVER['REQUEST_URI'];
        }

        return $route;
    }
}