<?php 

namespace app\Controller;

use app\Controller\Controller;

use app\Model\Model;

class ProductsController extends Controller {
    public function index() {
        echo 'Do you want some apples?';
    }

    public function show($id) {
        $model = new Model;

        $model->createTable('products', [
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'name' => 'VARCHAR(255) NOT NULL',
            'price' => 'DECIMAL(10,2) NOT NULL',
        ]);
        print_r($id . 'hi'); 
    }

    public function edit($id) {
        print_r($id . 'edit'); die;
    }
}