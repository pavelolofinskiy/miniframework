<?php
spl_autoload_register(function ($class){
    $path = str_replace('\\','/',$class).".php";
    if(file_exists($path)){
        require $path;
    }
});

use app\Model\Model;

use app\Controller\Controller;

use app\View\View;

$model = new Model();

$controller = new Controller($model);

class SimpleView extends View {

    public function __construct(Model $model, Controller $controller) {
        parent::__construct($controller, $model); 
    }

    public function echoText() {
        echo $this->output();
    }
    
}

$output = new SimpleView($model, $controller);
$output->echoText();

