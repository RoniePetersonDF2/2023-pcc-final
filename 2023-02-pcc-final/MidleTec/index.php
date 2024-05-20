<?php
session_start();
require_once "src/database/conexao.php";
$dbh = conexao::getConexao();

if (isset($_SESSION["idusuario"])) {
    header('location:material/index.php');
}

$query2 = "SELECT midletech.avaliacoes.*,
    `usuarios`.idusuario, `usuarios`.nome as username, `usuarios`.imagem, instituicoes.nome as instname, instituicoes.idinstituicoes
        FROM midletech.avaliacoes 
        INNER JOIN midletech.usuarios ON avaliacoes.idusuario = `usuarios`.idusuario inner join midletech.instituicoes 
        on avaliacoes.idinstituicao = instituicoes.idinstituicoes 
       order by `avaliacoes`.data DESC LIMIT 6;";

$stmt = $dbh->query($query2);

$query = ("SELECT noticias.*, instituicoes.nome from midletech.noticias inner join midletech.instituicoes where noticias.idinstituicao = instituicoes.idinstituicoes order by data desc limit 4;");
$statement = $dbh->query($query);

$noticias = $statement->rowCount();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home</title>
</head>

<body>


    <header class="header_menu">
        <div class="div_menu">
            <a href="index.php">
                <img src="assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img"
                    title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="#ancora">Contato</a></li>
                    <li><a href="instituicao/index.php">Escolas</a></li>
                    <li><a href="login/login.php">Login</a></li>
                </ul>

            </nav>
        </div>
    </header>
    <?php
    if (isset($_GET['error']) || isset($_GET['msg'])) { ?>
        <script>
            Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg'); ?>',
                title: 'MidleTech',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error'] : $_GET['msg']); ?>',
            })
        </script>
    <?php } ?>
    <!--INICIO CAPA-->
    <main>

        <body>
            <div class="formato_capa">
                <div class="capa">
                    <div class="box">
                        <div class="box_content">
                            <img src="assets/img/capa.svg" alt="capa" width="750" height="500">
                        </div>
                    </div>

                    <div class="box2">
                        <h1>BEM-VINDO</h1>
                        <p>Em nossa plataforma de aprendizado você encontrará as ferramentas e recursos necessários para
                            expandir seus horizontes e alcançar seus objetivos educacionais.</p>
                        <p><a href="usuario/index.php" class="btn">Cadastrar</a></p>
                    </div>
                </div>
            </div>


            <!--FIM CAPA-->

            <!--INICIO SESSÃO SESSÃO DE ARTIGOS-->
            <section class="main_blog">
                <header class="main_blog_header">
                    <h1 class="icon-blog">Nossas Últimas Notícias</h1>
                    <p>Aqui você encontra as últimas notícias sobre as Escolas Técnicas.</p>
                </header>



                <?php while ($row = $statement->fetch()): ?>
                <article>
        
                    <a href="#">
                        <img src= "<?php echo 'login/' . $row['imagem'] ?>" width="" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h1><?= $row['nome'] ?></h1>
                    <p><a href="" class="category"><?= $row['titulo'] ?></a></p>
     
          
                   <br>
                    <h2><a href="" class="title"><?= $row['noticia'] ?></a></h2>
                </article>
                <?php endwhile ?>

    
            </section>
            <!--FIM SESSÃO SESSÃO DE ARTIGOS-->


            <!-- INICIO SESSÃO DOBRA  CURSOS-->
            <section class="main_course">
                <header class="main_course_header">
                    <img src="assets/img/ofertas.svg" alt="img" title="img">
                    <h1 class="icon-books">O que nossas escolas oferecem?</h1>
                </header>
                <div class="main_course_content">
                    <article>
                        <header>
                            <h2>Novo Ensino Médio</h2>
                            <p>A oferta de EPT foi ampliada para atender estudantes de todas as unidades escolares de
                                Ensino Médio, em todas as Coordenações Regionais de Ensino </p>
                        </header>
                    </article>
                    <article>
                        <header>
                            <h2>Diferentes formas de oferta</h2>
                            <p>As modalidades de oferta incluem a subsequente, a articulada ao Ensino Médio, a integrada
                                e a concomitante</p>
                        </header>
                    </article>
                    <article>
                        <header>
                            <h2>Certificação</h2>
                            <p>Escolas oferecem certificações através de programas de ensino e avaliação, garantindo a
                                qualificação dos estudantes</p>
                        </header>
                    </article>
                    <article>
                        <header>
                            <h2>Presencial e à distância</h2>
                            <p>Os cursos podem ser realizados à distância ou presencialmente, a depender da forma de
                                oferta de cada uma das unidades escolares de Educação Profissional e Tecnológica</p>
                        </header>
                    </article>
                </div>
                <!-- FIM SESSÃO DOBRA  CURSOS-->

                <!--INICIO DOBRA REVIEWS-->
                <div class="main_course_fullwidth">
                    <div class="main_course_ratting_content">
                        <article class="main_course_rating_title">
                            <header>
                                <h2>Avaliações de alunos que já passaram por nossas instituições</h2>
                            </header>
                            <img src="assets/img/avaliações.svg" alt="Estrela" title="Estrela">
                        </article>

                        <section class="main_course_ratting_content_comment">
                            <header>
                                <h2>Veja as avaliações mais recentes</h2>
                            </header>
                            <?php while ($instdata = $stmt->fetch()): ?>
                                <article>
                                    <header>

                                        <h3>
                                            <?php echo $instdata['username'] ?>
                                        </h3>
                                        <?php # $data = date('d/m/y',  strtotime($instdata['data'])) 
                                            ?>
                                        <h6>
                                            <?php echo $instdata['instname'] ?>
                                        </h6>
                                        <p>
                                            <?php echo date('d/m/Y', strtotime($instdata['data'])) ?>
                                        </p>

                                        <?php if ($instdata['avaliacao'] == '1'): ?>
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                        <?php elseif ($instdata['avaliacao'] == '2'): ?>

                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">

                                        <?php elseif ($instdata['avaliacao'] == '3'): ?>

                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                        <?php elseif ($instdata['avaliacao'] == '4'): ?>

                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                        <?php elseif ($instdata['avaliacao'] == '5'): ?>

                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                            <img src="assets/img/star.png" alt="Imagem" title="Imagem">
                                        <?php else: ?>
                                        <?php endif ?>
                                    </header>

                                    <p>
                                        <?php echo $instdata['comentario'] ?>
                                    </p>
                                </article>

                            <?php endwhile ?>

                        </section>
                    </div>
                </div>

                <!--FIM DOBRA REVIEWS-->

                <!-- INICIO DOBRA TUTOR -->
                <section class="main_tutor">
                    <div class="main_tutor_content">
                        <header>
                            <h1>Quer acesso a plataforma mas não é um aluno de nossas unidades?</h1>
                            <p>Faça sua assinatura!</p>
                        </header>
                        <div class="main_tutor_content_img">
                            <img src="assets/img/instrutor.svg" width="200" title="Instrutor" alt="Instrutor">
                        </div>
                        <article class="main_tutor_content_history">
                            <header>
                                <h2>Tenha acesso à biblioteca e fóruns de discussão</h2>
                            </header>
                            <p>Quer levar sua jornada acadêmica para o próximo nível? Com nossa assinatura premium, você
                                terá acesso exclusivo a uma vasta biblioteca de materiais didáticos de alta qualidade e
                                fóruns de discussão acadêmica, criando um ambiente de aprendizado colaborativo e
                                enriquecedor.
                            </p>
                        </article>

                        <section class="main_optin_footer">
                            <div class="main_optin_footer_content">
                                <header>
                                    <h1>Desbloqueie seu potencial acadêmico com nossa assinatura premium hoje!</h1>
                                </header>
                                <article>
                                    <header>
                                        <h2><a href="usuario/assinatura.php" class="btn">Fazer Assinatura</a></h2>
                                    </header>
                                </article>
                            </div>
                        </section>

                    </div>
                </section>
                <!--FIM DOBRA TUTOR-->

                <section class="main_footer" id="ancora">
                    <header>
                        <h1>Quer saber mais?</h1>
                    </header>

                    <article class="main_footer_our_pages">
                        <header>
                            <h2>Nossas Páginas</h2>
                        </header>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">A Escola</a></li>
                            <li><a href="#">Contato</a></li>
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
                        <header>
                            <h2>Sobre o Projeto</h2>
                        </header>
                        <p>Em nossa plataforma de aprendizado você encontrará as ferramentas e recursos necessários para
                            expandir seus horizontes e alcançar seus objetivos educacionais.</p>
                    </article>
                </section>
                <footer class="main_footer_rights">
                    <p>ETC - Todos os direitos reservados.</p>
                </footer>
                <!-- FIM DOBRA RODAPÉ -->
            </section>

    </main>

</body>

</html>