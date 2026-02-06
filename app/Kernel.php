<?php
namespace app;

use core\DI\Container;
use core\Http\Request;
use core\Http\MiddlewarePipeline;
use app\web\Web;
use app\Middleware\AuthMiddleware;
use app\Middleware\LogMiddleware;
use app\Middleware\Middlewares;

class Kernel {
    public function handle() {
        try {
            $container = new Container();

            $request = $container->get(Request::class);

            $pipeline = new MiddlewarePipeline(
                $container,
                Middlewares::LIST,
            );

            $pipeline->handle($request, function ($request) use ($container) {
                return $container->get(Web::class)->run($request);
            });

        } catch (\Throwable $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}