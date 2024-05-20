<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header('location:../index.php');
}
$buscar=null;
$buscar = $_GET['buscar'];

require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();

$query = "SELECT * FROM midletech.material where tipo = 'artigo' and titulo like '%$buscar%' or tipo = 'artigo'and assunto like '%$buscar%';";

$statement = $dbh->query($query);

$material = $statement->rowCount();



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/cadastrocss.css">

    <title>Artigos</title>
</head>
<? #var_dump($buscar);?>
<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>

            
            <div class="topnav"><form action="result_artigo.php" method="get">
                <input type="text" placeholder="Busca.." name="buscar">
                </form>
            </div>


            <nav class="nav_menu">
                <ul>
                    <li><a href="artigos_form.php">Adicionar Artigos</a></li>
                </ul>
                
                </nav>
        </div>
    </header>
    <section class="main_course">
        <header class="main_course_header">
            <img src="../assets/img/artigos_content.svg" alt="img" title="img">
            <h1 class="icon-books">artigos</h1>
        </header>
        <div class="main_course_content">
        <?php if ($material == "0"): ?>
                <article>
                    <a href="index.php">
                        <header>
                            <h2>Nenhum resultado encontrado</h2>
                            <p></p>
                        </header>
                    </a>
                </article>
            <?php else: ?>
                <?php while ($row = $statement->fetch()): ?>
                    <article>
                        <a href="<?php echo $row['8']; ?> " target="_blank">
                        <header>
                            <h2> <?php echo $row['1']; ?> </h2>
                                <p>  <?php echo $row['2']; ?> </p>
                            </header>
                        </a>
                    </article>

                <?php endwhile; ?>
            <?php endif; ?>
          
            
            <?php $dbh = null ?>
        </div>
</body>

</html>