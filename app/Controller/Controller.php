<?php

namespace App\Controller;

abstract class Controller

{

    abstract function index();

    public function view($path) {
        if (file_exists($path)) {
            include $path; 
        } else {
            echo "Файл не найден.";
        }
    }
}