<?php
require_once 'src/conexao.php';


$dbh = Conexao::getConexao();


    $nome = trim($_POST['nome']);
    $senha =md5($_POST['senha']);
    $email = $_POST['email'];
    $matricula = $_POST['matricula'];
    $ddd = $_POST['ddd'];
    $telefone = $_POST['telefone'];
    $dtnasc = $_POST['dtnasc'];
    $genero = $_POST['genero'];
    // $foto = $_POST['foto'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $instituicao = $_POST['instituicao'];
    $sobrenome = strtoupper($_POST['sobrenome']);
    // $ = strtoupper($_POST['']);
    // $ = strtoupper($_POST['']);
    $perfil="usuariocomun";
    $status="1";


    
    $query = "INSERT INTO midletech.usuarios (nome, sobrenome, senha, email, matricula, ddd, telefone, dtnasc, genero, cep, estado, cidade, instituicao, perfil, status)  
        VALUES ( :nome, :sobrenome,  :senha, :email, :matricula, :ddd, :telefone, :dtnasc, :genero, :cep, :estado, :cidade, :instituicao, :perfil, :status );";

$statement = $dbh->prepare($query);
$statement->bindParam(':nome',$nome);
$statement->bindParam(':senha',$senha);
$statement->bindParam(':email',$email);
$statement->bindParam(':matricula',$matricula);
$statement->bindParam(':ddd',$ddd);
$statement->bindParam(':telefone',$telefone);
$statement->bindParam(':dtnasc',$dtnasc);
$statement->bindParam(':genero',$genero);
// $statement->bindParam(':foto',$foto);
$statement->bindParam(':cep',$cep);
$statement->bindParam(':estado',$estado);
$statement->bindParam(':cidade',$cidade);
$statement->bindParam(':instituicao',$instituicao);
$statement->bindParam(':perfil',$perfil);
$statement->bindParam(':status',$status);
$statement->bindParam(':sobrenome',$sobrenome);




    $result = $statement->execute();

    if ($result) {
        echo '<script>alert("Usuário inserido com sucesso.");</script>';
    } else {
        echo 'Não foi fossível inserir usuário';

        $error = $dbh->errorInfo();
        print_r($error);
    }



$dbh = null;