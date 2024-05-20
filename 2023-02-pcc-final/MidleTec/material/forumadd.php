<?php
session_start();
// date_default_timezone_set('America/Sao_paulo');

require_once '../src/database/conexao.php';


$dbh = Conexao::getConexao();
// $dataenvio = date('y-m-d H:i:s');
$titulo = trim($_POST['titulo_forum']);
$descricao = trim($_POST['descricao_forum']);
$categoria = trim($_POST['categoria_forum']);
$proprietario = $_SESSION['idusuario'];

$query= "INSERT INTO midletech.foruns (titulo, categoria, descricao, proprietario)#dataenvio 
values (:titulo, :categoria, :descricao, :proprietario);"; #:dataenvio);

$statement = $dbh->prepare($query);
$statement -> bindParam(':titulo',$titulo);
$statement -> bindParam(':categoria',$categoria);
$statement -> bindParam(':descricao',$descricao);
// $statement -> bindParam(':proprietario',$proprietario);
$statement -> bindParam(':proprietario',$proprietario);
#$statement -> bindParam(':dataenvio',$dataenvio);

$result = $statement->execute();

if ($result) {
    header('location:foruns.php?msg=Fórum cadastrado com sucesso!');
} else {
    header('location:foruns.php?error=Não foi possível cadastrar fórum');

    $error = $dbh->errorInfo();
    print_r($error);
    echo '<a href="index.php">Voltar</a>';
}



$dbh = null;