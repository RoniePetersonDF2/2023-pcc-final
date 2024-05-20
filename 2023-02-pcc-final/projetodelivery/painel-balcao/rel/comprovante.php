<?php 


include('../../conexao.php');

$id = $_GET['id'];

//BUSCAR AS INFORMAÇÕES DO PEDIDO
$res = $pdo->query("SELECT * from vendas where id = '$id' ");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$hora = $dados[0]['hora'];
$total = $dados[0]['total'];
$total_pago = $dados[0]['total_pago'];
$tipo_pgto = $dados[0]['tipo_pgto'];
$status = $dados[0]['status'];
$pago = $dados[0]['pago'];
$troco = $dados[0]['troco'];
$cliente = $dados[0]['cliente'];
$obs = $dados[0]['obs'];
$data = $dados[0]['data'];


$data2 = implode('/', array_reverse(explode('-', $data)));

$res = $pdo->query("SELECT * from clientes where cpf = '$cliente' ");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$nome_cliente = $dados[0]['nome'];
$rua = $dados[0]['rua'];
$numero = $dados[0]['numero'];
$bairro = $dados[0]['bairro'];
$cidade = $dados[0]['cidade'];
$estado = $dados[0]['estado'];
$cep = $dados[0]['cep'];
 ?>


<link rel="stylesheet" type="text/css" href="comprovante.css">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/fonts.css">


<table class="printer-ticket">
 	
		<tr>
			<th class="title" colspan="3"><?php echo $nome_loja ?></th>

		</tr>
		<tr>
			<th colspan="3"><?php echo $data2 ?> - <?php echo $hora ?></th>
		</tr>
		<tr>
			<th colspan="3">
				<?php echo $nome_cliente ?> <br />
				<?php echo $cliente ?>
			</th>
		</tr>
		<tr>
			<th class="ttu" colspan="3">
				Cupom não fiscal
			</th>
		</tr>
	
	<tbody>

		<?php 

		  $res = $pdo->query("SELECT * from carrinho where id_venda = '$id' order by id asc");
            $dados = $res->fetchAll(PDO::FETCH_ASSOC);
            $linhas = count($dados);

            $sub_tot;
            for ($i=0; $i < count($dados); $i++) { 
              foreach ($dados[$i] as $key => $value) {
              }

              $id_produto = $dados[$i]['id_produto']; 
              $quantidade = $dados[$i]['quantidade'];
             


              $res_p = $pdo->query("SELECT * from produtos where id = '$id_produto' ");
              $dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
              $nome_produto = $dados_p[0]['nome'];  
              $valor = $dados_p[0]['valor'];
              
              $total_item = $valor * $quantidade;
              

              $sub_tot = $sub_tot + $total_item;
              $sub_total = $sub_tot;

              $total = $sub_total + $taxa_entrega;

              $sub_total = number_format( $sub_total , 2, ',', '.');
              $total_item = number_format( $total_item , 2, ',', '.');
              $total = number_format( $total , 2, ',', '.');
		 ?>
		
		<tr>
			<td><?php echo $nome_produto ?></td>
			<td align="center"><?php echo $quantidade ?></td>
			<td align="right">R$ <?php echo $total_item ?></td>
		</tr>

	<?php } ?>
		
	</tbody>
	<tfoot>

		<tr>
			<td colspan="3" class="cor">
				----------------------------------------------------------------------------------
			</td>
		</tr>

		
		<tr>
			<td colspan="2">Sub-total</td>
			<td align="right">R$ <?php echo $sub_total ?></td>
		</tr>
		<tr>
			<td colspan="2">Taxa de Entrega</td>
			<td align="right">R$ <?php echo $taxa_entrega ?></td>
		</tr>
		
		<tr>
			<td colspan="2">Total</td>
			<td align="right">R$ <?php echo $total ?></td>
		</tr>

		<tr>
			<td colspan="2">Total Pago</td>
			<td align="right">R$ <?php echo $total_pago ?></td>
		</tr>

		<tr>
			<td colspan="2">Troco</td>
			<td align="right">R$ <?php echo $troco ?></td>
		</tr>

		<tr>
			<td colspan="3" class="cor">
				----------------------------------------------------------------------------------
			</td>
		</tr>

		<tr>
			<td align="center" class="ttu" colspan="3">
				pagamento e entrega
			</td>

		</tr>

		<tr>
			<td colspan="3" class="cor">
				----------------------------------------------------------------------------------
			</td>
		</tr>

		<tr>
			<td colspan="2">Forma de Pagamento</td>
			<td align="right"><?php echo $tipo_pgto ?></td>
		</tr>
		<tr>
			<td colspan="2">Pago</td>
			<td align="right"><?php echo $pago ?></td>
		</tr>

		<tr>
			<td colspan="3" class="cor">
				----------------------------------------------------------------------------------
			</td>
		</tr>

		<tr>
			<td align="center" colspan="3">Endereço Entrega - <?php echo $rua .' Nº '. $numero .' Bairro '. $bairro;  ?></td>

			
			
		</tr>

		<tr>

			<td align="center" colspan="3"><?php echo $cidade .' - '. $estado .'   CEP '. $cep;  ?></td>

		</tr>
		

		<tr>
			<td colspan="3" class="cor">
				----------------------------------------------------------------------------------
			</td>
		</tr>

		<tr>
			<td colspan="3" align="center">
				<b>Pedido: <?php echo $id ?></b>
			</td>
		</tr>

		<tr>
			<td colspan="3" class="cor">
				----------------------------------------------------------------------------------
			</td>
		</tr>
		
		<tr>
			<td colspan="3" align="center">
				www.tiogogadelivery.com.br
			</td>
		</tr>
	</tfoot>
</table>