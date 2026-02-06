<?php

namespace core\Http;

class Request {
    public $method;

    public  $path;

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

    public function all() {
        return $_POST;
    }

    public function user() {
        return $_SESSION['user'] ?? null;
    }

    public function input(string $key, $default = null) {
        return $_POST[$key] ?? $_GET[$key] ?? $default;
    }

    public function query(string $key, $default = null) {
        return $_GET[$key] ?? $default;
    }

    public function header(string $key, $default = null) {
        $key = 'HTTP_' . strtoupper(str_replace('-', '_', $key));
        return $_SERVER[$key] ?? $default;
    }

    public function getUri(): string {
        return $_SERVER['REQUEST_URI'] ?? '/';
    }
}
