<?php

namespace app\core;

class Router
{
    public Request $request;
    protected array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $path
     * @param $callback
     * @return $this
     */
    public function get($path, $callback): static
    {
        $this->routes['get'][$path] = $callback;
        return $this;
    }

    /**
     * @param $path
     * @param $callback
     * @return $this
     */
    public function post($path, $callback): static
    {
        $this->routes['post'][$path] = $callback;
        return $this;
    }

    /**
     * @return void
     */
    public function resolve(): void
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false) {
            echo 'PAGE IS NOT FOUND';
            return;
        }

        $this->callAction($callback[0], $callback[1]);
    }

    /**
     * @param mixed $controller
     * @param string $action
     * @return void
     */
    private function callAction(mixed $controller, string $action): void
    {
        $controller = new $controller;
        $controller->{$action}();
    }
}