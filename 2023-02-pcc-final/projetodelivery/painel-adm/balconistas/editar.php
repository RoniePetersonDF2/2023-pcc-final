<?php 

require_once("../../conexao.php");
@session_start();

$id = $_POST['id'];
$reg_antigo = $_POST['reg_antigo'];

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$usuario = $_POST['usuario'];
$cpf_sem_traco = preg_replace('/[^0-9]/', '', $cpf);




if($nome == ''){
	echo "Preencha o Nome!";
	exit();
}


if($reg_antigo != $cpf){
	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from usuarios where cpf = '$cpf'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}
}


 	$res = $pdo->prepare("UPDATE usuarios SET nome = :nome, cpf = :cpf, telefone = :telefone, usuario = :usuario where id = :id");
 

	
	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":usuario", $usuario);
	
	$res->bindValue(":id", $id);
	
	$res->execute();

	$result = $res->execute();
if ($result) {
    echo '<script>alert("Balconista cadastrado com sucesso!");</script>';
    echo "<script language='javascript'>window.location='painel-adm/index.php?acao=balconistas'; </script>";
} else {
    echo '<p>Não foi fossível inserir Usuário!</p>';
}

	

	echo "Editado com Sucesso!!";


?>