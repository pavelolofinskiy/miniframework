<?php

namespace core\Controller;

use app\View\View;

abstract class Controller

{
    abstract function index();

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function view($path, $data = []) {
        $this->view->render($path, $data);
    }

    public function notFound()
    {
        $this->view('NotFoundView');
    }
}