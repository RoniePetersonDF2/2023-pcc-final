<?php
class Application
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getInstance();    
    }
}