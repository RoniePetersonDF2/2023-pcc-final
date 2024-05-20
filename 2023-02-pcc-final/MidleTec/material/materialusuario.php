<?php
    session_start();
    if ( !isset( $_SESSION['idusuario'] ) ) {
        header( 'location:../index.php' );
    }
    $idusuario = $_SESSION['idusuario'];

    include '../src/database/conexao.php';
    $dbh = conexao::getConexao();

    $query = " SELECT * from midletech.material where proprietario  =  '$idusuario';";
    // $query = "SELECT * FROM midletech.material where idmaterial = '$query1';";

    $statement = $dbh->query( $query );

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
    <link rel="stylesheet" href="../assets/css/elipse.css">
     <link rel="stylesheet" href="../assets/css/popup.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Meus Materiais</title>
</head>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="header_menu">
        <div class="div_menu">
            <a href="index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img"
                    title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--FIM DOBRA CABEÇALHO-->



    <?php
        if ( isset( $_POST['editar'] ) && !empty( $_POST['editar'] ) ):
    ?>

        <div class="over" id="mod1">
            <div class="mod">
                <div class="div_login">
                    <form action="updatematerial.php" method="POST">
                        <div class="main_login_cabeçalho">
                            <h1>Ficha do Material</h1>
                        </div>
                        <div class="main_login_input">
                            <input type="hidden" name="idmaterial" value="<?php echo $_POST['editar']; ?>">
                            <input type="text" name="titulo" placeholder="Título" class="size"
                                value="<?php echo $_POST['titulo']; ?>">
                            <textarea name="descricao" placeholder="Descrição" id="" cols="30"
                                rows="05"><?php echo $_POST['descricao']; ?></textarea>
                            <input type="text" name="assunto" placeholder="Assunto" class="size"
                                value="<?php echo $_POST['assunto']; ?>">
                        </div>


                        <button type="submit"><b>Editar</b></button>
                    </form>
                    <button onclick="mod1()">voltar</button>
                </div>
            </div>
        </div>
    <?php endif;if ( isset( $_POST['excluir'] ) && !empty( $_POST['excluir'] ) ):
    ?>
            <div class="over" id="mod2">
                <div class="mod">
                    <div class="div_login">
                        <form action="deletematerial.php" method="POST">
                            
                            <div class="main_login_input">
                                <h1>Deseja excluir
                                "<?php echo $_POST['titulo']; ?>" ?
                                </h1>
                            </div>
                            <input type="hidden" name="idmaterial" value="<?php echo $_POST['excluir'] ?>">
                            <button type="submit"><b>Excluir</b></button>
                        </form>
                        <button onclick="mod2()">voltar</button>
                    </div>
                </div>
            </div>
    <?php endif;?>


    <section class="main_blog">
        <header class="main_blog_header">
            <h1 class="icon-blog">Meus Materiais</h1>
        </header>
        <?php if ( $favoritos == "0" ): ?>
            <article>
                <a href="#">
                    <img src="../assets/img/book.svg" width="200" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">nenhum material postado</a></p>



            </article>

        <?php else: ?>
<?php while ( $row = $statement->fetch() ): ?>
                <article>
                    <div class="div_a">
                        <div class='divt'>
                        <button id='botao' class="botao" onclick="f<?php echo $row['0'] ?>()"> <div class='space'> &#8942;</div></button>
                            <div class="hide" id="f<?php echo $row['0'] ?>">


                                <form action="#" method="post"><button class="B2">&nbsp;Editar</button><input type="hidden"
                                        value="<?php echo $row['0'] ?>" name="editar"><input type="hidden"
                                        value="<?php echo $row['5'] ?>" name="assunto"> <input type="hidden" name="descricao"
                                        value="<?php echo $row['2'] ?>"> <input type="hidden" name="titulo"
                                        value="<?php echo $row['1'] ?>"> </form>
                                <form action="#" method="post"><button class="B2">&nbsp;Excluir</button><input type="hidden"
                                        value="<?php echo $row['0'] ?> " name="excluir"> <input type="hidden" name="titulo"
                                        value="<?php echo $row['1'] ?> "></form>

                                <!-- <li><a href="">Excluir</a></li> -->
                                <!-- <li>c</li> -->

                            </div>
                        </div>
                    </div>
                    <?php
                        #  echo var_dump( $row['3'], $row['8'] );
                    ?>

                    <a href="<?php echo $row['8']; ?>">
                        <img src="../assets/img/book.svg" width="200" alt="Imagem post" title="Imagem Post">
                    </a>
                    <p><a href="<?php $row['8'];?>" class="category">
                            <?php echo $row['1']; ?>
                        </a></p>

                </article>

                <script>
                    function f<?php echo $row['0'] ?>() {
                        var x = document.getElementById("f<?php echo $row['0'] ?>");
                        if (x.style.display === "flex") {
                            x.style.display = "none";
                        } else {
                            x.style.display = "flex";
                        }
                    }
                </script>
            <?php endwhile;?>
<?php endif;?>
<?php $dbh = null?>
    </section>

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
<?php
if(isset($_GET['error']) || isset($_GET['msg']) ) { ?>
            <script>
                Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg');?>',
                title: 'material',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error']: $_GET['msg']); ?>',
                })
            </script>
        <?php } ?>
</html>