<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header('location:../index.php');
}

require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();

if (isset($_POST['favoritar']) && !empty($_POST['favoritar'])) {
    $idmaterial = $_POST['favoritar'];
    $idusuario = $_SESSION['idusuario'];

    $stmt = $dbh->prepare("SELECT * FROM midletech.favoritos WHERE idmaterial=? and idusuario =?");

    $stmt->execute([$idmaterial, $idusuario]);

    $verificarfavorito = $stmt->fetch();
    if ($verificarfavorito) {
        header('location:artigos.php');
        // echo '<script>alert("desfavotitado com sucesso");</script>';
        $query2 = " DELETE from midletech.favoritos where idmaterial = '$idmaterial' and idusuario='$idusuario';";
        $stmt2 = $dbh->prepare($query2);
        return $stmt2->execute();


    } else {

        $query1 = "INSERT INTO midletech.favoritos (idmaterial, idusuario)
    values (:idmaterial, :idusuario);";
        $stmt = $dbh->prepare($query1);
        $stmt->bindParam(':idmaterial', $idmaterial);
        $stmt->bindParam(':idusuario', $idusuario);

        $result = $stmt->execute();
        // echo '<script>alert("favotitado com sucesso");</script>';
    }

}

$query = "SELECT * FROM midletech.material where tipo = 'artigo';";

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
    <link rel="stylesheet" href="../assets/css/favoritos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>Artigos</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>


            <div class="topnav">
                <form action="result_artigo.php" method="get">
                    <input type="text" placeholder="Busca.." name="buscar">
                </form>
            </div>

            <nav class="nav_menu">
                <ul>
                    <li><a href="artigos_form.php">Adicionar Artigos</a></li>
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
                title: 'Artigo',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error']: $_GET['msg']); ?>',
                })
            </script>
        <?php } ?>
    <section class="main_course">
        <header class="main_course_header">
            <img src="../assets/img/artigos_content.svg" alt="img" title="img">
            <h1 class="icon-books">artigos</h1>
        </header>
        <div class="main_course_content">
            <?php if ($material == "0"): ?>
                <article>
                    <a href="#">
                        <header>
                            <h2>Não existe nenhum Artigo postado</h2>
                            <p>seja o primeiro a postar</p>
                        </header>
                    </a>
                </article>
            <?php else: ?>
                <?php while ($row = $statement->fetch()): ?>
                    <?php $idmaterial1 = $row['0'];
                    $idusuario1 = $_SESSION['idusuario'];

                    $stmt1 = $dbh->prepare("SELECT * FROM midletech.favoritos WHERE idmaterial=? and idusuario =?");

                    $stmt1->execute([$idmaterial1, $idusuario1]);

                    $verificarfavorito1 = $stmt1->fetch();
                    if ($verificarfavorito1) {
                        $botao = '<button value="submit"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#26a182}</style><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg></button>';
                    } else {
                        $botao = '<button value="submit"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#26a182}</style><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></button>';
                    }

                    ?>
                    <article>
                        <a href="<?php echo $row['8']; ?> " target="_blank">
                            <header>
                                <h2>
                                    <?php echo $row['1']; ?>
                                </h2>
                                <p>
                                    <?php echo $row['2']; ?>
                                </p>
                                <?php # echo var_dump($row['8']) ?>
                            </header>
                        </a>
                        <form action="artigos.php" method="post">
                            <input type="hidden" name="favoritar" value="<?php echo $row['0'] ?>">
                            <!-- <input type="hidden" name="<?php $favoritar2 ?>"> -->
                            <?php echo $botao ?>
                        </form>
                    </article>

                <?php endwhile; ?>
            <?php endif; ?>


            <?php $dbh = null ?>
        </div>
</body>

</html>