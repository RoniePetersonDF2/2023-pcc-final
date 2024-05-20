<?php
session_start();
date_default_timezone_set('America/Sao_paulo');

require_once '../src/database/conexao.php';


$dbh = Conexao::getConexao();
$data = date('y-m-d H:i:s');

$instituicao = $_POST['idinstituicao'];
$usuario = $_POST['idusuario'];
$comentario = $_POST['comentario'];
$avaliacao = $_POST['rating'];


$query= "INSERT INTO midletech.avaliacoes (idusuario, idinstituicao, comentario, avaliacao, data)#dataenvio 
values (:usuario, :instituicao, :comentario, :avaliacao, :data);"; #:dataenvio);

$statement = $dbh->prepare($query);
$statement -> bindParam(':usuario',$usuario);
$statement -> bindParam(':instituicao',$instituicao);
$statement -> bindParam(':comentario',$comentario);
$statement -> bindParam(':avaliacao',$avaliacao);
$statement -> bindParam(':data',$data);

#$statement -> bindParam(':dataenvio',$dataenvio);

$result = $statement->execute();

if ($result) {
    header('location:instavaliacao.php?id='. $instituicao .'&msg=Avaliação enviada com sucesso!');
} else {
    header('location: instavaliacao.php?id='. $instituicao .'&error=Não foi possível enviar a avaliação!');

    $error = $dbh->errorInfo();
    print_r($error);
    echo '<a href="index.php">voltar</a>';
}



$dbh = null;