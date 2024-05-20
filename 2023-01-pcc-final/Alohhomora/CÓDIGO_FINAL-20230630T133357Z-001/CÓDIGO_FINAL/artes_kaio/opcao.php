<?php
session_start();

if (!isset($_SESSION['perfil']) || ($_SESSION['perfil'] !== 'use' && $_SESSION['perfil'] !== 'off')) {
    header("Location: logout2.php");
    exit();
   
}

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'use'){
    echo '<div id="mensagem"> Assinatura expirada </div>';
}



$email = $_SESSION['email'];

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
    <link href="css/fonticon.css" rel="stylesheet">
    <script type="text/javascript" src="js/modal.js"></script>
    <link href="css/modal.css" rel="stylesheet">
    <title>Artes e Artistas</title>
</head>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
            <a href="logout.php" class="logo">
                <img src="img/artes_artistas01-.png" alt="Bem vindo ao projeto prático Html5 e Css3 Essentials"
                    title="Bem vindo ao projeto prático Html5 e Css3 Essentials"></a>

                    <nav class="main_header_content_menu">
                        <ul>
                            <li><a href="chatCoop.php">Chat Cooperativa</a></li>
                            <li><a href="logout.php">Página Inicial</a></li>
                                                       
                        </ul>
                    </nav>
        </div>
    </header>
 
    <style>
        .imagem {
            width: 100%;/* Define a altura para ocupar a tela inteira */
            border-radius: 25px;
        }
        .main_course_content article{
            max-width: 350px; /* Defina o tamanho máximo desejado em pixels */
            margin: 0 auto;
            background-color: white;
        }
        img:hover{
            /* width: 300px; */
            opacity: 0.8;
        }
        .main_cta {
            width: 100%;
            background-image: url('../IMG/bg_main_home.png');
            background-color: #2d3142;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }
        .main_header_content_menu ul li a{
            color:#eeeeee ;
        }

        div#mensagem {
            background-color: #63718a;
            background-image: linear-gradient(to right, red, #080e1f);
            color: #eeeeee;
            font-size: 1.5em;
            top: 100px;
            padding: 5px 98px;
        }

    </style>

    <main>
        <div class="main_opc">

            <section class="main_course" id="escola">
                <header class="main_course_header">

                </header>
                <div class="main_course_content">
                    <article>
                        <!-- <h2 align="center">Cadastrar arte</h2> -->
                        <header>
                            
                            <p align="center">
                                <a href="arte/form-arte.php"><img src="img/cadastrarar.png" class="imagem"></a></p>
                               
                        </header>
                    </article>
                    <article>
                        <!-- <h2 align="center">Alterar dados</h2> -->
                        <header>
                            
                            <p align="center"><a href="lista.php"><img src="img/editarar.png" class="imagem"></a></p>
                            
                        </header>
                    </article>

                </div>
                </article>
            </section>
            </div>

    </main>
    <!--FIM DOBRA PALCO PRINCIPAL-->

</body>


</html>