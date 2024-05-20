<?php
 @session_start();
 include_once("../conexao.php");


if($_SESSION['nivel_usuario'] != 'Cliente'){
    echo "<script language='javascript'>window.location='../login.php'; </script>";
}

//ESTRUTURA DO MENU
$item1 = 'home';
$item2 = 'pedidos';
$item3 = 'cartoes';


//CLASSE PARA OS ITENS ATIVOS
if(@$_GET['acao'] == $item1){
          $item1ativo = 'active';
        }else if(@$_GET['acao'] == $item2){
          $item2ativo = 'active';
        }else if(@$_GET['acao'] == $item3){
          $item3ativo = 'active';
        }

 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Painel do Cliente</title>

 <link rel="icon" href="../images/logo.jpg" type="image/x-icon">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link href="dist/css/painel.css" rel="stylesheet">



   
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>

 

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?acao=<?php echo $item1 ?>" class="nav-link <?php echo $item1ativo ?>">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?acao=<?php echo $item2 ?>" class="nav-link <?php echo $item2ativo ?>">Pedidos</a>
      </li>

        <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?acao=<?php echo $item3 ?>" class="nav-link <?php echo $item3ativo ?>">Cartões fidelidade</a>
      </li>

   

    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="" >
          <?php echo $_SESSION['nome_usuario'] ?>
          <i class="fas fa-sign-out-alt ml-1"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="" data-toggle="modal" data-target="#modal-dados" class="dropdown-item" title="edite seus dados">

            <!-- Message Start -->
            <div class="media">
              <img src="../images/usuario-icone.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $_SESSION['nome_usuario'] ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star text-success"></i></span>
                </h3>
                 <small><?php echo $_SESSION['email_usuario'] ?></small>
               
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="../produtos.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../images/logout.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Sair do painel
                  <span class="float-right text-sm text-muted"><i class="fas fa-star text-danger"></i></span>
                </h3>
                <p class="text-sm">Voltar para o site</p>
                
              </div>
            </div>
            <!-- Message End -->
          </a>
         
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
     
      <span class="brand-text font-weight-light ml-4">Painel Cliente</span>
   
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../images/usuario-icone-claro.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['nome_usuario'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item ">
            <a href="index.php?acao=<?php echo $item1 ?>" class="nav-link <?php echo $item1ativo ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="index.php?acao=<?php echo $item2 ?>" class="nav-link <?php echo $item2ativo ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pedidos
                
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="index.php?acao=<?php echo $item3 ?>" class="nav-link <?php echo $item3ativo ?>">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Cartões fidelidade
                
              </p>
            </a>
          </li>


          
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


       <!-- /.Chamadas dos Includes das páginas -->
       <?php 
        if(@$_GET['acao'] == $item1){
          include_once($item1.'.php');
        }else if(@$_GET['acao'] == $item2){
          include_once($item2.'.php');
        }else if(@$_GET['acao'] == $item3){
          include_once($item3.'.php');
        }


        else{
          include_once($item1.'.php');
        }
        ?>
        

   
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->








</body>
</html>







<?php 

  

//TRAZER OS DADOS DO CLIENTE
  $cpf_cliente = @$_SESSION['cpf_usuario'];
  $res = $pdo->query("SELECT * from clientes where cpf = '$cpf_cliente'");
  $dados = $res->fetchAll(PDO::FETCH_ASSOC);
  $nome = @$dados[0]['nome'];
  $telefone = @$dados[0]['telefone'];
  $email = @$dados[0]['email'];
  $rua = @$dados[0]['rua'];
  $numero = @$dados[0]['numero'];
  $bairro = @$dados[0]['bairro'];
  $cidade = @$dados[0]['cidade'];
  $estado = @$dados[0]['estado'];
  $cep = @$dados[0]['cep'];


  $res2 = $pdo->query("SELECT * from usuarios where cpf = '$cpf_cliente'");
  $dados2 = $res2->fetchAll(PDO::FETCH_ASSOC);
  $senha = @$dados2[0]['senha'];
 ?>



  <div class="modal fade" id="modal-dados" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Dados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="row">
              <div class="col-md-4">
               <div class="form-group">
                <label class="text-dark" for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control form-control-sm" id="nome" name="nome" placeholder="Nome e Sobrenome" required value="<?php echo @$nome ?>">

              </div>
            </div>

            <div class="col-md-4">
             <div class="form-group">
              <label class="text-dark" for="exampleInputEmail1">CPF</label>
              <input type="text" class="form-control form-control-sm" id="cpf" name="cpf" placeholder="CPF" disabled value="<?php echo @$cpf_cliente ?>">

            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="text-dark" for="exampleInputEmail1">Telefone</label>
              <input type="text" class="form-control form-control-sm" id="telefone" name="telefone" placeholder="Telefone" required value="<?php echo @$telefone ?>">

            </div>

          </div>

         

      
         <div class="col-md-3">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Email" required value="<?php echo @$email ?>">

          </div>

        </div>


          <div class="col-md-3">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Senha</label>
            <input type="senha" class="form-control form-control-sm" id="senha" name="senha" placeholder="Senha" required value="<?php echo @$senha ?>">

          </div>

        </div>

        <div class="col-md-4">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Rua</label>
            <input type="text" class="form-control form-control-sm" id="rua" name="rua" placeholder="Rua" required value="<?php echo @$rua ?>">

          </div>

        </div>


          <div class="col-md-2">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Número</label>
            <input type="text" class="form-control form-control-sm" id="numero" name="numero" placeholder="Número" required value="<?php echo @$numero ?>">

          </div>

        </div>

          <div class="col-md-3">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Bairro</label>
            
            <select class="form-control form-control-sm" id="" name="bairro" required>



                <?php 
                //SE EXISTIR EDIÇÃO DOS DADOS, TRAZER O NOME DO ITEM ASSOCIADA AO REGISTRO
                if(@$bairro != ''){

                 
                  echo '<option value="'.@$bairro.'">'.@$bairro.'</option>';
                }else{
                   echo '<option value="">Selecione um Bairro</option>';
                }
                


                //TRAZER TODOS OS REGISTROS EXISTENTES
                $res = $pdo->query("SELECT * from locais order by nome asc");
                $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($dados); $i++) { 
                  foreach ($dados[$i] as $key => $value) {
                  }

                  $id_item = $dados[$i]['id'];  
                  $nome_item = $dados[$i]['nome'];

                  if($nome_dado != $nome_item){
                    echo '<option value="'.$nome_item.'">'.$nome_item.'</option>';
                  }

                  
                }
                ?>
              </select>

          </div>

        </div>

         <div class="col-md-4">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Cidade</label>
            <input type="text" class="form-control form-control-sm" id="cidade" name="cidade" placeholder="Cidade" required value="<?php echo @$cidade ?>">

          </div>

        </div>


          <div class="col-md-2">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Estado</label>
           
            <select id="estado" name="estado" class="form-control form-control-sm">

        
      
         <option value="MG" <?php if($estado == 'MG'){ ?> selected <?php } ?>>DF</option>
        

      </select>

          </div>

        </div>


         <div class="col-md-3">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">CEP</label>
            <input type="text" class="form-control form-control-sm" id="cep" name="cep" placeholder="CEP" required value="<?php echo @$cep ?>">

          </div>

        </div>



      </div>







      <div align="center" class="" id="mensagem">
      </div>


    </div>
    <div class="modal-footer">
     <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
     <button name="btn-editar" id="btn-editar" class="btn btn-info">Editar</button>

   </form>

 </div>
