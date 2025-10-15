<?php 

namespace app\Controller;

use core\Controller\Controller;

class IndexController extends Controller {
    public function index() {
        $data['mydata'] = 'lol';
        $this->view('IndexView', $data);

        
    }
}