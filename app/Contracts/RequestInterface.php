<?php namespace App\Contracts;

interface RequestInterface
{
    public function input($field);

    public function all();

    public function has($field);

    public function isPost();
}