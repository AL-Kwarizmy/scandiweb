<?php

namespace app\controllers;

use app\core\Validator;
use app\models\DVD;
use app\models\Product;
class ProductController
{

    /**
     * @return void
     */
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
            $object = new $className();
            $object->setter($product);
            return $object;
        }, $products);

        renderView('index', $data);
    }

    /**
     * @return void
     */
    public function create(): void
    {
        renderView('create');
    }

    /**
     * @return void
     */
    public function store(): void
    {
        $errors = [];
        if (!Validator::string($_POST['sku'])) {
            $errors['skuIsEmpty'] = "* Sku is required and can't be empty";
            renderView('create', $errors);
            return;
        }

        $className = "\app\models\\".$_POST['type'];
        $object = new $className;
        $object->setter($_POST);
        $message = $object->create();

        if ($message != null) {
            $errors['skuIsDuplicated'] = "* Product with the same SKU already exists.";
            renderView('create', $errors);
            return;
        }

        header('location: /');
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        if ($_POST !== []) {
            Product::delete($_POST);
        }

        header("location: /");
    }

}