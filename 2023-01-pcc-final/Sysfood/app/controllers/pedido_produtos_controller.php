<?php
require_once('application_controller.php');
require_once('pedidos_controller.php');
class PedidoProdutosController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($idPedido, $nomeProduto = null)
    {
        $query = 'SELECT pp.*, p.nome_produto 
                FROM pedido_produtos pp 
                INNER JOIN produtos p ON pp.produto_id = p.id 
                WHERE pp.pedido_id = :idPedido';

        $params = array(':idPedido' => $idPedido);

        if ($nomeProduto) {
            $query .= ' AND p.nome_produto LIKE :nomeProduto';
            $params[':nomeProduto'] = '%' . $nomeProduto . '%';
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function valor_total($pedido)
    {
        $valor_total = 0;
        $stmt = $this->pdo->prepare('SELECT valor_total FROM pedido_produtos WHERE pedido_id = :id');
        $stmt->execute(array(':id' => $pedido));
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $valor) {
            $valor_total += $valor['valor_total'];
        }
        return $valor_total;
    }

    public function create($data, $pedido)
    {
        $produtosController = new ProdutosController();
        $pedido_dados = $produtosController->show($data['produto_id']);
        $total = $data['quantidade'] * $pedido_dados['valor'];
        $stmt = $this->pdo->prepare('INSERT INTO pedido_produtos (produto_id, pedido_id, quantidade, valor_total, criado_em) VALUES (:produto_id, :pedido_id, :quantidade, :valor_total, :criado_em)');
        $stmt->execute(array(
            ':produto_id' => $data['produto_id'],
            ':pedido_id' => $pedido,
            ':quantidade' => $data['quantidade'],
            ':valor_total' => $total,
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        $pedidosController = new PedidosController();
        $pedido_valor = $pedidosController->show($pedido);
        $stmt = $this->pdo->prepare('UPDATE pedidos SET valor_total = :valor_total WHERE id = :id');
        $stmt->execute(array(
            ':valor_total' => $pedido_valor['valor_total'] + $total,
            ':id' => $pedido
        ));
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedido_produtos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data, $pedido)
    {
        $produtosController = new ProdutosController();
        $pedido_dados = $produtosController->show($data['produto_id']);
        $total = $data['quantidade'] * $pedido_dados['valor'];
        $stmt = $this->pdo->prepare('UPDATE pedido_produtos SET produto_id = :produto_id, quantidade = :quantidade, valor_total = :valor_total WHERE id = :id');
        $stmt->execute(array(
            ':produto_id' => $data['produto_id'],
            ':quantidade' => $data['quantidade'],
            ':valor_total' => $total,
            ':id' => $id
        ));
        $pedidosController = new PedidosController();
        $pedido_valor = $pedidosController->show($pedido);
        $stmt = $this->pdo->prepare('UPDATE pedidos SET valor_total = :valor_total WHERE id = :id');
        $stmt->execute(array(
            ':valor_total' => $total + $pedido_valor['valor_total'],
            ':id' => $pedido
        ));
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM pedido_produtos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}