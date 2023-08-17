<?php

namespace app\core;

class Request
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        $url = filter_var(parse_url($_SERVER['REQUEST_URI'])['path'], FILTER_SANITIZE_URL);
        return Validator::string($url) ? $url : '/';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}