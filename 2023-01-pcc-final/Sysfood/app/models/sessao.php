<?php
class Sessao extends Application {
    private $id;
    private $nome_sessao;
    private $hora_inicio;
    private $hora_fim;
    private $status_sessao;

    public function __construct()
    {
        parent::__construct();
    }
}