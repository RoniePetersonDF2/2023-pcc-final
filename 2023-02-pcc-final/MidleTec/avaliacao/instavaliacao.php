<?php

session_start();
require_once '../src/database/conexao.php';
require_once '../src/dao/perfildao.php';
$dbh = conexao::getConexao();
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];
$idusuario = $_SESSION['idusuario'];
$query2 = "SELECT midletech.avaliacoes.*,
`usuarios`.idusuario, `usuarios`.nome, `usuarios`.imagem
    FROM midletech.avaliacoes 
    INNER JOIN midletech.usuarios ON avaliacoes.idusuario = `usuarios`.idusuario
   WHERE `avaliacoes`.idinstituicao = '$id' and `usuarios`.idusuario != '$idusuario' order by `avaliacoes`.data;";

$stmt = $dbh->query($query2);
$instdata = $stmt->rowCount();

$query3 = "SELECT midletech.avaliacoes.*,
`usuarios`.idusuario, `usuarios`.nome, `usuarios`.imagem
    FROM midletech.avaliacoes 
    INNER JOIN midletech.usuarios ON avaliacoes.idusuario = `usuarios`.idusuario
   WHERE `avaliacoes`.idinstituicao = '$id' and `usuarios`.idusuario = '$idusuario';";

$stmt3 = $dbh->query($query3);
$useravaliacao = $stmt3->rowCount();

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
    <link rel="stylesheet" href="../assets/css/elipse.css">
    <link rel="stylesheet" href="../assets/css/radio.css">
    <script src="../assets/js/menu.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>avaliacoes</title>
</head>

<?php
if (isset($_POST['editar']) && !empty($_POST['editar'])):
    ?>

    <div class="over" id="mod1">
        <div class="mod">
            <div class="div_login">
                <form action="updateavaliacao.php" method="POST">
                    <div class="main_login_cabeçalho">
                        <h1>avaliacao</h1>
                    </div>
                    <div class="main_login_input">
                        <input type="hidden" name="idavaliacao" value="<?php echo $_POST['editar']; ?>">
                        <input type="hidden" name="idinstituicao" value="<?php echo $id; ?>">
                        <div class='star-rating star-5'>

                            <input type="radio" name="rating" value="1" <?php if ($_POST['avaliacao'] == '1'): ?> checked
                                <?php endif ?>><i></i>
                            <input type="radio" name="rating" value="2" <?php if ($_POST['avaliacao'] == '2'): ?> checked
                                <?php endif ?>><i></i>
                            <input type="radio" name="rating" value="3" <?php if ($_POST['avaliacao'] == '3'): ?> checked
                                <?php endif ?>><i></i>
                            <input type="radio" name="rating" value="4" <?php if ($_POST['avaliacao'] == '4'): ?> checked
                                <?php endif ?>><i></i>
                            <input type="radio" name="rating" value="5" <?php if ($_POST['avaliacao'] == '5'): ?> checked
                                <?php endif ?>><i></i>

                            <input type="hidden" name="idusuario" id="" value="<?php echo $_SESSION['idusuario'] ?>">
                        </div>

                        <textarea name="comentario" id="" cols="30" rows="10"><?php echo $_POST['comentario']; ?></textarea>


                    </div>


                    <button type="submit"><b>Editar</b></button>
                </form>
                <button onclick="mod1()">voltar</button>
            </div>
        </div>
    </div>
<?php endif;
if (isset($_POST['excluir']) && !empty($_POST['excluir'])):
    ?>
    <div class="over" id="mod2">
        <div class="mod">
            <div class="div_login">
                <form action="deleteavaliacao.php" method="POST">
                    <div class="main_login_cabeçalho">
                        <h1>Deletar</h1>
                    </div>
                    <div class="main_login_input">
                        <h1>Deseja excluir sua avaliação?</h1>
                    </div>
                    <input type="hidden" name="idinstituicao" value="<?php echo $id; ?>">

                    <input type="hidden" name="idavaliacao" value="<?php echo $_POST['excluir'] ?>">
                    <button type="submit"><b>Excluir</b></button>
                </form>
                <button onclick="mod2()">voltar</button>
            </div>
        </div>
    </div>
