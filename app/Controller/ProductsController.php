<?php 

namespace app\Controller;

use app\Controller\Controller;

class ProductsController extends Controller {
    public function index() {
        echo 'Do you want some apples?';
    }

    public function show($id) {
        print_r($id . 'hi'); die;
    }

    public function edit($id) {
        print_r($id . 'edit'); die;
    }
}