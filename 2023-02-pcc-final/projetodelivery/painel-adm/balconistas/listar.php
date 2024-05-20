<?php 

require_once("../../conexao.php");
$pagina = 'balconistas';

$txtbuscar = @$_POST['txtbuscar'];


echo '
<div class="table-responsive">
<table class="table table-sm mt-3 tabelas">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">CPF</th>
			<th scope="col">Telefone</th>
			<th scope="col">Email</th>
			
			
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>';

	

		//CAMINHO DA PAGINAÇÃO
		$caminho_pag = 'index.php?acao='.$pagina.'&';

	if($txtbuscar == ''){
		$res = $pdo->query("SELECT * from usuarios where nivel = 'Balconista' order by nome asc ");
	}else{
		$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
		$res = $pdo->query("SELECT * from locais where nivel = 'Balconista' and (nome LIKE '$txtbuscar' or cpf LIKE '$txtbuscar') order by nome asc");

	}
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);


		//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from usuarios where nivel = 'Balconista'");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		// $num_paginas = ceil($num_total/$itens_por_pagina);


	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			$cpf = $dados[$i]['cpf'];
			$telefone = $dados[$i]['telefone'];
			$usuario = $dados[$i]['usuario'];
					

echo '
		<tr>

			
			<td>'.$nome.'</td>
			<td>'.$cpf.'</td>
			<td>'.$telefone.'</td>
			<td>'.$usuario.'</td>
			
			
			<td>
				<a href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-edit text-info"></i></a>
				<a href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
			</td>
		</tr>';

	}

echo  '
	</tbody>
</table>
</div> ';





?>