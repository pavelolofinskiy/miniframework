<?php
namespace core\Http;

interface MiddlewareInterface {
    public function handle(Request $request, callable $next);
}