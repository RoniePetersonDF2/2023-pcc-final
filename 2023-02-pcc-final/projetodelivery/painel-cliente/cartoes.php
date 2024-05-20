
    <?php
    include_once('../conexao.php');

     
      //RECUPERAR CAMPOS PARA EDIÇAO

    $cpf = $_SESSION['cpf_usuario'];
    $carimbos = 0;


    $res_todos = $pdo->query("SELECT * from clientes where cpf = '$cpf'");
    $dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
    $carimbos = $dados_total[0]['cartao'];
                                     
    ?>



    


<div class="container ml-4">

<h4>Cartão Fidelidade</h4>
<span>A cada 10 pedidos realizados ganhe um cupom de desconto de R$ 20,00 !!!</span><br>

<?php if($carimbos == 0){ ?>
  <small><span class="text-muted">Faça já a sua primeira compra no site e comece a preencher seu cartão!!</span></small><br>
<?php } ?>
<br>

<span><b>Como Funciona?</b></span><br>
 <small><span class="text-muted">Após efetuar 5 compras no site...</span></small>

<br><br>

<div class="row">

 
      <?php if($carimbos > 0){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
     <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>
      
     <?php if($carimbos > 1){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
     <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>
       

    <?php if($carimbos > 2){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
     <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>

      <?php if($carimbos > 3){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
    <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>


      <?php if($carimbos > 4){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
     <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>

     <?php if($carimbos > 5){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
     <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>
      
     <?php if($carimbos > 6){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
     <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>
       

    <?php if($carimbos > 7){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
     <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>

      <?php if($carimbos > 8){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
    <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>


      <?php if($carimbos > 9){ ?>
        <div class="col-md-2 ml-2" align="center">
        <img src="../images/logo.jpg" width="180">
      </div>
     <?php }else{ ?>
       <div class="col-md-2 ml-2" align="center">
        <img src="../images/logoescura.jpg" width="180">
      </div>
     <?php } ?>

      


      



      

 

</div>
 


 

</div>

     

