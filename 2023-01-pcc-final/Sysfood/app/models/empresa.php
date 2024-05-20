<?php
class Empresa extends Application {
    private $id;
    private $nome_empresa;
    private $cnpj;
    private $email;
    private $senha;
    private $endereco_id;
    private $criado_em;

    public function __construct()
    {
        parent::__construct();
    }
}