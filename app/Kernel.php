<?php
namespace app;

use core\DI\Container;
use app\web\Web;

class Kernel {
    public function handle() {
        try {
            $container = new Container();

            $web = $container->get(Web::class);

            $web->run();
        } catch (\Throwable $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}