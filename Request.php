<?php

namespace sm;

class Request
{
    //contains PHP $_GET magic array
    private array $get;
    //contains PHP $_POST magic array
    private array $post;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function get($key = null): mixed
    {
        if ($key === null) {
            return $this->get;
        }

        return $this->get[$key] ?? null;
    }

    public function post($key = null): mixed
    {
        if ($key === null) {
            return $this->post;
        }

        return $this->post[$key] ?? null;
    }

    public function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

}