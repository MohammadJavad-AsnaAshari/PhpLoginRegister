<?php namespace App\Models;

use PDO;

abstract class DB
{
    protected $pdo = null;

    protected $host = "localhost:3306";
    protected $db = "my_oop_db";
    protected $username = "root";
    protected $password = "";
    protected $table;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->username, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create(array $data)
    {
        $field = join(",", array_keys($data));
        $parameter = join(",", array_map(fn($item) => ":$item", array_keys($data)));

        $statement = $this->pdo->prepare("insert into {$this->table} ({$field}) values ({$parameter})");
        return $statement->execute($data);
    }
}