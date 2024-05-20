<?php
require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
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
            $('#cpf').mask('000.000.000-00');
        });
        $(document).ready(function() {
            $('#telefone_artesao').mask('(00)00000-0000');
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
                   <a href="lista.php" class="btn">Retornar</a>
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
if(isset($_GET['id_up'])) //verifica se a pessoa apertou no botao "editar" da lista.php
{
    $id_update = addslashes($_GET['id_up']);
    $ress = $a->buscarDadosArtesao($id_update);
}

if(isset($_POST['submit']))
{
            $id_upd = addslashes($_GET['id_up']);

            $cpf = addslashes($_POST['cpf']);
            $confCpf = addslashes($_POST['confCpf']);

            $email_artesao = addslashes($_POST['email_artesao']);
            $confEmail_artesao = addslashes($_POST['confEmail_artesao']);
            
            $senha = addslashes($_POST['senha']);
            $confSenha = addslashes($_POST['confSenha']);

            $telefone_artesao = addslashes($_POST['telefone_artesao']);
            $confTelefone_artesao = addslashes($_POST['confTelefone_artesao']);

            if(!empty($cpf) && !empty($confCpf) && !empty($email_artesao) && !empty($confEmail_artesao) && !empty($senha)
            && !empty($confSenha) && !empty($telefone_artesao) && !empty($confTelefone_artesao))
            {
                if($email_artesao == $confEmail_artesao){
                    if($cpf == $confCpf){
                        if($telefone_artesao == $confTelefone_artesao){
                            if($senha == $confSenha){
                                //editar senha
                                $a->atualizarSenha($id_upd, $cpf, $email_artesao, $senha, $telefone_artesao);
                                // echo "deu certo";
                                header("Location: logout2.php");
                                exit();
                            }else{ echo "Senhas não conferem";}
                        }else{ echo "Telefone incorreto";}
                    }else{ echo "CPF incorreto";}
                }else{ echo "Email incorreto";}
            } else{ echo "Preencha todos os dados";}
}
    
?>

          <form action="" method="post">
              <fieldset>
                  <legend><b>Editar Artesão</b></legend>
                  <br>
                  <samp>Olá, <?php echo $ress['nome_artesao']; ?>!</samp>
                  <br>
                        <input type="hidden" name="confCpf" id="confCpf" value="<?php echo $ress['cpf']; ?>" require>
                        <input type="hidden" name="confEmail_artesao" id="confEmail_artesao" value="<?php echo $ress['email_artesao']; ?>" require>
                        <input type="hidden" name="confTelefone_artesao" id="confTelefone_artesao" value="<?php echo $ress['telefone_artesao']; ?>" require>
                        <br><br>

                  <div class="inputBox">
                      <input type="text" name="cpf" id="cpf" class="inputUser" require>
                      <label for="cpf" class="labelInput">CPF</label>
                  </div>
                  <br><br>
                  
                  <div class="inputBox">
                      <input type="email" name="email_artesao" id="email_artesao" class="inputUser" require>
                      <label for="email_artesao" class="labelInput">Email</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="tel" name="telefone_artesao" id="telefone_artesao" class="inputUser" require>
                      <label for="telefone_artesao" class="labelInput">Telefone</label>
                  </div>
                  <br><br>

<!-- -------------------------------------------------------------SENHA------------------------------------------------------------------- -->

                  <div class="inputBox">
                      <input type="password" name="senha" id="senha" class="inputUser" require>
                      <label for="senha" class="labelInput">Nova Senha</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="password" name="confSenha" id="confSenha" class="inputUser" require>
                      <label for="confSenha" class="labelInput">Confirmar Nova Senha</label>
                  </div>
                  <br><br>

<!-- -----------------------------------------------------------FIM-SENHA----------------------------------------------------------------- -->

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