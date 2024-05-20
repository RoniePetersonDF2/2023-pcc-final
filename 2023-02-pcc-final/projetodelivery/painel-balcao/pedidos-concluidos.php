<?php 
$pagina = 'pedidos-concluidos';

$pagina_pag = intval(@$_GET['pagina']);
$itens_pag = intval(@$_GET['itens']);
$agora = date('Y-m-d');


?>


<div class="container ml-2 mr-2">

<nav class="navbar navbar-expand mb-4">
		
				
		<form method="post" id="frm">
			<input type="hidden" name="pag" id="pag" value="<?php echo $pagina_pag ?>">
			<input type="hidden" name="itens_pag" id="itens_pag" value="<?php echo $itens_pag ?>">
		</form>
		

		<div class="direita">
			<!-- SEARCH FORM -->
			<form class="form-inline ml-3 float-right">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="date" name="txtbuscar" id="txtbuscar" placeholder="Buscar" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit" id="btn-buscar">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>

	</nav>

		
	

	<div id="listar">
		
	</div>
</div>








<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";
		$('#btn-buscar').click(function(event){
			event.preventDefault();	
			
			$.ajax({
				url: pag + "/listar.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "html",
				success: function(result){
					$('#listar').html(result)
					
				},
				

			})

		})

		
	})
</script>








<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		
		var pag = "<?=$pagina?>";

		$.ajax({
			url: pag + "/listar.php",
			method: "post",
			data: $('#frm').serialize(),
			dataType: "html",
			success: function(result){
				$('#listar').html(result)

			},

			
		})
	})
</script>







 <!--MODAL PARA MOSTRAR A DESCRIÇÃO DO PRODUTO -->

            <div class="modal fade" id="modal-produtos" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">PRODUTOS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                 
                    <div id="listar-produtos">
                    	
                    </div>

                  </div>
                  
               </div>
             </div>
           </div>







 <!--MODAL PARA MOSTRAR DADOS DO CLIENTE -->

            <div class="modal fade" id="modal-cliente" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">CLIENTE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                 
                    <div id="listar-cliente">
                    	
                    </div>

                  </div>
                  
               </div>
             </div>
           </div>






 <!--MODAL PARA MOSTRAR A DESCRIÇÃO DO PRODUTO -->

            <div class="modal fade" id="modal-obs" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 id="texto-descricao" class="modal-title">Observações do Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                 
                    <span id="texto-descricao-longa"></span>

                  </div>
                  
               </div>
             </div>
           </div>



<script>
function produtosModal(id) {
    $("#id").text(id);

    var pag = "<?=$pagina?>";

		$.ajax({
			url: pag + "/listar-produtos.php",
			method: "post",
			data: {id},
			dataType: "html",
			success: function(result){
				$('#listar-produtos').html(result)

			},

			
		})
    
}
</script>




<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
<script type="text/javascript">
	$('#txtbuscar').change(function(){
		$('#btn-buscar').click();
	})
</script>





<script>
function atualizarPedidos() {
	 var pag = "<?=$pagina?>";
  $.ajax({
			url: pag + "/listar.php",
			method: "post",
			data: $('#frm').serialize(),
			dataType: "html",
			success: function(result){
				$('#listar').html(result)

			},

			
		})
}
</script>




<script>
function mudarStatus(id, status) {
    event.preventDefault();
            
            var pag = "<?=$pagina?>";

            $.ajax({

               url: pag + "/alterar-status.php",
                method: "post",
                data: {id, status},
                dataType: "text",
                success: function(mensagem){

                    $('#mensagem').removeClass()

                    if(mensagem == 'Editado com Sucesso!!'){
                        atualizarPedidos();
                       //$("#modal-carrinho").modal("show");
                     

                    }else{
                      
                       
                    }
                    
                    $('#mensagem').text(mensagem)

                },
                
            })
}
</script>





<script>
function clienteModal(id) {
    
    var pag = "<?=$pagina?>";

		$.ajax({
			url: pag + "/listar-cliente.php",
			method: "post",
			data: {id},
			dataType: "html",
			success: function(result){
				$('#listar-cliente').html(result)

			},

			
		})
    
}
</script>




<script>
function obsModal(obs) {
    
    $("#texto-descricao-longa").text(obs);
}
</script>