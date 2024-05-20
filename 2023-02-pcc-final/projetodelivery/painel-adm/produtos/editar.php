<?php 

require_once("../../conexao.php");
@session_start();

$id = $_POST['id'];
$reg_antigo = $_POST['reg_antigo'];

$descricao = $_POST['descricao'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$descricao_longa = $_POST['descricao_longa'];
$categoria = $_POST['categoria'];
$combo = @$_POST['combo'];
$adicional = @$_POST['adicional'];

$nome_novo = strtolower(preg_replace("[^a-zA-Z0-9-]", "-", 
        strtr(utf8_decode(trim($nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
        "aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

$nome_url = preg_replace('/[ -]+/' , '-' , $nome_novo);


//SCRIPT PARA FOTO NO BANCO
$caminho = '../../images/produtos/' .$_FILES['foto']['name'];
    if ($_FILES['foto']['name'] == ""){
      $imagem = "sem-foto.png";
    }else{
      $imagem = $_FILES['foto']['name']; 
    }
    
    $imagem_temp = $_FILES['foto']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);




if($descricao == ''){
	echo "Preencha a Descrição!!";
	exit();
}

if($nome == ''){
	echo "Preencha o Valor!";
	exit();
}


if($reg_antigo != $nome){
	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from produtos where nome = '$nome'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}
}

 if ($_FILES['foto']['name'] == ""){
 	$res = $pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, descricao_longa = :descricao_longa, valor = :valor, categoria = :categoria, nome_url = :nome_url, combo = :combo, adicional = :adicional where id = :id");
 }else{
 	$res = $pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, descricao_longa = :descricao_longa, valor = :valor, categoria = :categoria, nome_url = :nome_url, imagem = :imagem, combo = :combo, adicional = :adicional where id = :id");
 	$res->bindValue(":imagem", $imagem);
 }



	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":nome", $nome);
	
	$res->bindValue(":nome_url", $nome_url);
	$res->bindValue(":categoria", $categoria);
	$res->bindValue(":valor", $valor);
	$res->bindValue(":descricao_longa", $descricao_longa);
	$res->bindValue(":combo", $combo);
	$res->bindValue(":adicional", $adicional);
	$res->bindValue(":id", $id);
	
	$res->execute();

	

	echo "Editado com Sucesso!!";


?>