<?php
require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();
session_start();
$idusuario = $_SESSION['idusuario'];


$query = ("SELECT noticias.*, instituicoes.nome from midletech.noticias inner join midletech.instituicoes where noticias.idinstituicao = instituicoes.idinstituicoes order by data desc;");
$statement = $dbh->query($query);

$noticias = $statement->rowCount();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/elipse.css">
    <link href="css/fonticon.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style_options2.css">
    <title>Notícias</title>
</head>

<body>


    <header class="header_menu">
        <div class="div_menu">
            <a href="../material/index.php">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="../material/index.php">Voltar</a></li>
                </ul>

            </nav>
        </div>
    </header>

    <?php
    if (isset($_POST['editar']) && !empty($_POST['editar'])) :
    ?>

        <div class="over" id="mod1">
            <div class="mod">
                <div class="div_login">
                    <form action="updateinstituicao.php" method="POST">
                        <div class="main_login_cabeçalho">
                            <h1>Notícia</h1>
                        </div>
                        <div class="main_login_input">
                            <input type="hidden" name="idnoticia" value="<?php echo $_POST['editar']; ?>">
                            <!-- <input type="hidden" name="" value=""> -->
                            <input type="hidden" name="idinstituicao" value="<?php echo $id; ?>">


                            <!-- <input type="hidden" name="idusuario" id="" value="<?php echo $_SESSION['idusuario'] ?>"> -->
                        </div>
                        <input type="text" name="titulo" id="" value="<?= $_POST['titulo']; ?>">
                        <!-- <input type="file" name="imagem" id=""> -->

                        <textarea name="noticia" id="" cols="30" rows="10"><?php echo $_POST['noticia']; ?></textarea>


                        <button type="submit"><b>Editar</b></button>


                    </form>
                    <button onclick="mod1()">voltar</button>
                </div>
            </div>
        </div>
        </div>
    <?php endif;
    if (isset($_POST['excluir']) && !empty($_POST['excluir'])) :
    ?>
        <div class="over" id="mod2">
            <div class="mod">
                <div class="div_login">
                    <form action="deleteinstituicao.php" method="POST">
                        <div class="main_login_cabeçalho">
                            <h1>Deletar</h1>
                        </div>
                        <div class="main_login_input">
                            <h1>Deseja excluir a notícia '
                                <?= $_POST['titulo'] ?>' ?
                            </h1>
                        </div>
                        <input type="hidden" name="idinstituicao" value="<?php echo $id; ?>">

                        <input type="hidden" name="idnoticia" value="<?php echo $_POST['excluir'] ?>">
                        <button type="submit"><b>Excluir</b></button>
                    </form>
                    <button onclick="mod2()">voltar</button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <main>

        <div class="main_opc">
            <section class="main_material">
                <div class="main_forum_content">
                    <div class="alinhamento2">

                        <?php while ($row = $statement->fetch()) : ?>
                            <article >
                                <?php
                                if ($row['idusuario'] == $_SESSION['idusuario'] || $_SESSION['perfil'] == '1') : ?>
                                    <div class="div_a">
                                        <div class='divt'>
                                            <button id='botao' class="botao" onclick="f<?php echo $row['idnoticia'] ?>()">
                                                <div class='space'> &#8942;</div>
                                            </button>
                                            <div class="hide" id="f<?php echo $row['idnoticia'] ?>">


                                                <form action="instituicoesnoticias.php?id=<?= $id ?>" method="post"><button class="B2">&nbsp;Editar</button><input type="hidden" value="<?php echo $row['idnoticia'] ?>" name="editar"><input type="hidden" value="<?php echo $row['titulo'] ?>" name="titulo">
                                                    <input type="hidden" value="<?php echo $row['noticia'] ?>" name="noticia">

                                                </form>
                                                <form action="institucoesnoticias.php?id=<?= $id ?>" method="post"><button class="B2">&nbsp;Excluir</button>
                                                    <input type="hidden" value="<?php echo $row['0'] ?>" name="excluir">
                                                    <input type="hidden" value="<?php echo $row['titulo'] ?>" name="titulo">
                                                </form>

                                                <script>
                                                    function f<?php echo $row['idnoticia'] ?>() {
                                                        var x = document.getElementById("f<?php echo $row['idnoticia'] ?>");
                                                        if (x.style.display === "flex") {
                                                            x.style.display = "none";
                                                        } else {
                                                            x.style.display = "flex";
                                                        }
                                                    }
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>


                                <h1>
                                    <?= $row['nome'] ?>
                                </h1>
                                <p>
                                    <?php echo date('d/m/Y', strtotime($row['data'])) ?>
                                </p>
                                <h1>
                                    <?= $row['titulo'] ?>
                                </h1>
                                <br>
                                <img src="<?php echo $row['imagem'] ?>" alt="imagem" height="300">
                                <p>
                                    <?= $row['noticia'] ?>
                                </p>


                            </article>
                        <?php endwhile ?>
                    </div>
                </div>
            </section>
        </div>
    </main>






</body>
<script>
    function mod1() {
        var x = document.getElementById("mod1");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function mod2() {
        var x = document.getElementById("mod2");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>



</html>