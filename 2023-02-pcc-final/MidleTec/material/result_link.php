<?php
$buscar=null;
$buscar = $_GET['buscar'];

require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();

$query = "SELECT * FROM midletech.material where tipo = 'link' and titulo  like '%$buscar%' or tipo ='link' and assunto like '%$buscar%';";
// $query = "SELECT * FROM midletech.material where tipo = 'link' and assunto like '%$buscar%';";

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
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <title>Links</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>

            <div class="topnav"><form action="result_link.php" method="get">
                <input type="text" placeholder="Busca.." name="buscar">
                </form>
            </div>

            <nav class="nav_menu">
                <ul>
                    <li><a href="links_form.php">Adicionar Link</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="main_course" >
        <header class="main_course_header">
            <img src="../assets/img/links_content.svg" alt="Links" title="Link">
            <h1 class="icon-books">links</h1>
        </header>
        <div class="main_course_content" >
        <?php if ($material == "0"): ?>
                <article >
                    <a href="#">
                        <header>
                            <h2>Não existe nenhum link postado</h2>
                            <p>seja o primeiro a postar</p>
                        </header>
                    </a>
                </article>
            <?php else: ?>
                <?php while ($row = $statement->fetch()): ?>
                    <article >
                    
                                       
                    <a href="<?php echo $row['8']; ?>">
                            <header>
                                <h2>
                                    <?php echo $row['1']; ?>
                                </h2>
                                <p>
                                    <?php echo $row['2']; ?>
                                </p>
                            </header>
                        </a>

                       
                    </article>

                <?php endwhile; ?>
            <?php endif; ?>
          
            
            <?php $dbh = null ?>
        </div>
</body>

</html>