<?php
session_start();
require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();
$query = "SELECT * FROM midletech.foruns;";

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



    <title>Fóruns</title>
</head>

<body>
<header class="header_menu">
        <div class="div_menu">
            <a href="../index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
                </img>
            </a>

            <div class="topnav">
                <form action="resultforuns.php" method="get">
                    <input type="text" placeholder="Busca.." name="buscar">
                </form>
            </div>

            <nav class="nav_menu">
                <ul>
                    <li><a href="foruns_form.php">Criar Fórum</a></li>
                    <nav class="nav_menu">
                    <li><a href="index.php">Voltar</a></li>
                </ul>

            </nav>
        </div>
    </header>

    <?php
if(isset($_GET['error']) || isset($_GET['msg']) ) { ?>
            <script>
                Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg');?>',
                title: 'Foruns',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error']: $_GET['msg']); ?>',
                })
            </script>
        <?php } ?>

    <main>
        <div class="main_opc">
            <section class="main_material">
                <div class="main_forum_content">
                    <header class="main_blog_header">
                        <h1 class="icon-blog">FÓRUNS</h1>
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


                </div>
            </section>
        </div>
    </main>
</body>