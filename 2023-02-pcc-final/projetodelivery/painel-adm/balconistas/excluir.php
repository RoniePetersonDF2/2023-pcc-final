<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

$pdo->query("DELETE from usuarios where id = '$id' and nivel = 'balconista' ");

echo "Excluído com Sucesso!!";

?>