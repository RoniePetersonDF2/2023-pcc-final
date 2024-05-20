<?php 

require_once("../conexao.php");
@session_start();


$tipo = $_POST['tipo'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$obs = $_POST['obs'];
$total = $_POST['total'];
$total_pago = 0;
$troco = 0;


if($tipo == ''){
	echo 'Preencha o Tipo de Pagamento';
	exit();
}


if($rua == ''){
	echo 'Preencha a Rua';
	exit();
}


if($numero == ''){
	echo 'Preencha o Número';
	exit();
}

if($bairro == ''){
	echo 'Escolha um Bairro';
	exit();
}


if($cidade == ''){
	echo 'Escolha uma Cidade';
	exit();
}


if($tipo == 'Dinheiro'){
	$total_pago = @$_POST['troco'];
	$troco = $total_pago - $total;

	if($troco < 0){
		echo "O valor a pagar não pode ser menor que o valor total da compra!!";
		exit();
	}
}


if($tipo == 'Mercado Pago'){
	$status = 'Aguardando';
}else{
	$status = 'Iniciado';
}

$cpf_cliente = @$_SESSION['cpf_usuario'];




if($cpf_cliente != ''){


$res = $pdo->prepare("INSERT into vendas (cliente, total, total_pago, troco, tipo_pgto, data, hora, status, pago, obs) values (:cliente, :total, :total_pago, :troco, :tipo_pgto, curDate(), curTime(), :status, :pago, :obs)");

$res->bindValue(":cliente", $cpf_cliente);
$res->bindValue(":total", $total);
$res->bindValue(":total_pago", $total_pago);
$res->bindValue(":troco", $troco);
$res->bindValue(":tipo_pgto", $tipo);
$res->bindValue(":status", $status);
$res->bindValue(":pago", 'Não');
$res->bindValue(":obs", $obs);

$res->execute();
$id_venda = $pdo->lastInsertId();
	
}	




//TRAZER O TOTAL DE CARTÕES QUE O CLIENTE TEM
$res = $pdo->query("SELECT * from clientes where cpf = '$cpf_cliente'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$cartoes = $dados[0]['cartao'];
$cartoes = $cartoes + 1;

//ATUALIZAR OS DADOS DE ENDEREÇO DO CLIENTE
$res = $pdo->prepare("UPDATE clientes SET rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, cartao = :cartao where cpf = '$cpf_cliente'");

$res->bindValue(":rua", $rua);
$res->bindValue(":numero", $numero);
$res->bindValue(":bairro", $bairro);
$res->bindValue(":cidade", $cidade);
$res->bindValue(":cartao", $cartoes);

$res->execute();



//INCREMENTAR UMA VENDA NOS PRODUTOS VENDIDOS
$res = $pdo->query("SELECT * from carrinho where id_venda = 0 and cpf = '$cpf_cliente'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id_produto = $dados[$i]['id_produto'];	
			$quant = $dados[$i]['quantidade'];	
			
			//BUSCAR O PRODUTO NA TABELA PRODUTOS PARA ATUALIZAR VENDA
			$res_p = $pdo->query("SELECT * from produtos where id = '$id_produto'");
			$dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
			$vendas_p = $dados_p[0]['vendas'];
			$vendas_p = $vendas_p + $quant;

			$pdo->query("UPDATE produtos set vendas = '$vendas_p' where id = '$id_produto'");	

}




//ATUALIZAR O ID DA VENDA DOS ITENS DA TABELA CARRINHO PARA NOVA VENDA
$pdo->query("UPDATE carrinho SET id_venda = '$id_venda' where id_venda = 0 and cpf = '$cpf_cliente'");	


if($tipo != 'Mercado Pago'){
echo "Cadastrado com Sucesso!!";
}else{
	echo "Mercado Pago!!";
}



?>