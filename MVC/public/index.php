<?php

    // require '../App/Controllers/Posts.php';
    // require '../Core/Router.php';

    require_once dirname(__DIR__) . '/vendor/autoload.php';

    spl_autoload_register(function ($class) {
        $root = dirname(__DIR__);
        $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
        if (is_readable($file)) {
            require $root . '/' . str_replace('\\', '/', $class) . '.php';
        }
    });

    $router = new Core\Router();
    
    $router->add('', ['controller' => 'Home', 'action' => 'index']);
    $router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
    $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
    $router->add('{controller}/{action}');
    $router->add('{controller}/{id:\d+}/{action}');
    
    $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
    // $router->add('{admin}/{action}/{controller}');

    $url = $_SERVER['QUERY_STRING'];
    // $router->dispatch($url);
    
    
    echo '<pre>';
    echo htmlspecialchars(print_r($router->getRoutes(), true));

    if ($router->matchURL($url)) {
        print_r($router->getParams());
        echo '</pre>';
    }
    else {
        echo 'No route found for URL: ' . $url;
    }
    
    
?>

<!-- <form method="POST">
        <input type="text" name="name">
        <input type="submit" value="Check" name="submit">
</form> -->