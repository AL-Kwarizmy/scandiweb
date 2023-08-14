<?php

function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function renderView($view, $data = []): void
{
    if ($data != null)
    {
        extract($data);
    }
    require_once MAIN_DIRECTORY."/resources/product/{$view}.view.php";
}