</div>
</div>
</div>





<?php if(isset($_POST['btn-editar'])){



$cpf = @$_SESSION['cpf_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$telefone = $_POST['telefone'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$senha = $_POST['senha'];



$res = $pdo->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario, senha = :senha, telefone = :telefone where cpf = :cpf");

    $res->bindValue(":nome", $nome);
    $res->bindValue(":usuario", $email);
    $res->bindValue(":cpf", $cpf);
    $res->bindValue(":senha", $senha);
   
    $res->bindValue(":telefone", $telefone);

    $res->execute();

    


   $res = $pdo->prepare("UPDATE clientes set nome = :nome, email = :usuario, rua = :rua, telefone = :telefone, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep where cpf = :cpf");

    $res->bindValue(":nome", $nome);
    $res->bindValue(":usuario", $email);
    $res->bindValue(":cpf", $cpf);
    $res->bindValue(":rua", $rua);
    $res->bindValue(":numero", $numero);
    $res->bindValue(":telefone", $telefone);
    $res->bindValue(":bairro", $bairro);
    $res->bindValue(":cidade", $cidade);
    $res->bindValue(":estado", $estado);
    $res->bindValue(":cep", $cep);

    $res->execute();

    echo "<script language='javascript'>window.location='index.php'; </script>";


} ?>
