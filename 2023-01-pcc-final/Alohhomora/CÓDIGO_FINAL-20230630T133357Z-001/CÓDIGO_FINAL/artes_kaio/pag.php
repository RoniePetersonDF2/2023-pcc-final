<?php
require_once 'classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");
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
    <script type="text/javascript" src="js/modal.js"></script>
    <link href="css/modal.css" rel="stylesheet">
    <title>Pagamento</title>

</head>
<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
                    <div class="listagem_info">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <samp class="icon-blog">Assinatura</samp>
                   </div>
                   <!-- <a href="" class="btn">Login</a> -->
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
//joga o cpf no termo
if(isset($_GET['id_pg']))//verifica se a pessoa preencheu o form
{
    $printcpf = addslashes($_GET['id_pg']);
    $ress = $printcpf;
}


?>


<form action="" method="post">
    <fieldset>
        <legend><b>Pagamento via PIX - Termo de consentimento</b></legend>
            <br>
            <p>
            Prezado(a) cliente portador(a) do CPF: <?php echo $ress; ?>,
            <br><br>
            Agradecemos por ser um(a) assinante de nossos serviços. Gostaríamos de lembrar que, de acordo com nossas políticas, o pagamento da sua assinatura é necessário para manter a continuidade do serviço prestado.
            <br><br>
            A confiança é a base do nosso negócio e prezamos por uma relação transparente e justa com nossos clientes. Para realizar o pagamento da sua assinatura, solicitamos que seja feito via PIX.
            <br><br>
            Após sinalizar sua concordância com este termo, exibiremos os detalhes da conta para que você possa efetuar o pagamento. 
            <br><br>
            Caso não recebamos o pagamento, seremos obrigados a suspender temporariamente sua assinatura em até dois dias úteis. Para facilitar a verificação, pedimos que nos informe o nome completo do titular da conta utilizada para fazer o pagamento.
            <br><br>
            Agradecemos pela compreensão e estamos à disposição para esclarecer quaisquer dúvidas adicionais através do telefone (61)98200-0009 ou do email arteseartistas@gmail.com
            <br><br>
            Atenciosamente,
            <br>
            Artes e Artistas
            <br><br>
            <span>O preço da assinatura mensal é de R$9,90.</span>
            <br>
            <span>O preço da assinatura semestral é de R$39,90.</span>
            <br><br><br>
            </p>
                <div class="btn_alinhamento">
                    <nav class="btns2">
                        <ul>
                        <a href="PIX.php?fk_pgarte=<?php echo $ress?>">CONCORDO</a>
                        </ul>
                        <br>
                    </nav>
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