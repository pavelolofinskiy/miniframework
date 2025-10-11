<?php 

namespace App\Router;

use app\Router\Request;
use app\View\View;

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
        $request = new Request($this->routes);
        
        [$callback, $id] = $request->parseUrl($this->routes);

        if ($callback === null) {
            $view = new View;
            return $view->render('NotFoundView');
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