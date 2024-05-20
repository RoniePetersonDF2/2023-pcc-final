<?php 

require_once("../../conexao.php");

$id = $_POST['id'];
$status = $_POST['status'];

if ($status == 'Pago'){
	$pdo->query("UPDATE vendas SET pago = 'Sim' where id = '$id'");

	echo "Editado com Sucesso!!";
	exit();
}

$pdo->query("UPDATE vendas SET status = '$status' where id = '$id'");

echo "Editado com Sucesso!!";




?>