<?php

namespace app\controllers;

use app\models\DVD;
use app\models\Product;
class ProductController
{
    public function index(): void
    {
        $products = Product::get();

        $data = array_map(function ($product){
            foreach($product as $key => $value)
            {
                if ($value == null) {
                    unset($product[$key]);
                }

            }
            $className = "\app\models\\".$product['type'];
            unset($product['type']);
            unset($product['id']);
            $object = new $className();
            $object->setter($product);
            return $object;
        }, $products);

        renderView('index', $data);
    }

    public function create(): void
    {
        renderView('create');
    }

    public function store(): void {
        $className = "\app\models\\".$_POST['type'];
        $object = new $className;
        $object->setter($_POST);
        $object->create();

        header('location: /');
    }
}