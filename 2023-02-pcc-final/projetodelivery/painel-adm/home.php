 <?php 

 $res_todos = $pdo->query("SELECT * from clientes");
  $dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
  $total_clientes = count($dados_total);


  $res_todos = $pdo->query("SELECT * from vendas where data = curDate()");
  $dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
  $total_pedidos_dia = count($dados_total);


$res_todos = $pdo->query("SELECT * from vendas where data = curDate() and status != 'Concluído' ");
  $dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
  $total_pedidos_aguardando = count($dados_total);





$res = $pdo->query("SELECT * from vendas where data = curDate() and pago = 'Sim'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$total_dia = 0;

for ($i=0; $i < count($dados); $i++) { 
  foreach ($dados[$i] as $key => $value) {
  }

  $id = $dados[$i]['id']; 
  $valor = $dados[$i]['total'];
  

 $total_dia = $total_dia + $valor;
 
}


  ?>


 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Clientes</span>
                <span class="info-box-number">
                  <?php echo $total_clientes ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pedidos Hoje</span>
                <span class="info-box-number"><?php echo $total_pedidos_dia ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-truck-loading"></i></span>
              

              <div class="info-box-content">
                <span class="info-box-text">Entregas Aguardando</span>
                <span class="info-box-number"><?php echo $total_pedidos_aguardando ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Vendido</span>
                <span class="info-box-number">R$ <?php echo $total_dia ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->




    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <?php 

          $res = $pdo->query("SELECT * from vendas where data = curDate() and status = 'Iniciado' order by id desc LIMIT 8");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);

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

         $res = $pdo->query("SELECT * from clientes where cpf = '$cliente'");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
          $nome_cliente = $dados[0]['nome'];
    

           ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pedido <?php echo $id ?></span>
                <span class="info-box-text">Hora <?php echo $hora ?></span>
                <span class="info-box-text"><?php echo $nome_cliente ?></span>
                <span class="info-box-number">
                  Total - <?php echo $total ?>

                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        <?php } ?>


        </div>
      </div>
    </section>



     