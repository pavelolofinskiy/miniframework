<?php

use core\Router\Router;

use core\Http\Request;

use app\web\Web;

spl_autoload_register(function ($class){
    $path = str_replace('\\','/',$class).".php";
    if(file_exists($path)){
        require $path;
    }
});

$request = new Request;

$router = new Router($request);

$urls = new Web($router);

$urls->run();

?>