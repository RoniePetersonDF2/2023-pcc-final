<?php 

require_once("../../conexao.php");
$pagina = 'pedidos';


@session_start();
$cpf_cliente = @$_SESSION['cpf_usuario'];

echo '
<div class="table-responsive">
<table class="table table-sm mt-3">
	<thead class="thead-light">
		<tr>
			<th scope="col">Hora</th>
			<th scope="col">Previsão Chegada</th>
			<th scope="col">Total</th>
			<th scope="col">Tipo PGTO</th>
			<th scope="col">Status</th>
			<th scope="col">Pago</th>
			<th scope="col">Produtos</th>
						
		</tr>
	</thead>
	<tbody>';

	
	    

		//PEGAR A PÁGINA ATUAL
		// $itens_pag = intval(@$_POST['itens_pag']);
		// if($itens_pag != ''){
		// 	$itens_por_pagina = $itens_pag;
		// }
		// $pagina_pag = intval(@$_POST['pag']);

		// $limite = $pagina_pag * $itens_por_pagina;

		// //CAMINHO DA PAGINAÇÃO
		// $caminho_pag = 'index.php?acao='.$pagina.'&';

	
		// $res = $pdo->query("SELECT * from vendas where cliente = '$cpf_cliente' order by id desc LIMIT $limite, $itens_por_pagina");

		$res = $pdo->query("SELECT * from vendas where cliente = '$cpf_cliente' order by id desc ");
	
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);


		//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from vendas");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		// $num_paginas = ceil($num_total/$itens_por_pagina);


	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$hora = $dados[$i]['hora'];
			$total = $dados[$i]['total'];
			$tipo_pgto = $dados[$i]['tipo_pgto'];
			$status = $dados[$i]['status'];
			$pago = $dados[$i]['pago'];
		

			if($status == 'Iniciado'){
				$classe = 'bg-info';
			}else if($status == 'Preparando'){
				$classe = 'bg-primary';
			}else if($status == 'Despachado'){
				$classe = 'bg-warning';
			}else{
				$classe = '';
			}

			



			

echo '
		<tr class="'.$classe.'">

			
			<td>'.$hora.'</td>
			<td>'.date("H:i",strtotime("$hora + $previsao_minutos minutes")).'</td>
			<td>R$ '.$total.'</td>
			<td>'.$tipo_pgto.'</td>
			<td>'.$status.'</td>
			<td>'.$pago.'</td>
			<td>
				<a href="" onclick="produtosModal('.$id.')" data-toggle="modal" data-target="#modal-produtos"><i class="fab fa-product-hunt '.$classe.'"></i></a>
				
			</td>
			
			
			
		</tr>';

	}

echo  '
	</tbody>
</table>
</div> ';






// if(@$itens_pag == $itens_por_pagina_1){
// 	$classe_ativa_1 = 'classe_ativa_pag';
// }
// if(@$itens_pag == $itens_por_pagina_2){
// 	$classe_ativa_2 = 'classe_ativa_pag';
// }
// if(@$itens_pag == $itens_por_pagina_3){
// 	$classe_ativa_3 = 'classe_ativa_pag';
// }

// echo '
// <a href="'.$caminho_pag.'itens='.@$itens_por_pagina_1.'" class="'.@$classe_ativa_1.'" title="Itens para mostrar na paginação">'.$itens_por_pagina_1.'</a> - 
// <a href="'.$caminho_pag.'itens='.@$itens_por_pagina_2.'" class="'.@$classe_ativa_2.'" title="Itens para mostrar na paginação">'.$itens_por_pagina_2.'</a> -
// <a href="'.$caminho_pag.'itens='.@$itens_por_pagina_3.'" class="'.@$classe_ativa_3.'" title="Itens para mostrar na paginação">'.$itens_por_pagina_3.'</a> -
// <small>Itens</small>

// </div>


// ';


?>