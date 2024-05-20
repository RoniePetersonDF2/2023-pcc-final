<?php
class ApplicationController {

    protected $pdo;

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $this->pdo = new PDO('mysql:host=localhost;dbname=sysfood', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}