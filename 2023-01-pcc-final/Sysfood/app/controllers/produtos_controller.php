<?php
require_once('application_controller.php');
class ProdutosController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id, $nome_produto = null) {
        $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE empresa_id = :id AND nome_produto LIKE :nome_produto');
        $stmt->execute(array(':id' => $id, ':nome_produto' => '%' . $nome_produto . '%'));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function index_quantidade($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE empresa_id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->rowCount();
    }

    public function create($data, $empresa)
    {
        if (isset($_FILES['imagem'])) {
            // Define o diretório onde a imagem será salva
            $uploadDir = '../../uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Cria o diretório caso não exista
            }
            // Cria um nome único para a imagem usando o timestamp
            $fileName = time() . $_FILES['imagem']['name'];
            // Define o caminho completo onde a imagem será salva
            $uploadPath = $uploadDir . $fileName;
            // Move a imagem do diretório temporário para o diretório definitivo
            move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadPath);
            // Define o caminho relativo da imagem
            $relativePath = $fileName;
        } else {
            $relativePath = '';
        }
        $stmt = $this->pdo->prepare('INSERT INTO produtos (nome_produto, descricao, valor, imagem, empresa_id, categoria_id, criado_em) VALUES (:nome_produto, :descricao, :valor, :imagem, :empresa_id, :categoria_id, :criado_em)');
        $stmt->execute(array(
            ':nome_produto' => $data['nome_produto'],
            ':descricao' => $data['descricao'],
            ':valor' => $data['valor'],
            ':imagem' => $relativePath,
            ':empresa_id' => $empresa,
            ':categoria_id' => $data['categoria_id'],
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        if (!empty($_FILES['imagem']['name'])) {
            // Define o diretório onde a imagem será salva
            $uploadDir = '../../uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Cria o diretório caso não exista
            }
            // Cria um nome único para a imagem usando o timestamp
            $fileName = time() . $_FILES['imagem']['name'];
            // Define o caminho completo onde a imagem será salva
            $uploadPath = $uploadDir . $fileName;
            // Move a imagem do diretório temporário para o diretório definitivo
            move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadPath);
            // Define o caminho relativo da imagem
            $relativePath = $fileName;
            $stmt = $this->pdo->prepare('UPDATE produtos SET nome_produto = :nome_produto, descricao = :descricao, valor = :valor, imagem = :imagem, categoria_id = :categoria_id WHERE id = :id');
            $stmt->execute(array(
                ':nome_produto' => $data['nome_produto'],
                ':descricao' => $data['descricao'],
                ':valor' => $data['valor'],
                ':imagem' => $relativePath,
                ':categoria_id' => $data['categoria_id'],
                ':id' => $id
            ));
        } else {
            $stmt = $this->pdo->prepare('UPDATE produtos SET nome_produto = :nome_produto, descricao = :descricao, valor = :valor, categoria_id = :categoria_id WHERE id = :id');
            $stmt->execute(array(
                ':nome_produto' => $data['nome_produto'],
                ':descricao' => $data['descricao'],
                ':valor' => $data['valor'],
                ':categoria_id' => $data['categoria_id'],
                ':id' => $id
            ));
        }

    }

    public function delete($id)
    {
        $deletar_pedidos = $this->pdo->prepare('DELETE FROM pedido_produtos WHERE produto_id = :id');
        $deletar_pedidos->execute(array(':id' => $id));
        $stmt = $this->pdo->prepare('DELETE FROM produtos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}