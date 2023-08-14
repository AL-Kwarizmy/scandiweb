<?php

namespace app\core;

class Request
{
    public function getPath(): string
    {
        return parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    public function getMehod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}