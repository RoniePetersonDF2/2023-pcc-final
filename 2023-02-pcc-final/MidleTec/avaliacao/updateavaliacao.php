<?php
date_default_timezone_set('America/Sao_paulo');
session_start();
$data = date('y-m-d');
$idusuario = $_SESSION['idusuario'];

require_once('../src/dao/avaliacaoDAO.php');
if (isset($_POST['idavaliacao']) && !empty($_POST['idavaliacao'])) {
    $idavaliacao = $_POST['idavaliacao'];
    $idinstituicao = $_POST['idinstituicao'];
    $rating = $_POST['rating'];
    $comentario = $_POST['comentario'];

    $dao = new AvaliacaoDAO();
    $result = $dao->updateavaliacao($idavaliacao, $rating, $comentario, $data, $idusuario);

    if ($result) {
        header('location:instavaliacao.php?id='. $idinstituicao .'&msg=Avaliação atualizado com sucesso!');
    } else {
        header('location: instavaliacao.php?id='. $idinstituicao .'&error=Não foi possível atualizar a avaliação!');
    }
}