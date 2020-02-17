<?php

use Core\Router;

    require_once dirname(__DIR__) . '/vendor/autoload.php';

    spl_autoload_register(function ($class)
    {
        $root = dirname(__DIR__);
        $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
        if (is_readable($file))
        {
            require $root . '/' . str_replace('\\', '/', $class) . '.php';
        }
    });

    set_error_handler('Core\Error::errorHandler');
    set_exception_handler('Core\Error::exceptionHandler');

    $router = new Router();
    
    $router->add('', ['controller' => 'Home', 'action' => 'index']);
    $router->add('home', ['controller' => 'Home', 'action' => 'index']);
    $router->add('{controller}/{action}');
    $router->add('{controller}/{id:\d+}/{action}');
    $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
    
    $url = $_SERVER['QUERY_STRING'];
    $router->dispatch($url);
    
?>