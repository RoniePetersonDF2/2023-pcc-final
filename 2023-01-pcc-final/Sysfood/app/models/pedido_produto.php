<?php
class PedidoProdutos extends Application {
    private $id;
    private $produto_id;
    private $pedido_id;
    private $quantidade;
    private $valor_total;
    private $criado_em;

    public function __construct()
    {
        parent::__construct();
    }
}