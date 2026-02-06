<?php
namespace app\Middleware;

use core\Http\Request;
use core\Http\MiddlewareInterface;

class LogMiddleware implements MiddlewareInterface {
    public function handle(Request $request, callable $next) {
        error_log('Request: ' . $request->getUri());

        $response = $next($request);

        error_log('Response sent');

        return $response;
    }
}