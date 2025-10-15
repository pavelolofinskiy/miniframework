<?php 

namespace app\Controller;

use core\Controller\Controller;

class IndexController extends Controller {
    public function index($request) {
        $data['url'] = '/products/test';
        $this->view('IndexView', $data);
    }
}