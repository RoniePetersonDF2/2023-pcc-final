<?php
session_start();
// date_default_timezone_set('America/Sao_paulo');

require_once '../src/database/conexao.php';


$dbh = Conexao::getConexao();
// $dataenvio = date('y-m-d H:i:s');
$titulo = trim($_POST['titulo_link']);
$descricao = trim($_POST['descricao_link']);
$assunto = trim($_POST['assunto_link']);
$endereco = trim($_POST['link']);
$proprietario = $_SESSION['idusuario'];
$tipo = 'link';

$query= "INSERT INTO midletech.material (titulo, tipo, descricao, assunto, endereco, proprietario)#dataenvio 
values (:titulo, :tipo, :descricao, :assunto, :endereco, :proprietario);"; #:dataenvio);

$statement = $dbh->prepare($query);
$statement -> bindParam(':titulo',$titulo);
$statement -> bindParam(':tipo',$tipo);
$statement -> bindParam(':descricao',$descricao);
$statement -> bindParam(':endereco',$endereco);
$statement -> bindParam(':assunto',$assunto);
$statement -> bindParam(':proprietario',$proprietario);
$statement -> bindParam(':proprietario',$proprietario);
#$statement -> bindParam(':dataenvio',$dataenvio);

$result = $statement->execute();

if ($result) {
    header('location:links.php?msg=Material cadastrado com sucesso');
} else {
    header('location:links.php?error=Não foi fossível inserir material');

    $error = $dbh->errorInfo();
    print_r($error);
    echo '<a href="index.php">voltar</a>';
}



$dbh = null;