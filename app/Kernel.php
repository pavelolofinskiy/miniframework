<?php 

namespace app;

use core\Router\Router;

use core\Http\Request;

use app\web\Web;

class Kernel {
    public function handle() {
        $request = new Request;

        $router = new Router($request);

        $urls = new Web($router);

        $urls->run();
    }
}