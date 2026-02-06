<?php

namespace app\Middleware;

class Middlewares {
    public const LIST = [
        LogMiddleware::class,
        // AuthMiddleware::class,
    ];
}