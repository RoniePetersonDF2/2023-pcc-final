<?php
session_start();
require_once('../src/dao/avaliacaoDAO.php');
$idusuario = $_SESSION['idusuario'];
if (isset($_POST['idavaliacao']) && !empty($_POST['idavaliacao'])) {
    $idavaliacao = $_POST['idavaliacao'];
    $idinstituicao = $_POST['idinstituicao'];

    $dao = new AvaliacaoDAO();
    $result = $dao->deleteavaliacao($idusuario, $idavaliacao);
    if ($result) {
        header('location:instavaliacao.php?id='. $idinstituicao .'&msg=Avaliação deletada com sucesso!');
    } else {
        header('location: instavaliacao.php?id='. $idinstituicao .'&error=Não foi possível deletar a avaliação!');}
}