<?php
require_once 'classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");
require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-pagamento.php';
$p = new Pagamento("arte", "localhost", "root", "");
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
    <link href="css/modal.css" rel="stylesheet">
    <title>Pagamento</title>

    <script type="text/javascript">

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }


        function exibirProcessando() {
            scrollToTop();
            document.getElementById("mensagem").innerHTML = "Processando pagamento...";
        }

        function exibirAprovado() {
            scrollToTop();
            document.getElementById("mensagem").innerHTML = "Pagamento realizado com sucesso! Aguarde.";
            document.getElementById("botaoVoltar").style.display = "block";
        }

    </script>

</head>
<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
                    <div class="listagem_info">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <samp class="icon-blog">Assinatura</samp>
                   </div>
                   <!-- <a href="" class="btn">Login</a> -->
                   <a href="index.php" class="btn" id="botaovoltar">Página Inicial</a>
        </div>
    </header>

    <style>

    div#mensagem{
    background-color: #63718a;
    background-image: linear-gradient(to right, red ,#63718a);
    color:#eeeeee;
    font-size: 3em;
    }

        .box{
            margin: 10% auto;
            color: whitesmoke;
            position: absolute;
            top: 1100px;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #2d3142;
           /* background-image: linear-gradient(to right, #2f4f4f, #205c40, #1f3a3a);*/
            border-radius: 15px;
            padding: 15px;
            width: 50%;
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

<!-- mensagem se deu certo -->
<div id="mensagem"></div>   
      
<article>                    
<header>

<p align="center"><img src="img/pix2.jpg" width="700"></p>

</article>                    
</header>
 <main>

<?php

if(isset($_GET['fk_pgarte']))//verifica se a pessoa apertou no botao "editar" da lista.php
{
    $id_update = addslashes($_GET['fk_pgarte']);
    $ress = $a->buscarDadosArtesao2($id_update);
}

if(isset($_POST['submit']))
{
    $nome_pgto = addslashes($_POST['nome_pgto']);
    $data_pgto = addslashes($_POST['data_pgto']);
    $pacote = addslashes($_POST['pacote']);
    $idartesao = addslashes($_POST['idartesao']);
    $idcoop = addslashes($_POST['idcoop']);
    $perfil = addslashes($_POST['perfil']);

    $p->atualizarUser($idartesao, $perfil);//ativa o usuario
    
    if(!empty($nome_pgto) && !empty($data_pgto) && !empty($pacote) && !empty($idartesao) && !empty($idcoop)){
        //cadastrar
        if(!$p->cadastrarPagamento($nome_pgto,$data_pgto,$pacote,$idartesao,$idcoop))
        {
            
            
          
            // // header("location: index.php?");(atraso na resposta de confirmação)
            // echo "Cadastro efetuado com sucesso, retorne à TELA INICIAL para realizar LOGIN!";
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Processamento do pagamento aqui
                sleep(2); // Atrasa o processamento por 2 segundos
        
                // Exibe a mensagem de pagamento aprovado
                echo '<script>exibirAprovado();</script>';
                }

                // Verifica se a variável de status está definida na URL
                if (isset($_GET['status'])) {
                $status = $_GET['status'];
    
                    // Exibe a mensagem apropriada com base no status do pagamento
                    if ($status === 'aprovado') {
                        echo '<script>exibirAprovado();</script>';
                    }
                
                }
                ?>
                <script>
                    setTimeout(function() 
                    {
                        window.location.href = "index.php";
                    }, 3000); //atraso de 3s para ir ao index
                </script>
                <?php
        }
        else
        {

            echo "Erro com seu cadastro!"; ?> <br> <?php 
            echo "Caso você tenha pago,";  ?> <br> <?php 
            echo "desconsidere e retorne ao menu inicial";
            ?> <a href="index.php"  class="btnform"><br> CLIQUE AQUI</a><br><br><?php

        }
    }
}

 
           
            // Verifica se a variável de status está definida na URL
            if (isset($_GET['status'])) {
            $status = $_GET['status'];

                // Exibe a mensagem do pagamento
                if ($status === 'aprovado') {
                    echo '<script>exibirAprovado();</script>';
                }
            
            }

?>

<div class="box">
<form action="" method="post">
    <fieldset>
        <legend><b>Pagamento via PIX</b></legend>
                    <br>
                    <br>
<label>
<strong>Sua assinatura pode ser paga por meio da Chave Aleatória:</strong><br> 5a8fac89-4306-470f-a703-36f373022f07
<br><br>
<strong>Pelo PIX Copia e Cola:</strong><br> 00020101021126580014br.gov.bcb.pix01365a8fac89-4306-470f-a703-36f373022f075204000053039865802BR5919KAIO G A DOS SANTOS6008BRASILIA62070503***6304C576
<br><br>
<strong>Ou escaneie o QR code acima para efetuar o pagamento.</strong>
<br><br>
<br><br>
</label>

                    <div class="inputBox">
                        <input type="text" name="nome_pgto" id="nome_pgto" class="inputUser" required>
                        <label for="nome_pgto" class="labelInput">Nome completo do titular da conta</label>
                    </div>
                    <br>

                    <label for="data_pgto"><b>Data do pagamento:</b></label>
                    <input type="date" name="data_pgto" id="data_nascimento" required>
                    <br><br>

                    <p>Planos:</p>
                    <br>

                    <input type="radio" id="MEN" name="pacote" value="MEN" onchange="calcularDataExpiracao()" required>
                    <label for="MEN">Mensal - R$9,90</label>
                    <br>
                    <input type="radio" id="SEM" name="pacote" value="SEM" onchange="calcularDataExpiracao()" required>
                    <label for="SEM">Semestral - R$39,90</label>
                    <br>
                    
                    <input type="hidden" name="data_expiracao" id="data_expiracao" value="" required>
                    <br>

                    <div class="inputBox">
                      <input type="hidden" name="idartesao" id="idartesao" class="inputUser" 
                      value="<?php echo $ress['idartesao']; ?>" required
                      >
                      <label for="idartesao" class="labelInput"><b>Número de identifição do Artesão: &nbsp; </b><?php echo $ress['idartesao']; ?></label>
                    </div>
                    <br>
                  
                    <div class="inputBox">
                        <input type="hidden" name="idcoop" id="idcoop" class="inputUser" 
                        value="<?php echo $ress['idcoop']; ?>" required
                        >
                        <label for="idcoop" class="labelInput"><b>Número de identifição da cooperativa: &nbsp; </b><?php echo $ress['idcoop']; ?></label>
                    </div>

                    <div class="inputBox">
                        <input type="hidden" name="perfil" id="perfil" class="inputUser" 
                        value="use" required
                        >
                        <label for="idcoop" class="labelInput">user</label>
                    </div>
                    <?php $idarteao = $ress['idcoop']; ?>
                    <br><br>


                <div class="btn_alinhamento">
                <input type="submit" name="submit" id="submit" value="Confirmar" onclick="exibirProcessando()">
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

