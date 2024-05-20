<?php
class Produto extends Application {
    private $id;
    private $nome_produto;
    private $descricao;
    private $valor;
    private $imagem;
    private $categoria_id;
    private $criado_em;

    public function __construct()
    {
        parent::__construct();
    }
}