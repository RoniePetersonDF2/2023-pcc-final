<?php
require_once('application_controller.php');
class EnderecosController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM enderecos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO enderecos (rua, bairro, cidade, estado, cep, complemento, criado_em) VALUES (:rua, :bairro, :cidade, :estado, :cep, :complemento, :criado_em)');
        $stmt->execute(array(
            ':rua' => $data['rua'],
            ':bairro' => $data['bairro'],
            ':cidade' => $data['cidade'],
            ':estado' => $data['estado'],
            ':cep' => $data['cep'],
            ':complemento' => $data['complemento'],
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM enderecos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE enderecos SET rua = :rua, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, complemento = :complemento WHERE id = :id');
        $stmt->execute(array(
            ':rua' => $data['rua'],
            ':bairro' => $data['bairro'],
            ':cidade' => $data['cidade'],
            ':estado' => $data['estado'],
            ':cep' => $data['cep'],
            ':complemento' => $data['complemento'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM enderecos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}