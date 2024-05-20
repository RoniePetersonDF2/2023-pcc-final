<?php
class Endereco extends Application {

    private $id;
    private $rua;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;
    private $complemento;
    private $criado_em;

    public function __construct()
    {
        parent::__construct();
    }

}