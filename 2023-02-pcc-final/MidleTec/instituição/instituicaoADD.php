<?php
require_once 'src/conexaoinstituição.php';


$dbh = Conexao::getConexao();

$nome = trim($_POST['nome']);
$nick = $_POST['nick'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$quadra = $_POST['quadra'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$ddd = $_POST['ddd'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$horarioabertura = $_POST['horarioabertura'];
$horariofechamento = $_POST['horariofechamento'];

$query = "INSERT INTO midletech.instituicoes (nome, nick, cep, estado, ciadade, quadra, numero, complemento, ddd, telefone, email, horarioabertura, horariofechamento)  
VALUES ( :nome, :nick, :cep, :estado, :cidade, :quadra, :numero, :complemento, :ddd, :telefone, :email, :horarioabertura, :horariofechamento );";

$statement = $dbh->prepare($query);
$statement->bindParam(':nome', $nome);
$statement->bindParam(':nick', $nick);
$statement->bindParam(':cep', $cep);
$statement->bindParam(':estado', $estado);
$statement->bindParam(':cidade', $cidade);
$statement->bindParam(':quadra', $quadra);
$statement->bindParam(':numero', $numero);
$statement->bindParam(':complemento', $complemento);
$statement->bindParam(':ddd', $ddd);
$statement->bindParam(':telefone', $telefone);
$statement->bindParam(':email', $email);
$statement->bindParam(':horarioabertura', $horarioabertura);
$statement->bindParam(':horariofechamento', $horariofechamento);


$result = $statement->execute();

if ($result) {
    echo '<script>alert("Instituição inserida com sucesso.");</script>';

} else {
    echo 'Não foi fossível inserir instituição';

    $error = $dbh->errorInfo();
    print_r($error);
}



$dbh = null;