<?php endif; ?>



<body>
<header class="header_menu">
        <div class="div_menu">
            <a href="index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="../Material/index.php">voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php if ($useravaliacao == "0"): ?>
        <h2>você não fez nenhuma avaliação</h2>
    <?php else: ?>
        <h1>suas avaliações</h1>
        <?php while ($user = $stmt3->fetch()): ?>
            <section class="main_school_list">
                <div class="main_course_fullwidth">
                    <div class="main_course_ratting_content">
                        <article>
                            <header>
                                <h3>
                                    <?php echo $user['nome'] ?>
                                </h3>
                                <div class="div_a">
                                    <div class='divt'>
                                        <button id='botao' class="botao" onclick="f<?php echo $user['idavaliacao'] ?>()">
                                            <div class='space'> &#8942;</div>
                                        </button>
                                        <div class="hide" id="f<?php echo $user['idavaliacao'] ?>">


                                            <form action="instavaliacao.php?id=<?= $id ?>" method="post"><button
                                                    class="B2">&nbsp;Editar</button><input type="hidden"
                                                    value="<?php echo $user['idavaliacao'] ?>" name="editar"><input
                                                    type="hidden" value="<?php echo $user['avaliacao'] ?>" name="avaliacao">
                                                <input type="hidden" name="comentario"
                                                    value="<?php echo $user['comentario'] ?>"> <input type="hidden"
                                                    name="titulo" value="<?php echo $user['data'] ?>">
                                            </form>
                                            <form action="instavaliacao.php?id=<?= $id ?>" method="post"><button
                                                    class="B2">&nbsp;Excluir</button><input type="hidden"
                                                    value="<?php echo $user['idavaliacao'] ?> " name="excluir">

                                            </form>

                                            <script>
                                                function f<?php echo $user['idavaliacao'] ?>() {
                                                    var x = document.getElementById("f<?php echo $user['idavaliacao'] ?>");
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
                                <p>
                                    <?php # date('d/m/y');
                                            echo $user['data']; #= date('d/m/y') ?>
                                </p>
                                <?php if ($user['avaliacao'] == '1'): ?>
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                <?php elseif ($user['avaliacao'] == '2'): ?>

                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">

                                <?php elseif ($user['avaliacao'] == '3'): ?>

                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                <?php elseif ($user['avaliacao'] == '4'): ?>

                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                <?php elseif ($user['avaliacao'] == '5'): ?>

                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                <?php else: ?>
                                <?php endif ?>
                            </header>
                            <p>
                                <?php echo $user['comentario'] ?>
                            </p>
                        </article>
                    </div>

                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <h1>todas as avaliações</h1>
    <?php if ($instdata == "0"): ?>
        <h2>não existe avaliações dessa instituição</h2>
    <?php else: ?>

        <?php while ($instdata = $stmt->fetch()): ?>

            <section class="main_school_list">
                <div class="main_course_fullwidth">
                    <div class="main_course_ratting_content">
                        <article>
                            <header>
                                <h3>
                                    <?php echo $instdata['nome'] ?>
                                </h3>

                                <p>
                                    <?php echo $instdata['data'] = date('d/m/y') ?>
                                </p>
                                <?php if ($instdata['avaliacao'] == '1'): ?>
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                <?php elseif ($instdata['avaliacao'] == '2'): ?>

                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">

                                <?php elseif ($instdata['avaliacao'] == '3'): ?>

                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                <?php elseif ($instdata['avaliacao'] == '4'): ?>

                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                <?php elseif ($instdata['avaliacao'] == '5'): ?>

                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                <?php else: ?>
                                <?php endif ?>
                            </header>
                            <p>
                                <?php echo $instdata['comentario'] ?>
                            </p>
                        </article>
                    </div>

                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>


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