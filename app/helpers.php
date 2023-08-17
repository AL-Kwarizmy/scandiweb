<?php

/**
 * @param $value
 * @return void
 */
function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

/**
 * @param $view
 * @param array $data
 * @return void
 */
function renderView($view, array $data = []): void
{
    if ($data != null)
    {
        extract($data);
    }
    require_once MAIN_DIRECTORY."/resources/product/{$view}.view.php";
}