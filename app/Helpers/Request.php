<?php namespace App\Helpers;

use App\Contracts\RequestInterface;

class Request implements RequestInterface
{

    public function input($field)
    {
        return $this->has($field) ? $this->all()[$field] : null;
    }

    public function all()
    {
        if ($this->isPost())
            return array_map("htmlspecialchars", $_POST);

        return array_map("htmlspecialchars", $_GET);
    }

    public function has($field)
    {
        return isset($this->all()[$field]);
    }

    public function isPost()
    {
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }
}