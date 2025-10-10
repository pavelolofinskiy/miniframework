<?php 

namespace App\Router;

class Router
{
    private array $routes = [];
    
    public function get(string $path, callable|array $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }
    
    public function post(string $path, callable|array $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }
    
    public function resolve(): mixed
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $path = explode('?', $path)[0];
        
        $callback = null;
        $id = null;

        foreach ($this->routes[$method] ?? [] as $routePath => $routeCallback) {
            if (strpos($routePath, '{id}') !== false) {
                $pattern = '#^' . str_replace('{id}', '(\d+)', $routePath) . '$#';
                if (preg_match($pattern, $path, $matches)) {
                    $callback = $routeCallback;
                    $id = $matches[1];
                    break;
                }
            } elseif ($routePath === $path) {
                $callback = $routeCallback;
                break;
            }
        }

        
        if ($callback === null) {
            http_response_code(404);
            return "404 Not Found";
        }
        
        if (is_array($callback)) {
            [$class, $method] = $callback;
            $controller = new $class();
            if (isset($id)) {
                return $controller->$method($id);
            } else {
                return $controller->$method();
            }
        }
        
        return $callback();
    }
}