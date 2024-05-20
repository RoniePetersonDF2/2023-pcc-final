<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header('location:../index.php');
}
$usuario = $_SESSION['idusuario'];
require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();

$query = " SELECT * from midletech.material inner join midletech.favoritos on material.idmaterial  = favoritos.idmaterial and favoritos.idusuario='$usuario';
";
// $query = "SELECT * FROM midletech.material where idmaterial = '$query1';";

$statement = $dbh->query($query);

$favoritos = $statement->rowCount();



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css"> 
    <link rel="stylesheet" href="../assets/css/style_options.css">
    <link rel="stylesheet" href="../assets/css/list_format.css">


    <title>Meus Favoritos</title>
</head>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="header_menu">
        <div class="div_menu">
            <a href="index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--FIM DOBRA CABEÇALHO-->
     

    <section class="main_blog">
                <header class="main_blog_header">
                    <h1 class="icon-blog">Materiais Favoritados</h1>
                </header>
                <?php if ($favoritos == "0"): ?>
                <article>
                    <a href="#">
                        <img src="../assets/img/book.svg" width="200" alt="Imagem post" title="Imagem Post">
                    </a>
                    <p><a href="" class="category">nenhum material favoritado</a></p>
       

             
                </article>
               
                <?php else: ?>
                    <?php while ($row = $statement->fetch()): ?>
                    <article>
                    <a href="<?php echo  $row['8']; ?>">
                        <img src="../assets/img/book.svg" width="200" alt="Imagem post" title="Imagem Post">
                    </a>
                    <p><a href="<?php echo  $row['8']; ?>" class="category"><?php echo $row['1']; ?></a></p>
                    
                </article>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php $dbh = null ?>
            </section>

</body>

</html>