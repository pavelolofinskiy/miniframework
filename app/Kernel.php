<?php 

namespace app;

use core\Router\Router;

use core\Http\Request;

use app\web\Web;

class Kernel {
    public function handle() {
        try {
            $request = new Request;

            $router = new Router($request);

            $urls = new Web($router);

            $urls->run();
        } catch(\Throwable $e) {
            echo "Ошибка:" . $e->getMessage();
        }
    }
}