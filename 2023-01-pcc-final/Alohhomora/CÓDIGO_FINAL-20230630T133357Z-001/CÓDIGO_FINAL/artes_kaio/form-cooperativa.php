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
    <title>Cadastro Cooperativa</title>

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
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <samp class="icon-blog">Cadastrar Dados </samp>
                   </div>
                   <a href="listacoop.php" class="btn">Voltar</a>
                   <a href="index.php" class="btn">Página Inicial</a>
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

 
if(isset($_POST['submit']))
{
    $nome_empresa = addslashes($_POST['nome_empresa']);
    $nome_fantasia = addslashes($_POST['nome_fantasia']);
    $cnpj = addslashes($_POST['cnpj']);
    $natureza = addslashes($_POST['natureza']);
    $telefone_coop = addslashes($_POST['telefone_coop']);
    $endereco_coop = addslashes($_POST['endereco_coop']);
    $email_coop = addslashes($_POST['email_coop']);
    if(!empty($nome_empresa) && !empty($nome_empresa)  && !empty($cnpj) && !empty($natureza) 
    && !empty($telefone_coop)  && !empty($telefone_coop)  && !empty($email_coop)){
        //cadastrar
        if(!$c->cadastrarCooperativa($nome_empresa,$nome_fantasia,$cnpj,$natureza,$telefone_coop,$endereco_coop, $email_coop))
        {
            echo "Existe um cadastro com esse endereço de EMAIL!";
    
        }
        else
        {
            header("location: index.php");
            
            //echo "Cadastro efetuado com sucesso, retorne à TELA INICIAL para realizar LOGIN!";
        }
    }
}

?>

            <form action="form-cooperativa.php" method="post">
                <fieldset>
                    <legend><b>Cadastro Cooperativa</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome_empresa" id="nome_empresa" class="inputUser" required>
                        <label for="nome_empresa" class="labelInput">Nome da Empresa</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="nome_fantasia" id="nome_fantasia" class="inputUser" required>
                        <label for="nome_fantasia" class="labelInput">Nome Fantasia</label>
                    </div>
                    <br><br>
                    <!--
                    <p>Tipo de produto:</p>
                    <br>

                    <input type="radio" id="tela" name="tipo_arte" value="tela" required>
                    <label for="tela">Tela</label>
                    <br>
                    <input type="radio" id="ceramica" name="tipo_arte" value="ceramica" required>
                    <label for="ceramica">Cerâmica</label>
                    <br>
                    <input type="radio" id="artesanato" name="tipo_arte" value="artesanato" required>
                    <label for="artesanato">Artesanato</label>
                    <br>
                    <input type="radio" id="outro" name="tipo_arte" value="outro" required>
                    <label for="outro">Outro</label>
                    <br><br>
                    -->
                    <div class="inputBox">
                        <input type="text" name="cnpj" id="cnpj" class="inputUser" maxlength="18"  required>
                        <label for="cnpj" class="labelInput">CNPJ</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="natureza" id="natureza" class="inputUser" required>
                        <label for="natureza" class="labelInput">natureza</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="tel" name="telefone_coop" id="telefone_coop" class="inputUser" maxlength="14"  required>
                        <label for="telefone_coop" class="labelInput">Telefone</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="endereco_coop" id="endereco_coop" class="inputUser" required>
                        <label for="endereco_coop" class="labelInput">Endereço</label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="email" name="email_coop" id="email_coop" class="inputUser" required>
                        <label for="email_coop" class="labelInput">Email</label>
                    </div>
                    <br>
                    
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