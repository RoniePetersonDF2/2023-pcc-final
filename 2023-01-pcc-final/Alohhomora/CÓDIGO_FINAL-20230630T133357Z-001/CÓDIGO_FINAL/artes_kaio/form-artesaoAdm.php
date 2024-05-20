<?php
require_once 'classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");
require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");

session_start();
$email = $_SESSION['email'];

// Verificar se a sessão está ativa e se o perfil é "adm"
if (isset($email) && $_SESSION['perfil'] === 'adm') {
//    echo "teste de permissao, apenas adm tem que ver isso";
    
} else {
    // echo "Você não tem permissão para acessar esta página.";
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
    <script type="text/javascript" src="js/modal.js"></script>
    <!-- biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- biblioteca jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link href="css/modal.css" rel="stylesheet">
    <title>Cadastro Artesão</title>

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
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <samp class="icon-blog">Cadastrar Artesão</samp>
                   </div>
                   <a href="listacoopAdm.php" class="btn">Retornar</a>
        </div>
    </header>

    <style>

.btnform{
    
    /*botão tela inicial*/
    background-color: #fd4a4a;
    border: none;
    color: #ffffff;
    top: 1000px;
    padding:  0 0;
    align-items: center; 
    opacity: 1;
    border-radius: 2px;
}

.btnform:hover{
    /*botão tela inicial*/
    
    background-color: #fd4a4a;
    color: #ffffff;
    cursor: pointer;
    opacity: 0.9; 
}


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

//joga os dados coletados na tabela coop
if(isset($_GET['id_upcoop'])) //verifica se a pessoa apertou no botao "associe-se" da listacop.php
{
    $id_update = addslashes($_GET['id_upcoop']);
    $ress = $c->buscarDadosCooperativa2($id_update);
}
 

if(isset($_POST['submit']))
{
    $nome_artesao = addslashes($_POST['nome_artesao']);
    $cpf = addslashes($_POST['cpf']);
    //$tipo_arte = addslashes($_POST['tipo_arte']);
    $email_artesao = addslashes($_POST['email_artesao']);
    $senha = addslashes($_POST['senha']);
    $confsenha = addslashes($_POST['confsenha']);
    $telefone_artesao = addslashes($_POST['telefone_artesao']);
    $endereco_artesao = addslashes($_POST['endereco_artesao']);
    $perfil = addslashes($_POST['perfil']);
    $idcoop = addslashes($_POST['idcoop']);
    $nome_coop = addslashes($_POST['nome_coop']);


    if(!empty($nome_artesao) && !empty($cpf) && !empty($email_artesao) && !empty($senha)  && !empty($confsenha)
    && !empty($telefone_artesao) && !empty($endereco_artesao) && !empty($perfil) && !empty($idcoop) && !empty($nome_coop)){
        //cadastrar
      if($senha == $confsenha)
      {
            if(!$a->cadastrarArtesaoAdm($nome_artesao,$cpf,$email_artesao,$senha,$telefone_artesao,$endereco_artesao,$perfil,$idcoop,$nome_coop))
            {
                
                echo "Existe um cadastro com esse endereço de EMAIL!";
                ?> <a href="listacoopAdm.php"  class="btnform"><br> CLIQUE AQUI para preencher novamente o formulario</a><br><br><?php  
            }
            else
            {
                header("location: listaAdm.php");
        }
      }
      else
      {
        echo "senhas não correspondem";
      }
    }
}

?>

            <form action="form-artesaoAdm.php" method="post">
                <fieldset>
                    <legend><b>Cadastro Artesão</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome_artesao" id="nome_artesao" class="inputUser" required>
                        <label for="nome_artesao" class="labelInput">Nome completo</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="cpf" id="cpf" class="inputUser" maxlength="14" required>
                        <label for="cpf" class="labelInput">CPF</label>
                    </div>
                    <br><br>
                    
                    <div class="inputBox">
                        <input type="email" name="email_artesao" id="email_artesao" class="inputUser" required>
                        <label for="email_artesao" class="labelInput">Email</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser" maxlength="10" required>
                        <label for="senha" class="labelInput">Senha</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="confsenha" id="confsenha" class="inputUser" maxlength="10" required>
                        <label for="confsenha" class="labelInput">Confirmar senha</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="tel" name="telefone_artesao" id="telefone_artesao" class="inputUser" maxlength="14"  required>
                        <label for="telefone_artesao" class="labelInput">Telefone</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="endereco_artesao" id="endereco_artesao" class="inputUser" required>
                        <label for="endereco_artesao" class="labelInput">Endereço</label>
                    </div>
                    <br>

                    <p>Usuário:</p>
                    <br>

                    <input type="radio" id="use" name="perfil" value="use" required>
                    <label for="tela">Usuário Comum</label>
                    <br>
                    <input type="radio" id="adm" name="perfil" value="adm" required>
                    <label for="ceramica">Administrador</label>
                    <br>
                    <input type="radio" id="off" name="perfil" value="off" required>
                    <label for="artesanato">DESATIVADO</label>
                    <br><br>

                    <div class="inputBox">
                      <input type="hidden" name="nome_coop" id="nome_coop" class="inputUser" 
                      value="<?php echo $ress['nome_fantasia']; ?>" required
                      >
                      <label for="nome_coop" class="labelInput"><b>Associando-se a: &nbsp; </b><?php echo $ress['nome_fantasia']; ?></label>
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
                    <input type="submit" name="submit" id="submit">
                    
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