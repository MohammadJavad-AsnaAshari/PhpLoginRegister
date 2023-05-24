<?php namespace App\Helpers;

class ErrorMessage
{
    protected $errors = [];

    public function set($name, $value)
    {
        $this->errors[$name][] = $value;
    }

    public function has($name)
    {
        return isset($this->errors[$name]);
    }

    public function count()
    {
        return count($this->errors);
    }

    public function first($name)
    {
        if ($this->has($name)) {
            return $this->errors[$name][0];
        }

        return null;
    }

    public function __set(string $name, $value): void
    {
        $this->set($name, $value);
    }

    public function __get(string $name)
    {
        return $this->first($name);
    }

    public function __isset(string $name): bool
    {
        return $this->has($name);
    }

    public function __unset(string $name): void
    {
        unset($this->errors[$name]);
    }
}