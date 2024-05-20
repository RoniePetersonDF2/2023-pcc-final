<?php
require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-chat.php';
$cp = new Chat("arte", "localhost", "root", "");

session_start();
$email = $_SESSION['email'];

// Verificar se a sessão está ativa e se o perfil é "adm"
if (isset($email) && $_SESSION['perfil'] === 'adm') {
//    echo "teste de permissaO ADM";
    
} else {
    // echo "Você não tem permissão para acessar esta página";
    header("Location: logout2.php");
    exit();
}

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
                   <a href="listaadm.php" class="btn">Retornar</a>
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
if(isset($_GET['id_up'])) //verifica se a pessoa apertou no botao "editar" da listaAdm.php
{
    $id_update = addslashes($_GET['id_up']);
    $ress = $a->buscarDadosArtesao($id_update);
}


if(isset($_POST['submit'])){

    
    //  if(isset($_GET['id_up']) && !empty($_GET['id_up'])) 
    //      {
            $id_upd = addslashes($_GET['id_up']);
            $nome_artesao = addslashes($_POST['nome_artesao']);
            $cpf = addslashes($_POST['cpf']);
            $email_artesao = addslashes($_POST['email_artesao']);
            $confsenha = addslashes($_POST['confsenha']);
            $senhaantiga = addslashes($_POST['senhaantiga']);
            $senha = addslashes($_POST['senha']);
            $confsenhaNova = addslashes($_POST['confsenhaNova']);
            $telefone_artesao = addslashes($_POST['telefone_artesao']);
            $endereco_artesao = addslashes($_POST['endereco_artesao']);
            $perfil = addslashes($_POST['perfil']);
            $idcoop = addslashes($_POST['idcoop']);
            // $nome_coop = addslashes($_POST['nome_coop']);
            if(!empty($nome_artesao) && !empty($cpf) && !empty($email_artesao) && !empty($telefone_artesao) && !empty($endereco_artesao) && !empty($perfil) && !empty($idcoop)/* && !empty($nome_coop)*/)
            {
                if(trim($senha)== '') {
                     //edita dados se a senha estiver correta
                    $idartesao = $id_upd;
                    $cp->atualizarDadosChat($idartesao, $idcoop, $nome_artesao, $email_artesao);
                    $a->atualizarDadosSemSenhaAdm($id_upd, $nome_artesao, $cpf, $email_artesao, $telefone_artesao, $endereco_artesao, $perfil, $idcoop/*, $nome_coop*/);
                        header("Location: listaAdm.php");
                        
                } else
                // if($senhaantiga == md5($confsenha))
                // {
                    if($senha == $confsenhaNova){
                        //edita dados se a senha estiver correta
                        $idartesao = $id_upd;
                        $cp->atualizarDadosChat($idartesao, $idcoop, $nome_artesao, $email_artesao);
                        $a->atualizarDadosAdm($id_upd, $nome_artesao, $cpf, $email_artesao, $senha, $telefone_artesao, $endereco_artesao,  $perfil, $idcoop/*, $nome_coop*/);
                            header("Location: listaAdm.php");
                    }
                    else
                    {
                        echo "senhas novas não correspondem";
                    }
                // }
                // else
                // {
                //     echo "senha antiga não corresponde";
                // }
            }
            else
            {
                echo "Preencha todos os dados";
            }
    
}
?>

          <form action="" method="post">
              <fieldset>
                  <legend><b>Editar Artesão</b></legend>
                  <br>
                  <!-- <input type="hidden" name="idartesao" 
                  <?php// echo $ress['idartesao'];?>>-->
                  <div class="inputBox">
                      <input type="text" name="nome_artesao" id="nome_artesao" class="inputUser" 
                      value="<?php echo $ress['nome_artesao']; ?>"
                      >
                      <label for="nome_artesao" class="labelInput">Nome completo</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="text" name="cpf" id="cpf" maxlength="14" class="inputUser" 
                      value="<?php echo $ress['cpf']; ?>"
                      >
                      <label for="cpf" class="labelInput">CPF</label>
                  </div>
                  <br><br>
                  
                  <div class="inputBox">
                      <input type="email" name="email_artesao" id="email_artesao" class="inputUser" 
                      value="<?php echo $ress['email_artesao']; ?>"
                      >
                      <label for="email_artesao" class="labelInput">Email</label>
                  </div>
                  <br><br>

