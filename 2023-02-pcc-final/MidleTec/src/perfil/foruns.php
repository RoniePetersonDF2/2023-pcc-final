<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header('location:../index.php');
}
$idusuario = $_SESSION['idusuario'];

include('../src/database/conexao.php');
$dbh = conexao::getConexao();

$query = " SELECT * from midletech.foruns where proprietario  =  '$idusuario';";
// $query = "SELECT * FROM midletech.material where idmaterial = '$query1';";

$statement = $dbh->query($query);

$foruns = $statement->rowCount();



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
    <link rel="stylesheet" href="../assets/css/elipse.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="../assets/js/menu.js" defer></script>


    <title>MidleTech</title>
</head>

<body>
<header class="header_menu">
        <div class="div_menu">
            <a href="../index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
                </img>
            </a>

            <div class="topnav">
                <form action="resultforuns.php" method="get">
                    <input type="text" placeholder="Busca.." name="buscar">
                </form>
            </div>

            <nav class="nav_menu">
                <ul>
                    <li><a href="../material/foruns_form.php">Criar Fórum</a></li>
                    <nav class="nav_menu">
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
                title: 'Foruns',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error']: $_GET['msg']); ?>',
                })
            </script>
        <?php } ?>

    <?php
    if (isset($_POST['editar']) && !empty($_POST['editar'])):
        ?>

        <div class="over" id="mod1">
            <div class="mod">
                <div class="div_login">
                    <form action="update.php" method="POST">
                        <div class="main_login_cabeçalho">
                            <h1>Ficha do Material</h1>
                        </div>
                        <div class="main_login_input">
                            <input type="hidden" name="idforum" value="<?php echo $_POST['editar']; ?>">
                            <input type="text" name="titulo" placeholder="Título" class="size"
                                value="<?php echo $_POST['titulo']; ?>">
                            <textarea name="descricao" placeholder="Descrição" id="" cols="30"
                                rows="05"><?php echo $_POST['descricao']; ?></textarea>
                                <select name="categoria"  >
                            <option value="<?php echo $_POST['categoria'];?>"><?php echo $_POST['categoria'];?></option>
                            <option value="Viagens e Aventura">Viagens e Aventura</option>
                            <option value="Carreiras e Emprego">Carreiras e Emprego</option>
                            <option value="Política e Ativismo">Política e Ativismo</option>
                            <option value="Alimentação e Culinária">Alimentação e Culinária</option>
                            <option value="Jogos e Entretenimento">Jogos e Entretenimento</option>
                            <option value="Sustentabilidade e Meio Ambiente">Sustentabilidade e Meio Ambiente</option>
                            <option value="Parentalidade e Família">Parentalidade e Família</option>
                            <option value="Desenvolvimento Pessoal">Desenvolvimento Pessoal</option>
                            <option value="Desenvolvimento de Jogos">Desenvolvimento de Jogos</option>
                            <option value="História e Genealogia">História e Genealogia</option>
                            <option value="Ciência e Tecnologia Futurista">Ciência e Tecnologia Futurista</option>
                            </select>
                        </div>


                        <button type="submit"><b>Editar</b></button>
                    </form>
                    <button onclick="mod1()">Voltar</button>
                </div>
            </div>
        </div>
    <?php endif; if (isset($_POST['excluir']) && !empty($_POST['excluir'])):
        ?>
            <div class="over" id="mod2">
                <div class="mod">
                    <div class="div_login">
                        <form action="delete.php" method="post">
                            
                            <div class="main_login_input">
                                <h1>Deseja excluir
                                '<?php echo $_POST['titulo'];?>' ?
                                </h1>
                            </div>
                            <input type="hidden" name="idforum" value="<?php echo $_POST['excluir'] ?>">
                            <button type="submit"><b>Excluir</b></button>
        
                        </form>
                        <button onclick="mod2()">Voltar</button>
                    </div>
                </div>
            </div>
    <?php endif; ?>
    <main>
        <div class="main_opc">
            <section class="main_material">
                <div class="main_forum_content">
                    <header class="main_blog_header">
                        <h1 class="icon-blog">FÓRUNS</h1>
                    </header>
                    <?php if ($foruns == "0"): ?>
                        <article>
                        </article>
                    <?php else: ?>
                        <?php while ($row = $statement->fetch()): ?>

                            <?php if ($row['3'] == 'Ciência e Tecnologia Futurista') {
                                $f_imagem = '../assets/img/ciencia.svg';
                            } else if ($row['3'] == 'História e Genealogia') {
                                $f_imagem = '../assets/img/historia.svg';
                            } else if ($row['3'] == 'Desenvolvimento de Jogos') {
                                $f_imagem = '../assets/img/games2.svg';
                            } else if ($row['3'] == 'Desenvolvimento Pessoal') {
                                $f_imagem = '../assets/img/desenvolvimento.svg';
                            } else if ($row['3'] == 'Parentalidade e Família') {
                                $f_imagem = '../assets/img/familia.svg';
                            } else if ($row['3'] == 'Sustentabilidade e Meio Ambiente') {
                                $f_imagem = '../assets/img/sustentabilidade.svg';
                            } else if ($row['3'] == 'Jogos e Entretenimento') {
                                $f_imagem = '../assets/img/games.svg';
                            } else if ($row['3'] == 'Alimentação e Culinária') {
                                $f_imagem = '../assets/img/culinaria.svg';
                            } else if ($row['3'] == 'Política e Ativismo') {
                                $f_imagem = '../assets/img/politica.svg';
                            } else if ($row['3'] == 'Carreiras e Emprego') {
                                $f_imagem = '../assets/img/carreira.svg';
                            } else if ($row['3'] == 'Viagens e Aventura') {
                                $f_imagem = '../assets/img/viagem.svg';
                            } else if ($row['3'] == 'Educação e Aprendizado') {
                                $f_imagem = '../assets/img/aprendizado.svg';
                            } else if ($row['3'] == 'Física e Matemática') {
                                $f_imagem = '../assets/img/fisica.svg';
                            } else if ($row['3'] == 'Arte e Cultura') {
                                $f_imagem = '../assets/img/art.svg';
                            } else if ($row['3'] == 'Saúde e Bem-Estar') {
                                $f_imagem = '../assets/img/saude.svg';
                            } else if ($row['3'] == 'Tecnologia e Gadgets') {
                                $f_imagem = '../assets/img/tecnologia.svg';
                            }




                            ?>



                            <article>

                            <div class="div_a">
                        <div class='divt'>
                            <button id='botao' class="botao" onclick="f<?php echo $row['0'] ?>()"> <div class='space'> &#8942;</div></button>
                            <div class="hide" id="f<?php echo $row['0'] ?>">


                                <form action="#" method="post"><button class="B2">&nbsp;Editar</button><input type="hidden"
                                        value="<?php echo $row['0'] ?>" name="editar"><input type="hidden"
                                        value="<?php echo $row['categoria'] ?>" name="categoria"> <input type="hidden" name="descricao"
                                        value="<?php echo $row['descricao'] ?>"> <input type="hidden" name="titulo"
                                        value="<?php echo $row['titulo'] ?>"> </form>
                                <form action="#" method="post"><button class="B2">&nbsp;Excluir</button><input type="hidden"
                                        value="<?php echo $row['0']?>" name="excluir"> <input type="hidden" name="titulo"
                                        value="<?php echo $row['titulo'] ?> "></form>

                                        <?php #echo var_dump($row); ?>

                                <!-- <li><a href="">Excluir</a></li> -->
                                <!-- <li>c</li> -->

                            </div>
                        </div>
                    </div>

                                <form action="../forum/index.php" method="get">
                                    <input type="hidden" value="<?php echo $row['0'] ?>" name=forumid>
                                    <button value='submit' class="aa">
                                        
                                        <img src="<?php echo $f_imagem; ?>" width="" alt="Imagem post" title="Imagem Post"
                                        width="350" height="200">
                                        
                                        <p class="category">
                                            <?php echo $row['1']; ?>
                                        </p>
                                        <h2 class="title">
                                            <?php echo $row['2']; ?>
                                        </h2>
                                    </button>
                                </form>
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
                        <?php endwhile; ?>
                    <?php endif; ?>


                </div>
            </section>
        </div>
    </main>
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