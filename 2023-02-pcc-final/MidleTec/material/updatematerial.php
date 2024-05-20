<?php

session_start();
$idusuario = $_SESSION['idusuario'];
require_once('../src/dao/materialDAO.php');

if (isset($_POST['idmaterial']) && !empty($_POST['idmaterial'])) {
    $idmaterial = $_POST['idmaterial'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $assunto = $_POST['assunto'];

    $dao = new MaterialDAO();
    $result = $dao->updatematerial($idmaterial, $titulo, $descricao, $assunto, $idusuario);

    if ($result) {
        header('location:index.php?msg=Material atualizado com sucesso!');
    } else {
        header('location: index.php?error=Não foi possível atualizar o material!');
    }
}else if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])){
    $idforum = $_POST['idforum'];
 
    
    $mensagem = $_POST['mensagem'];
    $forum = $_POST['forum'];
    $dao = new MaterialDAO();
    $result = $dao->updatemensagem($idforum, $idusuario, $mensagem);
    if ($result) {
        header('location:../forum/index.php?forumid='. $forum .'&msg=Mensagem atualizado com sucesso!');
    } else {
        header('location::../forum/index.php?forumid='. $forum .'&error=Não foi possível atualizar a mensagem!');
    }

}else {
    header('location: index.php?error=Não foi possível atualizar');

}