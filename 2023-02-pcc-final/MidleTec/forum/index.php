<?php
session_start();
require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();



$forumid = $_GET['forumid'];
$query = "SELECT * FROM midletech.foruns where idforum = '$forumid';";

$statement = $dbh->query($query);


$forum = $statement->rowCount();


if (!isset($_GET['forumid']) || empty($_GET['forumid'])) {
    header('location:../material/foruns.php');
}

if ($forum == 0) {
    header('location:../material/foruns.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/forum.css">
    <link rel="stylesheet" href="../assets/css/elipse.css">


    <title>Fórum</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>
            <nav class="nav_menu">
                <ul>
                    <li><a href="../material/foruns.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php
    if (isset($_POST['editar']) && !empty($_POST['editar'])):
        ?>

        <div class="over" id="mod1">
            <div class="mod">
                <div class="div_login">
                    <form action="../material/updatematerial.php" method="POST">
                        <div class="main_login_cabeçalho">
                            <h1>Editar</h1>
                        </div>
                        <div class="main_login_input">
                            <input type="hidden" name="idforum" value="<?php echo $_POST['editar']; ?>">
                            <input type="hidden" name="usuario" value="<?php echo $_POST['usuario']; ?>">
                            <input type="hidden" name="forum" value="<?php echo $_POST['forum']; ?>">
                            <textarea name="mensagem" placeholder="mensagem" id="" cols="30"
                                rows="05"><?php echo $_POST['mensagem']; ?></textarea>

                        </div>


                        <button type="submit"><b>Editar</b></button>
                    </form>
                    <button onclick="mod1()">Voltar</button>
                </div>
            </div>
        </div>
    <?php endif;
    if (isset($_POST['excluir']) && !empty($_POST['excluir'])):
        ?>
        <div class="over" id="mod2">
            <div class="mod">
                <div class="div_login">
                    <form action="../material/deletematerial.php" method="POST">
                        
                        <div class="main_login_input">
                            <h1>Exluir comentário <br>
                                "
                                <?php echo $_POST['mensagem']; ?>" ?
                            </h1>
                        </div>
                        <input type="hidden" name="idforummsg" value="<?php echo $_POST['excluir'] ?>">
                        <input type="hidden" name="forum" value="<?php echo $_POST['forum'] ?>">
                        <button type="submit"><b>Excluir</b></button>
                    </form>
                    <button onclick="mod2()">Voltar</button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="formato_capa">
        <div class="capa">
            <?php ($row = $statement->fetch()) ?>
            <div class="box2">
                <h1>
                    <?php echo $row['1']; ?>
                </h1>
                <p>
                    <?php echo $row['2']; ?><!-- descrição descrição descrição descrição descrição descrição descrição descrição descrição descrição descrição descrição descrição descrição descrição descrição -->
                </p>
                <!-- <p><a href="arquivos.php" class="btn">Arquivos Relacionados</a></p> -->
            </div>
            <div class="box">
                <div class="box_content">
                    <img src="../assets/img/forum_content.svg" alt="capa" width="750" height="500">
                </div>
            </div>
        </div>

    </div>


    <div class="main_opc">
        <section class="main_material">
            <div class="main_forum_content">

                <div class="comentario">
                    <form action="forumcontrole.php" method="post">

                        <textarea name="mensagem" id="" cols="170" rows="10" placeholder="Comente no Fórum"></textarea>
                        <input type="hidden" value="<?php echo $row['0']; ?>" name="idforum">
                        <input type="hidden" value="<?php echo $_SESSION['idusuario']; ?>" name="idusuario">

                        <button class="category_comment" value="submit">Comentar</button>

                    </form>

                    <br>
                </div>
                <?php
                $query1 = "SELECT * FROM midletech.foruns_msg where idforum = '$forumid';";
                $statement1 = $dbh->query($query1);


                $forum1 = $statement1->rowCount();
                if ($forum1 == "0"):
                    ?>
                    <p>Sem Mensagens</p>
                <?php else: ?>
                    <?php while ($row1 = $statement1->fetch()): ?>

                        <article>
                            <?php $user = $row1['1']; ?>
                            <?php $query2 = " SELECT usuarios.idusuario, usuarios.nome, usuarios.imagem, usuarios.perfil from midletech.usuarios inner join midletech.foruns_msg on usuarios.idusuario  = foruns_msg.idusuario and foruns_msg.idusuario = '$user';";


                            $statement2 = $dbh->query($query2);

                            $statement2->rowCount();
                            $row2 = $statement2->fetch(); ?>
                            <?php if (($row1['1'] == $_SESSION['idusuario']) or ($_SESSION['perfil'] == '1') or ($_SESSION['perfil'] == '3')): ?>
                                <div class="div_a">
                                    <div class='divt'>
                                        <button id='botao' class="botao" onclick="f<?php echo $row1['0'] ?>()">
                                            <div class='space'> &#8942;</div>
                                        </button>
                                        <div class="hide" id="f<?php echo $row1['0'] ?>">

                                            <?php if (($row1['1'] == $_SESSION['idusuario'])): ?>

                                                <form action="#" method="post"><button class="B2">&nbsp;Editar</button><input
                                                        type="hidden" value="<?php echo $row1['0'] ?>" name="editar"><input
                                                        type="hidden" value="<?php echo $row1['1'] ?>" name="usuario"> <input
                                                        type="hidden" name="forum" value="<?php echo $row1['2'] ?>"> <input
                                                        type="hidden" name="mensagem" value="<?php echo $row1['3'] ?>"> </form>
                                            <?php endif ?>
                                            <form action="#" method="post"><button class="B2">&nbsp;Excluir</button><input
                                                    type="hidden" value="<?php echo $row1['0'] ?> " name="excluir"><input
                                                    type="hidden" name="mensagem" value="<?php echo $row1['3'] ?>"><input
                                                    type="hidden" name="forum" value="<?php echo $row1['2'] ?>"> </form>
                                            <script>
                                                function f<?php echo $row1['0'] ?>() {
                                                    var x = document.getElementById("f<?php echo $row1['0'] ?>");
                                                    if (x.style.display === "flex") {
                                                        x.style.display = "none";
                                                    } else {
                                                        x.style.display = "flex";
                                                    }
                                                }
                                            </script>

                                            <!-- <li><a href="">Excluir</a></li> -->
                                            <!-- <li>c</li> -->

                                        </div>
                                    </div>
                                </div>

                                <?php # echo var_dump($row1, $row2); ?>

                            <?php endif ?>
                            <p><a href="" class="category">
                                    <div class="infouser">
                                        <img src="<?php echo '../' . $row2['2']; ?>" alt="">
                                        <?php echo $row2['1'] ?>
                                    </div>
                                </a></p>
                            <br>
                            <h2 class="title">
                                <?php echo $row1['3'] ?>
                            </h2>
                            <br>

                            <!-- <p class="category_comment"><a href="#">Responder</a></p> -->
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>


                <?php $dbh = null ?>



            </div>
        </section>
    </div>

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