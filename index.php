<?php
spl_autoload_register(function ($class){
    $path = str_replace('\\','/',$class).".php";
    if(file_exists($path)){
        require $path;
    }
});

use app\Controller\Controller;

use app\Controller\IndexController;

use app\Router\Router;

$router = new Router;

$router->get('/', [IndexController::class, 'index']);

echo $router->resolve();
?>