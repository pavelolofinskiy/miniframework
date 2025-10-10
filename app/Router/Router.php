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
        
        if(strpos(array_keys($this->routes['GET'])[0], "{id}")) {
            $parts = explode('/', trim($path, '/'));
            $id = end($parts);
            $parsed_path = str_replace($id, '{id}', array_keys($this->routes['GET'])[0]);
            
            $callback = $this->routes[$method][$parsed_path] ?? null;
        } else {
            $callback = $this->routes[$method][$path] ?? null;
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