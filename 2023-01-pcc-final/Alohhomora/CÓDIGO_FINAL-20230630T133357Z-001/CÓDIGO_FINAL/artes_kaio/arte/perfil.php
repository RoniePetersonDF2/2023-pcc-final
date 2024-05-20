<?php

require_once '../classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once '../classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");
require_once '../classe-chat.php';
$cp = new Chat("arte", "localhost", "root", "");
require_once 'classe-arte.php';
$ar = new Arte("arte", "localhost", "root", "");


if(isset($_GET['idartesao'])) 
{
    $idartesao = addslashes($_GET['idartesao']);
}
$id_artesao = $idartesao;
$ress = $a->buscarDadosArtesao($id_artesao);

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
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/fonticon.css" rel="stylesheet">
    <link href="../css/lista.css" rel="stylesheet">


    <title>Artes & Artistas</title>
</head>

<style>

.main_blog{
    max-width: calc(1300px - 40px);
    padding:0 20px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;

}

.main_blog_header{
    flex-basis: 100%;
    margin: 30px 0;
}

.main_blog_header h1{
color:#333;
margin-bottom: 5px;
font-size: 1.8em;
}

.category{
    margin: 10px 0;
    font-size: 1.35em;
    color: #2d3142;
}

.main_blog article{
flex-basis: calc(25% - 20px);
margin-bottom: 30px;
opacity: 1;
}

/* .main_blog article:hover{
     opacity:0.7;
} */

.main_blog article h2{
    font-weight: 300;
    color:#333;
    font-size: 1.2em;
}

.main_blog article h2 a{
    color:#333;
}

.avisos{
    font-size: 0.95em;
}


</style>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
        
            <div class="listagem_info">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <samp><?php echo $ress['nome_artesao']; ?></samp>
            </div>
                <a href="../index.php" class="btn">Página Inicial</a>
        </div>
    </header>

    <!--FIM DOBRA CABEÇALHO-->

    <!--DOBRA PALCO PRINCIPAL-->
    

    <!--1ª DOBRA-->
    <main>

        

<section class="main_blog">
    <header class="main_blog_header">
        <h1>Últimas Postagens de <?php echo $ress['nome_artesao']; ?></h1>
        <p style="padding: 5px 0px"><b>Informações de contatos: </b><br>
        <p style="padding: 5px 0px">
            Email:&nbsp; <?php echo $ress['email_artesao']; ?><br>
            Nome:&nbsp; <?php echo $ress['nome_artesao']; ?><br>
            Telefone:&nbsp; <?php echo $ress['telefone_artesao']; ?><br>
            
        </p></p>
    </header>

<?php
    $artes = $ar->buscarArtesArtesao($idartesao);
    if (count($artes) > 0) {
        foreach ($artes as $arte) {
            echo "<article>";
            $caminhoImagem = 'arteaqui/' . basename($arte['nome_arte']);
            if (file_exists($caminhoImagem)) {
                echo "<a>";
                echo "<img src=\"" . $caminhoImagem . "\" width=\"200\" alt=\"Imagem post\" title=\"Imagem Post\">";
                echo "</a>";
            } else {
                echo "<p>Sem arte</p>";
            }
            echo "<p><a href=\"\" class=\"category\"><b>" . $arte['nome_img'] . "</b></a></p>";
            echo "<h2><a href=\"\" class=\"title\">" . $arte['descricao_arte'] . "</a></h2>";
            echo "</article>";
        }
    } else {
        echo "<p>Não há artigos disponíveis.</p>";
    }
    ?>

</section>

                            
                       
               
            <div class="main_optin_footer_content">
                <article>
                    <header>
                        <h2>
                            
                                <a href="../logout.php" class="btn">Página Inicial</a>
                            
                        </h2>
                    </header>
                </article>
            </div>
             




        

        <!--FIM DOBRA PALCO PRINCIPAL-->

        <!--INCIIO DOBRA RODAPE-->
        
        <!--FIM DOBRA RODAPE-->
    </main>
</body>



</html>