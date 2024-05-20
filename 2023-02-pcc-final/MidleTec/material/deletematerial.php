<?php
session_start();
require_once('../src/dao/materialDAO.php');
$idusuario = $_SESSION['idusuario'];
if (isset($_POST['idmaterial']) && !empty($_POST['idmaterial'])) {
    $idmaterial = $_POST['idmaterial'];
    $dao = new MaterialDAO();
    $result = $dao->deletematerial($idusuario, $idmaterial);
    if ($result) {
        // include('../login/logout.php');
        header('location:index.php?msg=Material deletado com sucesso!');
    } else {
        header('location:index.php?error=Não foi possível deletar o material!');
    }

}else if (isset($_POST['idforummsg']) && !empty($_POST['idforummsg'])) {
    $idforummsg = $_POST['idforummsg'];
    $forum = $_POST['forum'];
    $dao = new MaterialDAO();
    $result = $dao->deletemensagem($idusuario, $idforummsg);
    if ($result) {
        // include('../login/logout.php');
        header('location:../forum/index.php?forumid=' . $forum . '&msg=Comentario deletado com sucesso!');
    } else {
        header('location:../forum/index.php?forumid=' . $forum . '&Não foi possível deletar o comentario!');
    }
} else {
    header('location: index.php?error=Não foi possível deletar!');
}