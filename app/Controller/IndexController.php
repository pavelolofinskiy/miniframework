<?php 

namespace app\Controller;

use app\Controller\Controller;

class IndexController extends Controller {
    public function index() {
        $this->view('app/View/IndexView.php');
    }
}