<!-- -------------------------------------------------------------SENHA------------------------------------------------------------------- -->

                  <!-- <input type="hidden" name="senhaantiga" id="senhaantiga" class="inputUser"  
                       value="<?php 
                    //    echo $ress['senha']; 
                       ?>" require>
                  
                  <div class="inputBox">
                      <input type="password" name="confsenha" id="confsenha" maxlength="10" class="inputUser">
                      <label for="confsenha" class="labelInput">Confirmar Senha</label>
                  </div>
                  <br><br> -->

                  <div class="inputBox">
                      <input type="password" name="senha" id="senha" maxlength="10" class="inputUser">
                      <label for="senha" class="labelInput">Nova Senha</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="password" name="confsenhaNova" id="confsenhaNova" maxlength="10" class="inputUser">
                      <label for="confsenhaNova" class="labelInput">Confirmar Nova Senha</label>
                  </div>
                  <br><br>

<!-- -----------------------------------------------------------FIM-SENHA----------------------------------------------------------------- -->

                  <div class="inputBox">
                      <input type="tel" name="telefone_artesao" id="telefone_artesao" maxlength="14" class="inputUser" 
                      value="<?php echo $ress['telefone_artesao']; ?>"
                      >
                      <label for="telefone_artesao" class="labelInput">Telefone</label>
                  </div>
                  <br><br>

                  <div class="inputBox">
                      <input type="text" name="endereco_artesao" id="endereco_artesao" class="inputUser" 
                      value="<?php echo $ress['endereco_artesao']; ?>"
                      >
                      <label for="endereco_artesao" class="labelInput">Endereço</label>
                  </div>
                  <br>

                  <p>Usuário:</p>
                    <br>
                    <input type="radio" id="use" name="perfil" value="use" <?php echo ($ress['perfil'] == 'use') ? 'checked' : ''; ?> required>
                    <label for="tela"> <?php  if( $ress['perfil'] == "use"){ ?><span style="color: green;"><?php echo "Esse perfil é um Usuário Comum"; ?></span><?php } else { echo "Tornar Usuário Comum"; } ?></label>
                    <br>
                    <input type="radio" id="adm" name="perfil" value="adm" <?php echo ($ress['perfil'] == 'adm') ? 'checked' : ''; ?> required>
                    <label for="ceramica"> <?php if( $ress['perfil'] == "adm") { ?><span style="color: green;"><?php echo "Esse perfil é um Administrador"; ?></span><?php } else { echo "Tornar Administrador"; } ?></label>
                    <br>
                    <input type="radio" id="off" name="perfil" value="off" <?php echo ($ress['perfil'] == 'off') ? 'checked' : ''; ?> required>
                    <label style="color: red; width: 100%;" for="artesanato"> <?php  if( $ress['perfil'] == "off") { ?><span><?php echo "Esse perfil está DESATIVADO"; ?></span><?php } else { echo "DESATIVAR"; } ?></label>
                    <br><br>

                  <div class="inputBox">
                      <input type="hidden" name="nome" id="nome_coop" class="inputUser" 
                      value="<?php echo $ress['nome_coop']; ?>"
                      >
                      <label for="nome_coop" class="labelInput"> <strong>Associado a: &nbsp; </strong><?php echo $ress['nome_coop']; ?></label>
                  </div>
                  <br>
                  <div class="inputBox">
                        <input type="hidden" name="idcoop" id="idcoop" class="inputUser" 
                        value="<?php echo $ress['idcoop']; ?>" required
                        >
                        <label for="idcoop" class="labelInput"><b>Numero de identifição da cooperativa: &nbsp; </b><?php echo $ress['idcoop']; ?></label>
                    </div>
                    <br><br>
                  
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