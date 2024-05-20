<?php

session_start();




include_once '../src/database/conexao.php';
include_once '../src/DTO/materialDTO.php';

$materialDTO = new MaterialDTO();
$dbh = Conexao::getConexao();

$tipo = 'ytbvid';
$titulo = trim($_POST['titulo_video']);
$descricao = trim($_POST['descricao_video']);
$assunto = trim($_POST['assunto_video']);
$proprietario = $_SESSION['idusuario'];
$endereco = $_POST['link_video'];




$query = "INSERT INTO midletech.material (titulo, tipo, descricao, assunto, endereco, proprietario) 
                                    values (:titulo, :tipo, :descricao, :assunto, :endereco, :proprietario); ";

$statement = $dbh->prepare($query);
$statement->bindParam(':titulo', $titulo);
$statement->bindParam(':tipo', $tipo);
$statement->bindParam(':descricao', $descricao);

$statement->bindParam(':assunto', $assunto);
$statement->bindParam(':proprietario', $proprietario);
$statement->bindParam(':endereco', $endereco);

$result = $statement->execute();


if ($result) {
    header('location:videos.php?msg=Material cadastrado com sucesso');
} else {
    header('location:videos.php?error=Não foi fossível inserir material');

    $error = $dbh->errorInfo();
    print_r($error);
    echo '<a href="index.php">voltar</a>';
}



$dbh = null;
