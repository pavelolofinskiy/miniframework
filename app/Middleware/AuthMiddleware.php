<?php
namespace app\Middleware;

use core\Http\Request;
use core\Http\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface {
    public function handle(Request $request, callable $next) {
        if (!$request->user()) {
            throw new \Exception('Unauthorized');
        }

        return $next($request);
    }
}