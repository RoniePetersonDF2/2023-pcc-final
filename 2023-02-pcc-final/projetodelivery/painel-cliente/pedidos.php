<?php 
$pagina = 'pedidos';

$pagina_pag = intval(@$_GET['pagina']);
$itens_pag = intval(@$_GET['itens']);
$agora = date('Y-m-d');


?>


<div class="container ml-2 mr-2">

	<form method="post" id="frm">
			<input type="hidden" name="pag" id="pag" value="<?php echo $pagina_pag ?>">
			<input type="hidden" name="itens_pag" id="itens_pag" value="<?php echo $itens_pag ?>">
		</form>
		
	

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




