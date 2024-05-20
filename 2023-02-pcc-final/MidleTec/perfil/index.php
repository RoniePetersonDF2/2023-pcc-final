<?php
session_start();

if (isset($_SESSION["idusuario"])) {
    // print_r($_SESSION);
    $Alunonome = $_SESSION['nome'];

    $idAluno = $_SESSION['idusuario'];
    $foto = '../' . $_SESSION['imagem'];
}
// var_dump($foto)
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
            <a href="index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
            </a>

            <nav class="nav_menu">
                <ul>

                    <div class="dropdown" data-dropdown>
                        <button class="link" data-dropdown-button><?php echo $Alunonome; ?> <img class="fotoPerfil" src="<?php echo $foto; ?> "></button>
                        <div class="dropdown_menu">
                            <a href="../perfil/index.php">&nbsp;&nbsp;perfil</a>

                            <a href="../login/logout.php">&nbsp;&nbsp;sair</a>
                        </div>
                    </div>
                </ul>
                <ul>
                    <li><a href="../material/index.php">voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>

        <div class="main_opc">
            <section class="main_material">
                <div class="main_material_content">

                    <header class="main_course_header"></header>
                    <div class="alinhamento">
                        <article>
                            <h2>Meus Dados</h2>
                            <header>
                                <p align="center">
                                    <a href="listar.php">
                                        <img src="../assets/img/alterar.svg" alt="Artigos" title="Artigos" width="300" height="300">
                                    </a>
                                </p>
                            </header>
                        </article>

                        <article>
                            <h2>Meus Favoritos</h2>
                            <header>
                                <p align="center">
                                    <a href="favoritos.php">
                                        <img src="../assets/img/favoritos.svg" alt="Vídeos" title="Vídeos" width="300" height="300">
                                    </a>
                                </p>
                            </header>
                        </article>

                    </div>

                </div>
</body>


</html>