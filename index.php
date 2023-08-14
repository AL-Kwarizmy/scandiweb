<?php

use app\controllers\ProductController;

const MAIN_DIRECTORY = __DIR__;
include_once MAIN_DIRECTORY. '/init.php';

$app->router->get('/', [ProductController::class, 'index'])
    ->get('/product/create', [ProductController::class, 'create'])
    ->post('/product/create', [ProductController::class, 'store']);

$app->run();
