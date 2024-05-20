<?php
require_once 'classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="css/boot.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/formulario.css" rel="stylesheet">
    <!--<link href="css/fonticon.css" rel="stylesheet">-->
    <link href="css/lista.css" rel="stylesheet">
    <!-- biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- biblioteca jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>
    <link href="css/modal.css" rel="stylesheet">
    <title>Editar Artesão</title>

    <script>
        $(document).ready(function() {
            $('#cnpj').mask('00.000.000/0000-00');
        });
        $(document).ready(function() {
            $('#telefone_coop').mask('(00)00000-0000');
        });
    </script>

</head>
<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
                    <div class="listagem_info">
                    <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    <samp class="icon-blog">Editar Dados</samp> -->
                   </div>
                   <a href="lista.php" class="btn">Voltar</a>
        </div>
    </header>

    <style>


        .main_cta{
            width:100%;
            background-image: url('../IMG/bg_main_home.png');
            background-color: #2d3142;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
}
    </style>

<main>
      


      <div class="box">

<?php
//joga os dados coletados na tabela
if(isset($_GET['id_upcoop']))//verifica se a pessoa apertou no botao "editar" da lista.php
{
    $id_update = addslashes($_GET['id_upcoop']);
    $ress = $c->buscarDadosCooperativa($id_update);
}

if(isset($_POST['submit'])){

    $id_upd = addslashes($_GET['id_upcoop']);
    $nome_empresa = addslashes($_POST['nome_empresa']);
    $nome_fantasia = addslashes($_POST['nome_fantasia']);
    $cnpj = addslashes($_POST['cnpj']);
    $natureza = addslashes($_POST['natureza']);
    $telefone_coop = addslashes($_POST['telefone_coop']);
    $endereco_coop = addslashes($_POST['endereco_coop']);
    $email_coop = addslashes($_POST['email_coop']);
    if(!empty($nome_empresa) && !empty($nome_empresa)  && !empty($cnpj) && !empty($natureza) 
    && !empty($telefone_coop)  && !empty($telefone_coop)  && !empty($email_coop)){
        //editar
        $c->atualizarDadosCoop($id_upd, $nome_empresa,$nome_fantasia,$cnpj,$natureza,$telefone_coop,$endereco_coop, $email_coop);
                header("location: lista.php");
                //echo "Dados atualizados com sucesso";
            }
            else
            {
                echo "Preencha todos os dados";
            }
}
    
?>

          <form action="" method="post">
              <fieldset>
                  <legend><b>Editar Cooperativa</b></legend>
                  <br>
                  <!-- <input type="hidden" name="idartesao" 
                  <?php// echo $ress['idartesao'];?>>-->
                  <div class="inputBox">
                      <input type="text" name="nome_empresa" id="nome_empresa" class="inputUser" 
                      value="<?php echo $ress['nome_empresa']; ?>"
                      >
                      <label for="nome_empresa" class="labelInput">Nome da Empresa</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="text" name="nome_fantasia" id="nome_fantasia" class="inputUser" 
                      value="<?php echo $ress['nome_fantasia']; ?>"
                      >
                      <label for="nome_fantasia" class="labelInput">Nome Fantasia</label>
                  </div>
                  <br><br>
                  
                  <div class="inputBox">
                      <input type="text" name="cnpj" id="cnpj" class="inputUser" 
                      value="<?php echo $ress['cnpj']; ?>"
                      >
                      <label for="cnpj" class="labelInput">CNPJ</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="text" name="natureza" id="natureza" class="inputUser"  
                      value="<?php echo $ress['natureza']; ?>"
                      >
                      <label for="natureza" class="labelInput">Natureza</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="tel" name="telefone_coop" id="telefone_coop" class="inputUser" 
                      value="<?php echo $ress['telefone_coop']; ?>"
                      >
                      <label for="telefone_coop" class="labelInput">Telefone</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="text" name="endereco_coop" id="endereco_coop" class="inputUser" 
                      value="<?php echo $ress['endereco_coop']; ?>"
                      >
                      <label for="endereco_coop" class="labelInput">Endereço</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="email" name="email_coop" id="email_coop" class="inputUser" 
                      value="<?php echo $ress['email_coop']; ?>"
                      >
                      <label for="email_coop" class="labelInput">Email</label>
                  </div>
                  <br>
                  
                  <div class="btn_alinhamento">
                  <input type="submit" name="submit" id="submit" 
                  value="<?php echo "Editar dados"; ?>">
                  
              </div>
              <br>
              </fieldset>
             
          </form>
      </div> 
      
      <!--FIM 1ª DOBRA-->

  </main>
  <!--<br><a href="index.html" class="btn">Tela Inicial</a><br>-->
  
  <!--FIM DOBRA PALCO PRINCIPAL-->

</body>


</html>