<?php

date_default_timezone_set('America/Sao_paulo');
session_start();


if (!isset($_POST["senha"]) || empty($_POST["senha"])) {
    //    echo "Usuário e/ou senha inválidos";

    header("location:login.php?msg=senha não informada");
    exit;
}
require_once "../src/dao/usuariodao.php";
$dbh = Conexao::getConexao();



$email = $_POST["email"];
$senha = MD5($_POST["senha"]);
$AlunoDAO = new AlunoDAO();
$AlunoLogin = $AlunoDAO->login($email, $senha);

if (!empty($AlunoLogin)) {
    $id = $AlunoLogin["idusuario"];
    if ($AlunoLogin['perfil'] == '4') {
        $query = "SELECT * from midletech.assinaturas where idusuario = '$id';";
        $statement = $dbh->query($query);
        $um = $statement->rowCount();
        $row = $statement->fetch();
        $time4 = date("Y-m-d", strtotime($row['data_de_expiracao']));
        $time5 = date("Y-m-d");

        if ($row['tipo'] == '30 dias gratis') {
            if ($time5 > $time4) {
                $status = '0';
                $query = "UPDATE midletech.usuarios SET 
                usuarios.status = :status where idusuario = :id;";
            
                $stmt = $dbh->prepare($query);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':id', $id);
            
                $result = $stmt->execute();
                $AlunoLogin["status"] = '0';
            }
        }
    }

    $_SESSION["idusuario"] = $AlunoLogin["idusuario"];
    $_SESSION["email"] = $AlunoLogin["email"];
    $_SESSION["telefone"] = $AlunoLogin["telefone"];
    $_SESSION["nome"] = $AlunoLogin["nome"];
    // $_SESSION["sobrenome"] = $AlunoLogin["sobrenome"];
    $_SESSION["matricula"] = $AlunoLogin["matricula"];
    $_SESSION["instituicao"] = $AlunoLogin["instituicao"];
    $_SESSION["imagem"] = $AlunoLogin["imagem"];
    $_SESSION["perfil"] = $AlunoLogin["perfil"];
    $_SESSION["status"] = $AlunoLogin["status"];



    // $_SESSION["genero"] = $AlunoLogin["genero"];



    header("location:../material/index.php");
    exit;

} else {

    header("location:login.php?msg=não foi possiel efetuar o ligin Verifique email e Senha.");
    // echo ("não foi possiel efetuar o ligin<br>Verifique Aluno e Senha.<br><a href='login.php'>Voltar</a>");
    //   var_dump($AlunoLogin, $AlunoDAO, $matricula);
    print '<br>';
    print_r($AlunoDAO);
    print_r($AlunoLogin);
    exit;
}


?>