<?php
class Categoria extends Application {
    private $id;
    private $nome_categoria;
    private $criado_em;

    public function __construct()
    {
        parent::__construct();
    }
}