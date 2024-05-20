<?php
require_once('application_controller.php');
class AdministradoresController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM administradores WHERE NOT id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($usuario)
    {
        $stmt = $this->pdo->prepare('INSERT INTO administradores (usuario_id, criado_em) VALUES (:usuario_id, :criado_em)');
        $stmt->execute(array(
            ':usuario_id' => $usuario,
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM administradores WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE administradores SET usuario_id = :usuario_id WHERE id = :id');
        $stmt->execute(array(
            ':usuario_id' => $data['usuario_id'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $adiministradoresController = new AdministradoresController();
        $administrador = $adiministradoresController->show($id);
        $stmt = $this->pdo->prepare('DELETE FROM administradores WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        $stmt = $this->pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $stmt->execute(array(':id' => $administrador['usuario_id']));
    }
}