<?php
session_start();
require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();
if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
    $mensagem = $_POST['mensagem'];
    $idforum = $_POST['idforum'];
    $usuarioid = $_POST['idusuario'];
    $query2 = "INSERT INTO midletech.foruns_msg (idusuario, idforum, mensagem) values(:idusuario, :idforum, :mensagem);";

    $stmt1 = $dbh->prepare($query2);
    $stmt1->bindParam(':idusuario', $usuarioid);
    $stmt1->bindParam(':idforum', $idforum);
    $stmt1->bindParam(':mensagem', $mensagem);
    $result = $stmt1->execute();

    if ($result) {
        header('location:index.php?forumid='. $idforum );
    } else {
        header('location:index.php?forumid='. $idforum .'&error=Falha ao enviar');

        $error = $dbh->errorInfo();
        print_r($error);
        echo '<a href="index.php">voltar</a>';
    }

}else{
    header('location:../index.php?error=Mensagem Inválida');
}