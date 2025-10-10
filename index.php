<?php

use app\Controller\IndexController;

use app\Controller\ProductsController;

use app\Router\Router;

spl_autoload_register(function ($class){
    $path = str_replace('\\','/',$class).".php";
    if(file_exists($path)){
        require $path;
    }
});



$router = new Router;


$router->get('/products/{id}', [ProductsController::class, 'show']);
$router->get('/', [IndexController::class, 'index']);
$router->get('/products', [ProductsController::class, 'index']);


$router->resolve();

?>