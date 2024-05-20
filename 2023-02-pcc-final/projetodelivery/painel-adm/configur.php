


  <div class="modal fade" id="modal-config" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Configurações</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post">


           
               <div class="form-group">
                <label class="text-dark" for="exampleInputEmail1">Previsão Entrega em Minutos</label>
                <input type="text" class="form-control form-control-sm" id="previsao_minutos" name="previsao_minutos" placeholder="Minutos" required value="<?php echo @$previsao_minutos ?>">

              </div>
           

          
             <div class="form-group">
              <label class="text-dark" for="exampleInputEmail1">Taxa Entrega</label>
              <input type="text" class="form-control form-control-sm" id="taxa_entrega" name="taxa_entrega" placeholder="Taxa de Entrega" value="<?php echo @$taxa_entrega ?>">
            </div>


             <div class="form-group">
              <label class="text-dark" for="exampleInputEmail1">Hora Abertura (A partir das 00:00)</label>
              <input type="text" class="form-control form-control-sm" id="abertura" name="abertura" placeholder="Hora de Abertura" value="<?php echo @$abertura ?>">
            </div>


             <div class="form-group">
              <label class="text-dark" for="exampleInputEmail1">Hora Fechamento (Até as 23:59)</label>
              <input type="text" class="form-control form-control-sm" id="fechamento" name="fechamento" placeholder="Hora Fechamento" value="<?php echo @$fechamento ?>">
            </div>







      <div align="center" class="" id="mensagem">
      </div>


    </div>
    <div class="modal-footer">
     <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
     <button name="btn-config" id="btn-config" class="btn btn-info">Editar</button>

   </form>

 </div>
</div>
</div>
</div>


<?php if(@$_GET['acao'] == $item6) { ?>
 <script> $("#modal-config").modal("show"); </script> 
<?php } ?>

<?php if(isset($_POST['btn-config'])){

$taxa_entrega = $_POST['taxa_entrega'];
$previsao_minutos = $_POST['previsao_minutos'];
$abertura = $_POST['abertura'];
$fechamento = $_POST['fechamento'];


$res = $pdo->prepare("UPDATE config set taxa_entrega = :taxa_entrega, previsao_minutos = :previsao_minutos, abertura = :abertura, fechamento = :fechamento where id = :id");

    $res->bindValue(":taxa_entrega", $taxa_entrega);
    $res->bindValue(":previsao_minutos", $previsao_minutos);
    $res->bindValue(":abertura", $abertura);
    $res->bindValue(":fechamento", $fechamento);
    $res->bindValue(":id", 1);
    
    $res->execute();

    


    echo "<script language='javascript'>window.location='index.php'; </script>";


} ?>