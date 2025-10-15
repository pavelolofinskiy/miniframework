<?php 

namespace app\Controller;

use core\Controller\Controller;

use App\Model\Product;

class ProductsController extends Controller {
    public function index($request) {
        echo 'Do you want some apples?';
    }

    public function show($id) {
        print_r($id . 'hi'); 
    }

    public function edit($id) {
        print_r($id . 'edit'); 
    }

    public function add() {
        $product = new Product;
        $product->add('name', 'test');
    }

    public function test($request) {
        $data = $request->all();
        print_r($data['username']); die;
    }
}