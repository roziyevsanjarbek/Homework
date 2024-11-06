<?php
class DB {

    public $pdo;

    public function __construct () {
        $dsn = "mysql:host=127.0.0.1;dbname=work_of_tracker";
        $this->pdo = new PDO($dsn, "root", "qwert");
        return $this->pdo;
    }
 }