<?php

$buscar=null;
$buscar = $_GET['buscar'];

require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();

$query = "SELECT * FROM midletech.material where tipo = 'ytbvid' and titulo like '%$buscar%' or tipo = 'ytbvid' and assunto like '%$buscar%'
or tipo = 'video' and titulo like '%$buscar%' or tipo = 'video' and assunto like '%$buscar%';";
// $query = "SELECT * FROM midletech.material where tipo = 'video' and titulo like '%$buscar%';";
// $query = "SELECT * FROM midletech.material where tipo = 'ytbvid' and assunto like '%$buscar%'";
// $query = "SELECT * FROM midletech.material where tipo = 'video' and assunto like '%$buscar%';";

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
    <link rel="stylesheet" href="../assets/css/style_options.css">


    <title>Vídeos</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>


            <div class="topnav"><form action="result_videos.php" method="get">
                <input type="text" placeholder="Busca.." name="buscar">
                </form>
            </div>

            <nav class="nav_menu">
                <ul>
                    <li><a href="videos_form.php">Adicionar Vídeos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="main_course">
        <header class="main_course_header">
            <img src="../assets/img/videos_content.svg" alt="img" title="img" width="300" height="300">
            <h1 class="icon-books">videos</h1>
        </header>
        <div class="alinhamento">
            <?php if ($material == "0"): ?>
                <article>
                    <a href="#">
                        <header>
                            <h2>Nenhum resultado encontrado</h2>
                            <p></p>
                        </header>
                    </a>
                </article>
                <?php endif; ?>
                <?php if($row['3']='ytbvid'): ?>
                    <?php while ($row = $statement->fetch()): ?>
                        <?php
                    $string = $row['8'];
                    $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
                    $replace = "youtube.com/embed/$1";
                    $url = preg_replace($search, $replace, $string);

                  # var_dump($url, $row['8']);
                    ?>
                    <article>
                        <header>
                            <h2>
                                <?php echo $row['1']; ?>
                            </h2>
                            <iframe src="<?php echo $url; ?>" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                            <p>
                                <?php echo $row['2']; ?>
                            </p>
                        </header>
                    
                    </article>
                    <?php ; endwhile; ?>
                    <?php endif; ?>
                    <?php if($row['3']='video'): ?>
                    <?php while ($row = $statement->fetch()): ?>
                                <?php #$video = '../' . $row['8']; ?>
                    <article>
                        <header>
                            <h2>
                                <?php echo $row['1']; ?>
                            </h2>
                          <video src="<?php echo  $row['8'];?>" controls>Video Não Suportado</video>
                            <p>
                                <?php echo $row['2']; ?>
                          <?php  #$video1 = '../' . $row[8];  ?>
                            </p>
                        </header>
                    </a>
                    </article>
                    
                    <?php endwhile;  ?>
                    <?php endif; ?>
                    
                    
                    <?php $dbh = null ?>
                </div>
</body>

</html>