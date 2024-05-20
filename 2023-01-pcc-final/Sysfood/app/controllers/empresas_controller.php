<?php
require_once('application_controller.php');
require_once('empresas_controller.php');
class EmpresasController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM empresas');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data, $endereco)
    {
        $stmt = $this->pdo->prepare('INSERT INTO empresas (nome_empresa, cnpj, email, senha, endereco_id, criado_em) VALUES
                                    (:nome_empresa, :cnpj, :email, :senha, :endereco_id, :criado_em)');
        $stmt->execute(array(
            ':nome_empresa' => $data['nome_empresa'],
            ':cnpj' => $data['cnpj'],
            ':email' => $data['email'],
            ':senha' => md5($data['senha']),
            ':endereco_id' => $endereco,
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM empresas WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        if (!empty($data['senha'])) {
            $stmt = $this->pdo->prepare('UPDATE empresas SET nome_empresa = :nome_empresa, cnpj = :cnpj, email = :email, senha = :senha WHERE id = :id');
            $stmt->execute(array(
                ':nome_empresa' => $data['nome_empresa'],
                ':cnpj' => $data['cnpj'],
                ':email' => $data['email'],
                ':senha' => md5($data['senha']),
                ':id' => $id
            ));
        } else {
            $stmt = $this->pdo->prepare('UPDATE empresas SET nome_empresa = :nome_empresa, cnpj = :cnpj, email = :email WHERE id = :id');
            $stmt->execute(array(
                ':nome_empresa' => $data['nome_empresa'],
                ':cnpj' => $data['cnpj'],
                ':email' => $data['email'],
                ':id' => $id
            ));
        }
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM funcionarios WHERE empresa_id = :id');
        $stmt->execute(array(':id' => $id));
        $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $empresa = new EmpresasController();
        $empresa = $empresa->show($id);
        foreach ($funcionarios as $funcionario) {
            $stmt = $this->pdo->prepare('DELETE FROM pedidos WHERE id = :id');
            $stmt->execute(array(':id' => $funcionario['id']));

            $stmt = $this->pdo->prepare('DELETE FROM enderecos WHERE id = :id');
            $stmt->execute(array(':id' => $funcionario['endereco_id']));
            $stmt = $this->pdo->prepare('DELETE FROM funcionarios WHERE id = :id');
            $stmt->execute(array(':id' => $funcionario['id']));
            $stmt = $this->pdo->prepare('DELETE FROM usuarios WHERE id = :id');
            $stmt->execute(array(':id' => $funcionario['usuario_id']));
        }
        foreach ($funcionarios as $funcionario) {
            $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE funcionario_id = :id');
            $stmt->execute(array(':id' => $funcionario['id']));
            $sessoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($sessoes as $sessao) {
                $stmt = $this->pdo->prepare('DELETE FROM sessoes WHERE id = :id');
                $stmt->execute(array(':id' => $sessao['sessao_id']));
            }
        }
        $stmt = $this->pdo->prepare('DELETE FROM enderecos WHERE id = :id');
        $stmt->execute(array(':id' => $empresa['endereco_id']));
        $stmt = $this->pdo->prepare('DELETE FROM empresas WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}