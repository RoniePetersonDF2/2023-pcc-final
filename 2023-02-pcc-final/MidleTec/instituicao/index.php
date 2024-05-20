<?php
require_once '../src/dao/usuariodao.php';

// require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();


$query = ("SELECT * from midletech.instituicoes;");
$statement = $dbh->query($query);

$instituicao = $statement->rowCount();



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="css/fonticon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Instituições</title>
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
    <?php
if(isset($_GET['error']) || isset($_GET['msg']) ) { ?>
            <script>
                Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg');?>',
                title: 'Perfil',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error']: $_GET['msg']); ?>',
                })
            </script>
        <?php } ?>
    <!--DOBRA A ESCOLA-->
    <?php while ($row1 = $statement->fetch()) : ?>
        <div class="main_school">
            <section class="main_school_content">
                <header class="main_school_header">
                    <div>
                        <h1>
                            <?php echo $row1['nome']; ?>
                        </h1>
                        <p>
                            <?php echo $row1['slogan']; ?>
                        </p>
                    </div>

                </header>
                <div >
                    <img src="<?= $row1['logo'] ?>" width="200" alt="Imagem" title="Imagem">
                </div>
                <div class="main_school_content_left">
                    <article class="main_school_content_left_content">
                        <header>
                            <p>
                                <?php if (isset($row1['facebook']) && !empty($row1['facebook'])) : ?>
                                    <span class="icon-facebook"><a href="<?= $row1['facebook'] ?>" target="_blank">Facebook</a>&nbsp;</span>
                                <?php endif ?>
                                <?php if (isset($row1['instagram']) && !empty($row1['instagram'])) : ?>
                                    <span class="icon-twitter"><a href="<?= $row1['instagram'] ?>" target="_blank">Instagram</a></span>
                                <?php endif ?>

                            </p>
                        </header>
                        <p>
                            <?php echo $row1['descricao']; ?>
                        </p>
                    </article>


                    <section class="main_school_list">
                        <div class="main_course_fullwidth">
                            <div class="main_course_ratting_content">
                                <article class="main_course_rating_title">

                                    <img src="../assets/img/avaliações.svg" alt="Estrela" title="Estrela">
                                </article>

                                <section class="main_course_ratting_content_comment">
                                    <header>
                                        <h2>Veja as avaliações mais recentes</h2>
                                    </header>
                                    <?php $idinstituicao = $row1['idinstituicoes']; ?>
                                    <?php
                                    $query2 = "SELECT midletech.avaliacoes.*,
                 `usuarios`.idusuario, `usuarios`.nome, `usuarios`.imagem
                     FROM midletech.avaliacoes 
                     INNER JOIN midletech.usuarios ON avaliacoes.idusuario = `usuarios`.idusuario
                    WHERE `avaliacoes`.idinstituicao = '$idinstituicao' order by `avaliacoes`.data DESC LIMIT 4;";

                                    $stmt = $dbh->query($query2);
                                        //  $instdata = $stmt->rowCount();
                                    ;
                                    ?>
                                    <?php while ($instdata = $stmt->fetch()) : ?>
                                        <article>
                                            <header>
                                                <h3>
                                                    <?php echo $instdata['nome'] ?>
                                                </h3>
                                                <?php # $data = date('d/m/y',  strtotime($instdata['data'])) 
                                                ?>
                                                <p>
                                                    <?php echo date('d/m/Y', strtotime($instdata['data'])) ?>
                                                </p>
                                                <?php if ($instdata['avaliacao'] == '1') : ?>
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                <?php elseif ($instdata['avaliacao'] == '2') : ?>

                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">

                                                <?php elseif ($instdata['avaliacao'] == '3') : ?>

                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                <?php elseif ($instdata['avaliacao'] == '4') : ?>

                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                <?php elseif ($instdata['avaliacao'] == '5') : ?>

                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                    <img src="../assets/img/star.png" alt="Imagem" title="Imagem">
                                                <?php else : ?>
                                                <?php endif ?>
                                            </header>
                                            <p>
                                                <?php echo $instdata['comentario'] ?>
                                            </p>
                                        </article>

                                    <?php endwhile ?>

                                </section>

                                <p><a class="btn2" href="../avaliacao/avaliacao.php?id=<?php echo $row1['idinstituicoes']; ?>">Avaliar</a></p>

                            </div>
                        </div>
                    </section>
                </div>
                <p><a class="btn" href="../avaliacao/instavaliacao.php?id=<?php echo $row1['idinstituicoes']; ?>">Ver Todas as
                        Avaliações</a></p>

                <article class="main_school_adress">
                    <header>
                        <h2 class="icon-map2">Nos Encontre</h2>
                    </header>
                    <p>
                        <?php echo $row1['endereco'] . ' - ' . $row1['cidade']?>
                    </p>
                    <br>
                    <p>Email: <?php echo $row1['email'];?> | Telefone: <?php echo $row1['telefone'];?></p>
                </article>
            </section>
        </div>


    <?php endwhile ?>
    <!-- FIM DOBRA A ESCOLA -->




</body>

</html>