<?php 

require_once("../../conexao.php");
$pagina = 'categorias';

$txtbuscar = @$_POST['txtbuscar'];


echo '
<div class="table-responsive">
<table class="table table-sm mt-3 tabelas">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Descrição</th>
			<th scope="col">Imagem</th>
			
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>';


		//CAMINHO DA PAGINAÇÃO
		$caminho_pag = 'index.php?acao='.$pagina.'&';

	if($txtbuscar == ''){
		$res = $pdo->query("SELECT * from categorias order by nome asc ");
	}else{
		$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
		$res = $pdo->query("SELECT * from categorias where nome LIKE '$txtbuscar' or descricao LIKE '$txtbuscar' order by nome asc");

	}
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);


		//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from categorias");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		// $num_paginas = ceil($num_total/$itens_por_pagina);


	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			
			$descricao = $dados[$i]['descricao'];
			$imagem = $dados[$i]['imagem'];
		

			

echo '
		<tr>

			
			<td>'.$nome.'</td>
			
			
			<td>'.$descricao.'</td>
			<td><img src="../images/categorias/'.$imagem.'" width="50"></td>
			
			
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