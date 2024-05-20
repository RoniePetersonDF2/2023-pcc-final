<?php
require_once('application_controller.php');
class SessoesController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id, $nome_sessao = null)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM sessoes WHERE status_sessao = "Em andamento" AND nome_sessao LIKE :nome_sessao AND empresa_id = :id');
        $stmt->execute(array(':id' => $id, ':nome_sessao' => '%' . $nome_sessao . '%'));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function index_quantidade($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM sessoes WHERE empresa_id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->rowCount();
    }

    public function index_finalizado($id, $nome_sessao = null) {
        $stmt = $this->pdo->prepare('SELECT * FROM sessoes WHERE status_sessao = "Finalizada" AND nome_sessao LIKE :nome_sessao AND empresa_id = :id');
        $stmt->execute(array(':id' => $id, ':nome_sessao' => '%' . $nome_sessao . '%'));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function finalizar_sessao($id)
    {
        $stmt = $this->pdo->prepare('UPDATE sessoes SET status_sessao = :status_sessao, hora_fim = :hora_fim WHERE id = :id');
        $stmt->execute(array(
            ':status_sessao' => 'Finalizada',
            ':hora_fim' => date('H:i:s'),
            ':id' => $id
        ));
    }

    public function create($data, $empresa)
    {
        $stmt = $this->pdo->prepare('INSERT INTO sessoes (nome_sessao, hora_inicio, empresa_id,status_sessao) VALUES (:nome_sessao, :hora_inicio, :empresa_id, :status_sessao)');
        $stmt->execute(array(
            ':nome_sessao' => $data['nome_sessao'],
            ':hora_inicio' => date('H:i:s'),
            ':empresa_id' => $empresa,
            ':status_sessao' => 'Em andamento'
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM sessoes WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE sessoes SET nome_sessao = :nome_sessao WHERE id = :id');
        $stmt->execute(array(
            ':nome_sessao' => $data['nome_sessao'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $pedidos = $this->pdo->prepare('SELECT id FROM pedidos WHERE sessao_id = :id');
        $pedidos->execute(array(':id' => $id));
        $pedidos_total = $pedidos->fetchAll(PDO::FETCH_ASSOC);
        foreach ($pedidos_total as $pedido_cada) :
            $deletar_pedidos = $this->pdo->prepare('DELETE FROM pedido_produtos WHERE pedido_id = :id');
            $deletar_pedidos->execute(array(':id' => $pedido_cada['id']));
        endforeach;
        $pedido = $this->pdo->prepare('DELETE FROM pedidos WHERE sessao_id = :id');
        $pedido->execute(array(':id' => $id));
        $stmt = $this->pdo->prepare('DELETE FROM sessoes WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}