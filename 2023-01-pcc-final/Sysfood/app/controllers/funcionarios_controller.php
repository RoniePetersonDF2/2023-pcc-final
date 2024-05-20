<?php
require_once('application_controller.php');
class FuncionariosController extends ApplicationController
{


  public function __construct()
  {
    parent::__construct();
  }

  public function index($id, $nome = null)
  {
    $query = 'SELECT f.*, u.nome AS nome_usuario FROM funcionarios f ';
    $query .= 'INNER JOIN usuarios u ON f.usuario_id = u.id ';
    $query .= 'WHERE f.empresa_id = :id';

    $params = array(':id' => $id);

    if ($nome) {
      $nome = str_replace(['.', '-'], '', $nome);
      $nome = '%' . $nome . '%';
      $query .= ' AND (u.nome LIKE :nome OR f.cargo LIKE :nome OR f.cpf LIKE :nome)';
      $params[':nome'] = '%' . $nome . '%';
    }

    $stmt = $this->pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function index_quantidade($id)
  {
    $stmt = $this->pdo->prepare('SELECT * FROM funcionarios WHERE empresa_id = :id');
    $stmt->execute(array(':id' => $id));
    return $stmt->rowCount();
  }

  public function create($data, $endereco, $usuario, $empresa)
  {
    $stmt = $this->pdo->prepare('INSERT INTO funcionarios (empresa_id, endereco_id, usuario_id, cargo, cpf) VALUES (:empresa_id, :endereco_id, :usuario_id, :cargo, :cpf)');
    $stmt->execute(array(
      ':empresa_id' => $empresa,
      ':endereco_id' => $endereco,
      ':usuario_id' => $usuario,
      ':cargo' => $data['cargo'],
      ':cpf' => $data['cpf']
    ));
    return $this->pdo->lastInsertId();
  }

  public function show($id)
  {
    $stmt = $this->pdo->prepare('SELECT * FROM funcionarios WHERE id = :id');
    $stmt->execute(array(':id' => $id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($id, $data, $endereco_id, $usuario_id)
  {
    require_once('../../controllers/enderecos_controller.php');
    require_once('../../controllers/usuarios_controller.php');
    $enderecosController = new EnderecosController();
    $enderecosController->update($endereco_id, $data);
    $usuariosController = new UsuariosController();
    $usuariosController->update($usuario_id, $data);
    $stmt = $this->pdo->prepare('UPDATE funcionarios SET cargo = :cargo, cpf = :cpf WHERE id = :id');
    $stmt->execute(array(
      ':cargo' => $data['cargo'],
      ':cpf' => $data['cpf'],
      ':id' => $id
    ));
  }

  public function delete($id)
  {
    $stmt = $this->pdo->prepare('DELETE FROM funcionarios WHERE id = :id');
    $stmt->execute(array(':id' => $id));
    $stmt = $this->pdo->prepare('DELETE FROM usuarios WHERE id = :id');
    $stmt->execute(array(':id' => $id));
  }
}