<?php
class Funcionario extends Application {

    private $id;
    private $empresa_id;
    private $endereco_id;
    private $usuario_id;
    private $cargo;
    private $cpf;
    private $criado_em;

    public function __construct()
    {
        parent::__construct();
    }
    
}