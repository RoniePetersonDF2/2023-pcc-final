<?php
require_once 'arte/classe-arte.php';
$ar = new Arte("arte", "localhost", "root", "");
require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-chat.php';
$cp = new Chat("arte", "localhost", "root", "");
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
    <link href="css/fonticon.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/lista.css" rel="stylesheet">

   <script type="text/javascript" src="js/modal.js"></script>
   
   <link href="css/modal.css" rel="stylesheet">
    <title>ARTES E ARTISTAS</title>
</head>

<style>
.topo {
  background-color: none;
  border: none;
  color: black;
  text-decoration: none;
}

.topo:hover {
  text-decoration: underline;
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


.main_blog article:hover{
     opacity:0.7;
}

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

/* ------------------------------------------------------------- */

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline-block;
}

nav ul li a {
    display: block;
    padding: 10px;
    text-decoration: none;
}

.dropdown{
    color: #d1d1d1;
    background-color: #2d3142;
    border-radius: 5px;
}
.dropdown:hover{
    background-color: #4f5d75;
    color: #eeeeee;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>

<body>
    
    <!--DOBRA CABEÇALHO-->

    <header class="main_header" id=topo>
        <div class="main_header_content">
            
            <a href="#" class="logo">
                <img src="img/artes_artistas01-.png" alt="Bem vindo ao projeto prático Html5 e Css3 Essentials"
                    title="Bem vindo ao projeto prático Html5 e Css3 Essentials"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><div class="listagem_info">
                        <!-- Artes e Artistas -->
                    </div></li>
                    <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -->
                    <!-- <li><a href="">Home</a></li> -->
                    <li><a href="sobre.php">Sobre</a></li>
                    <!--<li><a href="">Blog</a></li>
                    <li><a href="#escola">Escola</a></li>
                    <li><a href="#contato">Contato</a></li>-->
                    <li><a href="listacoop.php">Cooperativas</a></li>
                    <li><a href="form-cooperativa.php">Cadastrar cooperativa</a></li>
                    <li><a href="listacoop.php">Cadastre sua arte aqui</a></li>
                    <li><a href="login.php">Login</a></li>
                    <!-- class="modal-link" -->
                    
                </ul>
            </nav>
        </div>
    </header>

    <!--FIM DOBRA CABEÇALHO-->

    <!--DOBRA PALCO PRINCIPAL-->

    <!--1ª DOBRA-->
    <main>
        <div class="main_cta">
            <article class="main_cta_content">
                <div class="main_cta_content_spacer">
                    <header>
                        <h1>Aqui você tem um espaço para exposição<br> de artes manuais </h1>
                    </header>
                    <p>Facilitamos a ligação entre artistas e admiradores</p>
                    <p><a href="#assinatura" class="btn">Saiba Mais</a></p>
                </div>
            </article>
        </div>
        <!--FIM 1ª DOBRA-->

        <!--INICIO SESSÃO SESSÃO DE ARTIGOS-->
        <?php
if(isset($_GET['artesCoop'])) //verifica se a pessoa apertou no botao "editar" da listaAdm.php
{
    $idcoop = addslashes($_GET['artesCoop']);
    $artesCoop = $ar->buscarArtesCoop($idcoop);
}
        ?>

<section class="main_blog">
    <header class="main_blog_header">
        <h1>Últimas Postagens</h1>
        <p>Você pode apertar nas imagens para ver mais postagens do mesmo artesão.</p>
        <br>
        <nav>
            <ul>
                <li class="dropdown">
                    <a class="dropbtn">Listar por cooperativas</a>
                    <div class="dropdown-content">
                        <a href="index.php">Todas as artes</a>
                        <?php $coops = $cp->buscarCoops(); // Buscar todas as cooperativas
                        foreach ($coops as $coop) : ?>
                        <a href="index.php?artesCoop=<?php echo $coop['idcoop']; ?>"><?php echo $coop['nome_fantasia']; ?></a>
                        <?php endforeach; ?>
                        
                        <!-- Adicione mais links de cooperativas aqui -->
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <?php
    if(isset($_GET['artesCoop']))
    {
        $ar->buscarArtesCoop($idcoop);
        if (count($artesCoop) > 0) {
            $artesCoop = array_reverse($artesCoop); // Inverte a ordem do array
            foreach ($artesCoop as $arte) {
                echo "<article>";
                $caminhoImagem = 'arte/arteaqui/' . basename($arte['nome_arte']);
                if (file_exists($caminhoImagem)) {
                    echo "<a href=\"arte/perfil.php?idartesao=" . $arte['idartesao'] . "\">";
                    echo "<img src=\"" . $caminhoImagem . "\" width=\"200\" alt=\"Imagem post\" title=\"Imagem Post\">";
                    echo "</a>";
                } else {
                    echo "<p>Sem arte</p>";
                }
                echo "<p><a href=\"arte/perfil.php?idartesao=" . $arte['idartesao'] . "\" class=\"category\"><b>" . $arte['nome_img'] . "</b></a></p>";
                echo "<h2><a href=\"arte/perfil.php?idartesao=" . $arte['idartesao'] . "\" class=\"title\">" . $arte['descricao_arte'] . "</a></h2>";
                
                // Buscar dados do artesão
                $id_artesao = $arte['idartesao'];
                $ress = $a->buscarDadosArtesao($id_artesao);
                if ($ress) {
                    echo "<p class=\"avisos\"><i>Telefone do Artesão: " . $ress['telefone_artesao'] . "</i></p>";
                } else {
                    echo "<p class=\"avisos\">Telefone do Artesão não disponível</p>";
                }
                echo "<p class=\"avisos\"><i>Clique na arte para ver mais deste artista - <b>" . $ress['nome_artesao'] . "</b></i></a></p>";
                echo "</article>";
            }
        } else {
            echo "<p>Não há artigos disponíveis.<br><br></p>";
        }
    }else{
        $artes = $ar->buscarArtes();
        if (count($artes) > 0) {
            $artes = array_reverse($artes); // Inverte a ordem do array
            foreach ($artes as $arte) {
                echo "<article>";
                $caminhoImagem = 'arte/arteaqui/' . basename($arte['nome_arte']);
                if (file_exists($caminhoImagem)) {
                    echo "<a href=\"arte/perfil.php?idartesao=" . $arte['idartesao'] . "\">";
                    echo "<img src=\"" . $caminhoImagem . "\" width=\"200\" alt=\"Imagem post\" title=\"Imagem Post\">";
                    echo "</a>";
                } else {
                    echo "<p>Sem arte</p>";
                }
                echo "<p><a href=\"arte/perfil.php?idartesao=" . $arte['idartesao'] . "\" class=\"category\"><b>" . $arte['nome_img'] . "</b></a></p>";
                echo "<h2><a href=\"arte/perfil.php?idartesao=" . $arte['idartesao'] . "\" class=\"title\">" . $arte['descricao_arte'] . "</a></h2>";
                
                // Buscar dados do artesão
                $id_artesao = $arte['idartesao'];
                $ress = $a->buscarDadosArtesao($id_artesao);
                if ($ress) {
                    echo "<p class=\"avisos\"><i>Telefone do Artesão: " . $ress['telefone_artesao'] . "</i></p>";
                } else {
                    echo "<p class=\"avisos\">Telefone do Artesão não disponível</p>";
                }
                echo "<p class=\"avisos\"><i>Clique na arte para ver mais deste artista - <b>" . $ress['nome_artesao'] . "</b></i></a></p>";
                echo "</article>";
            }
        } else {
            echo "<p>Não há artigos disponíveis.<br><br></p>";
        }  
    }
    ?>

</section>



    
    </main>
    

    <footer class="main_footer_rights">
        
                    <p><a href="#topo" class="topo">Voltar ao topo da página</a></p>
               
    </footer>

    <section class="main_footer">
        <header>
            <h1>Quer saber mais?</h1>
        </header>
        <article class="main_footer_our_pages">
            <header>
                <h2>Nossas Páginas</h2>
            </header>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Instagram</a></li>
                <!-- <li><a href="#">A Escola</a></li> -->
                <li><a href="#">Contato</a></li>
                <li><a href="sobre.php">Sobra</a></li>
            </ul>
        </article>

        <article class="main_footer_links">
            <header>
                <h2>Links Úteis</h2>
            </header>
            <ul>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Aviso Legal</a></li>
                <li><a href="#">Termos de Uso</a></li>
            </ul>
        </article>

        <article class="main_footer_about">
            <header id=assinatura> 
                <h2>Sobre a assinatura</h2>
            </header>
            <p>
Acreditamos que nossa assinatura no site pode impulsionar seus negócios, aumentar vendas e atrair mais clientes. Com uma taxas a partir R$9,90, você terá acesso aos nossos recursos de divulgação eficazes. Nossa plataforma possui um público diversificado e interessado, o que significa exposição direcionada para sua empresa. Aproveite essa oportunidade única e invista em seu sucesso comercial. Clique no link abaixo para se inscrever agora mesmo.
<br><br>
<a href="listacoop.php">CLIQUE AQUI</a> para cadastrar sua arte, e inovar sua forma de lucrar.
<br><br>
Estamos disponíveis para esclarecer dúvidas e fornecer mais informações. Esperamos tê-lo(a) como nosso assinante em breve.
            </p>
        </article>
    </section>
    <footer class="main_footer_rights">
        <p>Artes & Artistas - Todos os direitos reservados.</p>
    </footer>
    <!--FIM DOBRA RODAPE-->
</body>

<script> //SCRIPT DO PROFESSOR ALESSANDRO

    // Seleciona o link e a janela modal
    var link = document.querySelector('.modal-link');
    var modal = document.querySelector('.modal');
    var overlay = document.querySelector('.overlay');

    // Adiciona um listener de evento para o link
    link.addEventListener('click', function (event) {
        event.preventDefault(); // previne o comportamento padrão do link (navegar para outra página)

        overlay.style.display = 'block'; // exibe a camada escura
        modal.style.display = 'block'; // exibe a janela modal
    });

    // Adiciona um listener de evento para a camada escura
    overlay.addEventListener('click', function () {
        overlay.style.display = 'none'; // oculta a camada escura
        modal.style.display = 'none'; // oculta a janela modal
    });
    
</script>

</html>