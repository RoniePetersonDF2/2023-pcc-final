<?php
class Pedido extends Application {
    private $id;
    private $descricao;
    private $nome_cliente;
    private $hora_inicio;
    private $hora_fim;
    private $sessao_id;
    private $valor_total;
    private $status_pedido;

    public function __construct()
    {
        parent::__construct();
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}