<?php
class Usuario extends Application {
    private $id;
    private $nome;
    private $sobrenome;
    private $data_nascimento;
    private $email;
    private $senha;
    private $criado_em;

    public function __construct()
    {
        parent::__construct();
    }
}