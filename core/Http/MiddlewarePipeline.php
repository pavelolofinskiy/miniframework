<?php
namespace core\Http;

use core\DI\Container;

class MiddlewarePipeline {
    private array $middlewares;
    private Container $container;

    public function __construct(Container $container, array $middlewares) {
        $this->container = $container;
        $this->middlewares = $middlewares;
    }

    public function handle(Request $request, callable $destination) {
        $pipeline = array_reduce(
            array_reverse($this->middlewares),
            function ($next, $middleware) {
                return function (Request $request) use ($next, $middleware) {
                    $instance = $this->container->get($middleware);
                    return $instance->handle($request, $next);
                };
            },
            $destination
        );

        return $pipeline($request);
    }
}