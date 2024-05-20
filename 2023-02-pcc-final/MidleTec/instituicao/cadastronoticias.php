<?php
require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();
session_start();
$idusuario = $_SESSION['idusuario'];
$id = $_GET['id'];




?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/list_format.css">

    <link href="css/fonticon.css" rel="stylesheet">

    <title>Postar Notícia</title>
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


    <h1 class="list_title">Postar Notícias</h1>
    <div class="list_container">
        <div class="list_container2">
            <form action="noticiaadd.php" method="post" enctype="multipart/form-data" style=width:50%>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo">
                <br>
                <br>
                <label for="imagem">Imagem</label>
                <input type="file" name="imagem" accept="image/png, image/jpeg">
                <br>
                <br>
                <label for="noticia">Noticia</label>
                <textarea name="noticia" id="" cols="30" rows="10"></textarea>
                <br>
                <br>
                <input type="hidden" name="idusuario" value="<?= $idusuario ?>">
                <input type="hidden" name="idinstituicao" value="<?= $id ?>">
                <br>
                <br>
                <button type="submit" class="btn">Enviar</button>
            </form>
        </div>
    </div>
</body>

</html>