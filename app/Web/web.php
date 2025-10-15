<?php

namespace app\web;

use app\Controller\ProductsController;

use app\Controller\IndexController;

class Web {
    private $router;

    public function __construct($router) {
        $this->router = $router;
    }

    public function run() {
        $this->router->get('/products/{id}', [ProductsController::class, 'show']);
        $this->router->post('/products/test', [ProductsController::class, 'test']);
        $this->router->get('/products/{id}/edit', [ProductsController::class, 'edit']);
        $this->router->get('/', [IndexController::class, 'index']);
        $this->router->get('/products', [ProductsController::class, 'index']);
        $this->router->get('/products/add', [ProductsController::class, 'add']);

        $this->router->resolve();
    }
}