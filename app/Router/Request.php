<?php

namespace App\Router;

class Request {
    protected $method;

    protected  $path;

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $this->path = explode('?', $uri)[0];
    }

    public function parseUrl($routes) {

        $callback = null;
        $id = null;

        foreach ($routes[$this->method] ?? [] as $routePath => $routeCallback) {
            if (strpos($routePath, '{id}') !== false) {
                $pattern = '#^' . str_replace('{id}', '(\d+)', $routePath) . '$#';
                if (preg_match($pattern, $this->path, $matches)) {
                    $callback = $routeCallback;
                    $id = $matches[1];
                    break;
                }
            } elseif ($routePath === $this->path) {
                $callback = $routeCallback;
                break;
            }
        }

        return [$callback, $id];

    }
}