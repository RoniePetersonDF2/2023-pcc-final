<?php
session_start();
require_once('../src/dao/usuariodao.php');
// require_once('../src/database/conexao.php');
$idusuario = $_SESSION['idusuario'];


if (isset($_POST['senha']) && !empty($_POST['senha'])) {
    $senha = md5($_POST['senha']);
    $dao = new AlunoDAO();
    $result = $dao->deleteusuario($idusuario, $senha);
    if ($result) {
        include('../login/logout.php');
        header('location: ../index.php?msg=Usuário deletado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível deletar o usuário!');
    }

} else if (isset($_POST['idforum']) && !empty($_POST['idforum'])) {
    $idforum = $_POST['idforum'];
    $dbh = Conexao::getConexao();
    if ($_SESSION['perfil'] == '1') {
        $query = "DELETE from midletech.foruns where idforum = :idforum;";
        // 
        $stmt = $dbh->prepare($query);

        $stmt->bindParam(':idforum', $idforum);
        $stmt->execute();
        $dbh = null;
        $result = $stmt->execute();
        if ($result) {
            // include('../login/logout.php');
            header('location:admforuns.php?msg=fórum deletado com sucesso!');
        } else {
            header('location:foruns.php?error=Não foi possível deletar o fórum!');
        }
    } else {
        $query = "DELETE from midletech.foruns where proprietario = :idusuario and idforum = :idforum;";
        // 
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idusuario', $idusuario);
        $stmt->bindParam(':idforum', $idforum);
        $stmt->execute();
        $dbh = null;
        $result = $stmt->execute();
        if ($result) {
            // include('../login/logout.php');
            header('location:foruns.php?msg=fórum deletado com sucesso!');
        } else {
            header('location:foruns.php?error=Não foi possível deletar o fórum!');
        }
    }
} else if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    if ($_SESSION['perfil'] != '1') {
        header('location: listar.php?error=Não foi possível deletar o usuário!');

    } else {
        $dao = new AlunoDAO();
        $result = $dao->deleteusuarioADM($id);
        if ($result) {

            header('location: admusuarios.php?msg=Usuário deletado com sucesso!');
        } else {
            header('location: listar.php?error=Não foi possível deletar o usuário!');
        }
    }
} else {
    header('location: listar.php?error=Não foi possível deletar!');
}