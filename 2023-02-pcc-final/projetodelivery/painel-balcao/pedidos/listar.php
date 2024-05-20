<?php 

require_once("../../conexao.php");
$pagina = 'pedidos';
$txtbuscar = @$_POST['txtbuscar'];

echo '
<div class="table-responsive">
<table class="table table-sm mt-3">
	<thead class="thead-light">
		<tr>
			<th scope="col">Hora</th>
			<th scope="col">Tipo PGTO</th>
			<th scope="col">Status</th>
			<th scope="col">Troco</th>
			<th scope="col">Pago</th>
			<th scope="col">Ações</th>
						
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

	if($txtbuscar == ''){
		// $res = $pdo->query("SELECT * from vendas where data = curDate() and pago != 'Sim' order by id desc LIMIT $limite, $itens_por_pagina");
		$res = $pdo->query("SELECT * from vendas where data = curDate() and pago != 'Sim' order by id desc ");
	}else{
		$res = $pdo->query("SELECT * from vendas where data = '$txtbuscar' and pago != 'Sim' order by id desc ");
	}
	
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
			$troco = $dados[$i]['troco'];
			$cliente = $dados[$i]['cliente'];
			$obs = $dados[$i]['obs'];
		

			if($status == 'Iniciado'){
				$classe = 'bg-info';
			}else if($status == 'Preparando'){
				$classe = 'bg-danger';
			}else if($status == 'Despachado'){
				$classe = 'bg-warning';
			}else if($status == 'Concluído'){
				$classe = 'bg-success';
			}else{
				$classe = '';
			}

			



			

echo '
		<tr class="'.$classe.'">

			
			<td>'.$hora.'</td>
			
			<td>R$ '.$tipo_pgto.'</td>

			<td>';

			echo $status;
			
			if($status == 'Iniciado'){
				$stat = 'Preparando';
				echo '
				<a href="" title="Status para Preparando" onclick="mudarStatus('.$id.',\''.$stat.'\')" id="btn-carrinho">
				<i class="fas fa-square ml-1 '.$classe.'"></i>
				</a>
				';
			}else if($status == 'Preparando'){
				$stat = 'Despachado';
				echo '
				<a href="" title="Status para Despachado" onclick="mudarStatus('.$id.',\''.$stat.'\')" id="btn-carrinho">
				<i class="fas fa-square ml-1 '.$classe.'"></i>
				</a>
				';
			}else if($status == 'Despachado'){
				$stat = 'Concluído';
				echo '
				<a href="" title="Status para Concluído" onclick="mudarStatus('.$id.',\''.$stat.'\')" id="btn-carrinho">
				<i class="fas fa-square ml-1 '.$classe.'"></i>
				</a>
				';
			}else if($status == 'Concluído'){
				$stat = 'Pago';
				echo '
				<a href="" title="Finalizar Pagamento" onclick="mudarStatus('.$id.',\''.$stat.'\')" id="btn-carrinho">
				<i class="fas fa-square ml-1 '.$classe.'"></i>
				</a>
				';
			}else{
				$classe = '';
			}

			echo '</td>

			<td>'.$troco.'</td>
			<td>'.$pago.'</td>
			<td>
				<a title="Ver Produtos" href="" onclick="produtosModal('.$id.')" data-toggle="modal" data-target="#modal-produtos"><i class="fab fa-product-hunt '.$classe.'"></i></a>

				<a title="Dados Cliente" href="" onclick="clienteModal('.$id.')" data-toggle="modal" data-target="#modal-cliente"><i class="fas fa-user '.$classe.' ml-1"></i></a> 


				<a title="Gerar Comprovante" href="rel/comprovante_class.php?id='.$id.'" target="_blank"><i class="fas fa-clipboard-list '.$classe.' ml-1"></i></a>


				';




				if($obs != ''){



				echo '<a title="Observações do Pedido" href="" onclick="obsModal(\''.$obs.'\')" data-toggle="modal" data-target="#modal-obs"><i class="fas fa-sticky-note '.$classe.' ml-1"></i></a> ';

					}

			echo '	
			</td>
			
			
			
		</tr>';

	}

echo  '
	</tbody>
</table>
</div> ';




// e0cho '

// <!--ÁREA DA PÁGINAÇÃO -->
// <nav class="paginacao" aria-label="Page navigation example">
//           <ul class="pagination justify-content-center">
//             <li class="page-item">
//               <a class="btn btn-outline-dark btn-sm mr-1" href="'.$caminho_pag.'pagina=0&itens='.$itens_por_pagina.'" aria-label="Previous">
//                 <span aria-hidden="true">&laquo;</span>
//                 <span class="sr-only">Previous</span>
//               </a>
//             </li>';
            
//             for($i=0;$i<$num_paginas;$i++){
//             $estilo = "";
//             if($pagina_pag >= ($i - 2) and $pagina_pag <= ($i + 2)){


//             if($pagina_pag == $i)
//               $estilo = "active";

//           echo '
//              <li class="page-item"><a class="btn btn-outline-dark btn-sm mr-1 '.$estilo.'" href="'.$caminho_pag.'pagina='.$i.'&itens='.$itens_por_pagina.'">'.($i+1).'</a></li>';
//            } }
            
//            echo '<li class="page-item">
//               <a class="btn btn-outline-dark btn-sm" href="'.$caminho_pag.'pagina='.($num_paginas-1).'&itens='.$itens_por_pagina.'" aria-label="Next">
//                 <span aria-hidden="true">&raquo;</span>
//                 <span class="sr-only">Next</span>
//               </a>
//             </li>
//           </ul>
// </nav>

// <div align="center">';

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