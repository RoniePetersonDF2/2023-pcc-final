<?php
session_start();
$idusuario = $_SESSION['idusuario'];
$inst = $_SESSION['instituicao'];
require_once '../src/dao/usuariodao.php';
$dao = new AlunoDAO();
$usuario = $dao->getUsuarios($idusuario);
$dbh = conexao::getConexao();
if (isset($_SESSION["idusuario"])) {
    // print_r($_SESSION);
    if($_SESSION['status']=='0'){
        header("location:../usuario/assinatura.php?msg=Assinatura Expirada");
    }

    // $idAluno = $_SESSION['idusuario'];
    $foto = '../' . $usuario['imagem'];
}
// var_dump($foto)

$query = "SELECT * FROM midletech.foruns order by titulo limit 5;";

$statement = $dbh->query($query);

$foruns = $statement->rowCount();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <link rel="stylesheet" href="../assets/css/style_options.css">
    <script src="../assets/js/menu.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>MidleTech</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['idusuario'])) {
        header('location:../index.php');
    }
    ?>
    <header class="header_menu">
        <div class="div_menu">
            <a href="../index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
                </img>
            </a>

            <nav class="nav_menu">

                <ul>

                    <ul>
                        <?php if (($_SESSION['perfil'] == '3')) : ?>
                            <?php
                            $stmt = $dbh->prepare("SELECT * FROM midletech.instituicoes WHERE docente=?");

                            $stmt->execute([$idusuario]);

                            $verificardocente = $stmt->fetch();
                            if ($verificardocente) {
                                $idinst = $verificardocente['idinstituicoes'];
                                if ($verificardocente) {

                                    echo     '<li> <a href="../instituicao/cadastronoticias.php?id=' . $idinst . '">Postar Notícia</a></li>';
                                    echo     '<li> <a href="../instituicao/noticias.php?id=' . $idinst . '">Ver Notícias</a></li>';
                                    echo     '<li> <a href="../instituicao/instituicaodados.php">Minha Escola</a></li>';
                                }
                            } else {

                                echo     '<li> <a href="../instituicao/cadastroinstituicao.php">Cadastrar Escola</a></li>';
                            }
                            ?>
                        <?php endif ?>
                        <?php if (($_SESSION['perfil'] == '2')) : ?>

                             <li> <a href="../instituicao/noticias.php?id=<?=$inst?>">Ver Notícias</a></li>

                            <?php endif ?>
                        <?php if (($_SESSION['perfil'] == '1' || $_SESSION['perfil'] == '4')) : ?>
                            <li> <a href="../instituicao/instituicoesnoticias.php">Notícias</a></li>
                        <?php endif ?>
                        <li><a href="../instituicao/index.php">Escolas</a></li>

                        <?php if (($_SESSION['perfil'] == '1') || ($_SESSION['perfil'] == '3')) : ?>
                            <li> <a href="../perfil/adm.php">ADMIN</a></li>
                        <?php endif ?>
                        <div class="dropdown" data-dropdown>
                            <button class="link" data-dropdown-button><?php echo $usuario['nome']; ?> <div class="fotoPerfil"><img src="<?php echo $foto; ?> "></div></button>
                            <div class="dropdown_menu">
                                <a href="../perfil/index.php">&nbsp;&nbsp;Perfil</a>
                                <a href="materialusuario.php">&nbsp;&nbsp;Meus Materiais</a>
                                <a href="../perfil/foruns.php">&nbsp;&nbsp;Meus Fóruns</a>
                                <a href="../login/logout.php">&nbsp;&nbsp;Sair</a>
                            </div>
                        </div>
                    </ul>

            </nav>
        </div>
    </header>


    <div class="main_opc">
        <section class="main_material">
            <div class="main_material_content">
                <header class="main_blog_header">
                    <h1 class="icon-blog">MATERIAIS</h1>
                    <p>Encontre e compartilhe materiais com nossa comunidade!</p>
                </header>
                <header class="main_course_header"></header>
                <div class="alinhamento">
                    <article>
                        <h2>Artigos</h2>
                        <header>
                            <p align="center">
                                <a href="artigos.php">
                                    <img src="../assets/img/artigos.svg" alt="Artigos" title="Artigos" width="300" height="300">
                                </a>
                            </p>
                        </header>
                    </article>

                    <article>
                        <h2>Vídeos</h2>
                        <header>
                            <p align="center">
                                <a href="videos.php">
                                    <img src="../assets/img/videos.svg" alt="Vídeos" title="Vídeos" width="300" height="300">
                                </a>
                            </p>
                        </header>
                    </article>
                    <article>
                        <h2>Links</h2>
                        <header>
                            <p align="center">
                                <a href="links.php">
                                    <img src="../assets/img/links.svg" alt="Links" title="Links" width="300" height="300">
                                </a>
                            </p>
                        </header>
                    </article>


                </div>

            </div>
            <div class="main_forum_content">
                <header class="main_blog_header">
                    <h1 class="icon-blog">Encontre Fóruns de Discussão</h1>
                    <p>Aqui você encontra fóruns de discussão de diferentes temas que podem ser do seu interesse.</p>
                </header>

                <?php if ($foruns == "0"): ?>
                        <article>
                        </article>
                    <?php else: ?>
                        <?php while ($row = $statement->fetch()): ?>

                            <?php if ($row['3'] == 'Ciência e Tecnologia Futurista') {
                                $f_imagem = '../assets/img/ciencia.svg';
                            } else if ($row['3'] == 'História e Genealogia') {
                                $f_imagem = '../assets/img/historia.svg';
                            } else if ($row['3'] == 'Desenvolvimento de Jogos') {
                                $f_imagem = '../assets/img/games2.svg';
                            } else if ($row['3'] == 'Desenvolvimento Pessoal') {
                                $f_imagem = '../assets/img/desenvolvimento.svg';
                            } else if ($row['3'] == 'Parentalidade e Família') {
                                $f_imagem = '../assets/img/familia.svg';
                            } else if ($row['3'] == 'Sustentabilidade e Meio Ambiente') {
                                $f_imagem = '../assets/img/sustentabilidade.svg';
                            } else if ($row['3'] == 'Jogos e Entretenimento') {
                                $f_imagem = '../assets/img/games.svg';
                            } else if ($row['3'] == 'Alimentação e Culinária') {
                                $f_imagem = '../assets/img/culinaria.svg';
                            } else if ($row['3'] == 'Política e Ativismo') {
                                $f_imagem = '../assets/img/politica.svg';
                            } else if ($row['3'] == 'Carreiras e Emprego') {
                                $f_imagem = '../assets/img/carreira.svg';
                            } else if ($row['3'] == 'Viagens e Aventura') {
                                $f_imagem = '../assets/img/viagem.svg';
                            } else if ($row['3'] == 'Educação e Aprendizado') {
                                $f_imagem = '../assets/img/aprendizado.svg';
                            } else if ($row['3'] == 'Física e Matemática') {
                                $f_imagem = '../assets/img/fisica.svg';
                            } else if ($row['3'] == 'Arte e Cultura') {
                                $f_imagem = '../assets/img/art.svg';
                            } else if ($row['3'] == 'Saúde e Bem-Estar') {
                                $f_imagem = '../assets/img/saude.svg';
                            } else if ($row['3'] == 'Tecnologia e Gadgets') {
                                $f_imagem = '../assets/img/tecnologia.svg';
                            }




                            ?>



                            <article>

                                <form action="../forum/index.php" method="get">
                                    <input type="hidden" value="<?php echo $row['0'] ?>" name=forumid>
                                    <button value='submit' class="aa">
                                        
                                        <img src="<?php echo $f_imagem; ?>" width="" alt="Imagem post" title="Imagem Post"
                                        width="350" height="200">
                                        
                                        <p class="category">
                                            <?php echo $row['1']; ?>
                                        </p>
                                        <h2 class="title">
                                            <?php echo $row['2']; ?>
                                        </h2>
                                    </button>
                                </form>
                                </article>

                        <?php endwhile; ?>
                    <?php endif; ?>

                <div class="formato_capa">
                    <div class="capa">
                        <div class="box2">
                            <p><a href="foruns.php" class="btn">Mais Fóruns</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </main>
    </script>
    <?php
    if (isset($_GET['error']) || isset($_GET['msg'])) { ?>
        <script>
            Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg'); ?>',
                title: 'material',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error'] : $_GET['msg']); ?>',
            })
        </script>
    <?php } ?>

    <main>
</body>
<?php $dbh = null; ?>