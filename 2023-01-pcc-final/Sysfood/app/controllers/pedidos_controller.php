<?php
require_once('application_controller.php');
class PedidosController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM pedidos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pedidos_em_preparacao($id_sessao)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE status_pedido = "Em preparação" AND sessao_id = :sessao');
        $stmt->execute(array(
            ':sessao' => $id_sessao
        ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pedidos_na_fila($id_sessao, $nome_cliente = null)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE status_pedido = "Na fila" AND sessao_id = :sessao AND nome_cliente LIKE :nome_cliente');
        $stmt->execute(array(
            ':sessao' => $id_sessao,
            ':nome_cliente' => '%' . $nome_cliente . '%'
        ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pedidos_finalizados($id_sessao, $nome_cliente = null)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE status_pedido = "Finalizado" AND sessao_id = :sessao AND nome_cliente LIKE :nome_cliente');
        $stmt->execute(array(
            ':sessao' => $id_sessao,
            ':nome_cliente' => '%' . $nome_cliente . '%'
        ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create($data, $id_sessao)
    {
        $stmt = $this->pdo->prepare('INSERT INTO pedidos (descricao, nome_cliente, sessao_id, status_pedido, valor_total) VALUES (:descricao, :nome_cliente, :sessao_id, :status_pedido, :valor_total)');
        $stmt->execute(array(
            ':descricao' => $data['descricao'],
            ':nome_cliente' => $data['nome_cliente'],
            ':sessao_id' => $data['sessao_id'] = $id_sessao,
            ':status_pedido' => "Na fila",
            ':valor_total' => 0
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function show_pedidos($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE sessao_id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function status_em_preparacao($id, $funcionario)
    {
        $stmt = $this->pdo->prepare('UPDATE pedidos SET status_pedido = :status_pedido, funcionario_id = :funcionario_id WHERE id = :id');
        $stmt->execute(array(
            ':status_pedido' => 'Em preparação',
            ':funcionario_id' => $funcionario,
            ':id' => $id
        ));
    }


    public function status_finalizado($id)
    {
        $stmt = $this->pdo->prepare('UPDATE pedidos SET status_pedido = :status_pedido, hora_fim = :hora_fim WHERE id = :id');
        $stmt->execute(array(
            ':status_pedido' => 'Finalizado',
            ':hora_fim' => date('H:i:s'),
            ':id' => $id
        ));
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE pedidos SET descricao = :descricao, nome_cliente = :nome_cliente WHERE id = :id');
        $stmt->execute(array(
            ':descricao' => $data['descricao'],
            ':nome_cliente' => $data['nome_cliente'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $deletar_pedidos = $this->pdo->prepare('DELETE FROM pedido_produtos WHERE pedido_id = :id');
        $deletar_pedidos->execute(array(':id' => $id));
        $stmt = $this->pdo->prepare('DELETE FROM pedidos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}