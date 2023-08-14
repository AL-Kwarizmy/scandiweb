<?php

namespace app\core;

class Router
{
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback): static
    {
        $this->routes['get'][$path] = $callback;
        return $this;
    }

    public function post($path, $callback): static
    {
        $this->routes['post'][$path] = $callback;
        return $this;
    }
    public function resolve(): void
    {
        $path = $this->request->getPath();
        $method = $this->request->getMehod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false)
        {
            echo 'PAGE IS NOT FOUND';
            exit();
        }

        $this->callAction($callback[0], $callback[1]);
    }

    private function callAction(mixed $controller, mixed $action): void
    {
        $controller = new $controller;
        $controller->{$action}();
    }
}