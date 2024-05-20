<?php
session_start();
require_once('../src/dao/instituicaoDAO.php');
$idusuario = $_SESSION['idusuario'];
if (isset($_POST['idnoticia']) && !empty($_POST['idnoticia'])) {
    $idnoticia = $_POST['idnoticia'];
    $idinstituicao = $_POST['idinstituicao'];

    $dao = new InstituicaoDAO();
    $result = $dao->deletenoticia($idusuario, $idnoticia);
    if ($result) {
        header('location:noticias.php?id='. $idinstituicao .'&msg=Notícia deletada com sucesso!');
    } else {
        header('location: noticias.php?id='. $idinstituicao .'&error=Não foi possível deletar a notícia!');}
}else if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];


    $dao = new InstituicaoDAO();
    $result = $dao->deleteinstituicao($idusuario, $id);
    if ($result) {
        header('location:../material/index.php?msg=Instituição deletada com sucesso!');
    } else {
        header('location: ../material/index.php?msg=&error=Não foi possível deletar a instituição!');}
}