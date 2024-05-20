<?php
session_start();
$idusuario = $_SESSION['idusuario'];
// require_once '../src/database/conexao.php';
require_once '../src/dao/usuariodao.php';

$dbh = conexao::getConexao();

$query = "SELECT * from midletech.instituicoes;";
$query2 = "SELECT usuarios.idusuario, usuarios.instituicao, instituicoes.* FROM midletech.usuarios inner join midletech.instituicoes on usuarios.instituicao = instituicoes.idinstituicoes and usuarios.idusuario = '$idusuario';";

$statement = $dbh->query($query);
$statement2 = $dbh->query($query2);

$escola = $statement->rowCount();
$escola1 = $statement2->fetch();

$dao = new AlunoDAO();
$usuario = $dao->getUsuarios($idusuario);





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
    <link rel="stylesheet" href="../assets/css/popup.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/mask.js" defer></script>




    <title>Meus Dados</title>
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
    <?php
    if (isset($_GET['error']) || isset($_GET['msg'])) { ?>
        <script>
            Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg'); ?>',
                title: 'Perfil',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error'] : $_GET['msg']); ?>',
            })
        </script>
    <?php } ?>
    <!--FIM DOBRA CABEÇALHO-->
    <div class="list_title">
        <h1>Seus dados</h1>


        <div class="list_img">
            <img src="<?php echo '../' . $usuario['imagem']; ?>" alt="foto de perfil" height="75px">
            <br>
            <button class="btn" onclick="hide1()">Editar</button>
        </div>
    </div>

    <div class="list_container">



        <table style=width:50%>
            <tr>
                <th>Nome</th>
                <td>
                    <?php echo $usuario['nome'] ?>
                </td>
                <td>

                    <button class="btn" onclick="hide2()">Editar</button>&nbsp;

                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <?php if ($_SESSION['perfil'] == '2'): ?>

            <tr>
                <th>Numero de Matricula</th>
                <td>
                    <?php echo $usuario['matricula'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide3()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <!-- <tr>
                    <td>&nbsp;</td>
                </tr> -->

            <tr>
                <td>&nbsp;</td>
            </tr>
            <?php endif ?>
            <!-- <tr>
                <td>&nbsp;</td>
            </tr> -->
            <?php if (isset($usuario['docmatricula'])&& !empty($usuario['docmatricula'])): ?>

            <tr>
                <th>Documento</th>
                <td><a href="<?php echo $usuario['docmatricula'] ?>">Matricula</a>
                    
                </td>
                <td>
                    <button class="btn" onclick="hide12()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <?php endif ?>
            <tr>
                <th>Email</th>
                <td>
                    <?php echo $usuario['email'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide4()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Telefone</th>
                <td>
                    <?php echo $usuario['telefone'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide5()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Data de Nascimento</th>
                <td>
                    <?php echo date('d/m/Y', strtotime($usuario['dtnasc'])) ?>
                </td>
                <td>
                    <button class="btn" onclick="hide9()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <?php if ($_SESSION['perfil'] == '2'): ?>
            <tr>
                <th>Instituição</th>
                <td>
                    <?php echo $escola1['nome'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide6()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <?php endif ?>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    <button class="btn" onclick="hide7()">Atualizar Senha</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    <button class="btn" onclick="hide8()">Excluir cadastro</button>&nbsp;

                </td>
            </tr>
        </table>

    </div>














    <div class="overlay" id="back12">
        <div class="modal1" id="hide12">
            <div class="div_login">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <h1>Documento</h1>
                    <br>
                    <input type="file" name="docmatricula" accept=".pdf">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide12()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back1">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <h1>Foto</h1>
                    <br>
                    <input type="file" name="imagem" accept="image/png, image/jpeg">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide1()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back2">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="update.php" method="Post">
                    <h1>Nome</h1>
                    <br>
                    <input type="text" name="nome" placeholder="Informe o nome" class="input">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide2()"> Voltar</button>
            </div>
        </div>
    </div>

    <div class="overlay" id="back3">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="update.php" method="post">
                    <h1>Matrícula</h1>
                    <br>
                    <input type="tel" name="matricula" placeholder="Informe o número de matricula" class="input">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide3()"> Voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back4">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="update.php" method="post">
                    <h1>E-mail</h1>
                    <br>
                    <input type="email" name="email" placeholder="Informe o E-mail" class="input">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide4()"> Voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back5">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="update.php" method="post">
                    <h1>Telefone</h1>
                    <br>
                    <input type="tel" name="telefone" id="telefone"  maxlength="15" placeholder="Informe o Telefone" class="input">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide5()"> Voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back6">
        <div class="modal1">
            <div class="div_login">
                <form action="update.php" method="post">
                    <h1>Instituição</h1>
                    <br>
                    <select name="instituicao">
                        <?php if ($escola == "0"): ?>
                            <option value="none">none</option>
                        <?php else: ?>
                            <?php while ($row = $statement->fetch()): ?>
                                <option value="<?= $row['idinstituicoes']; ?>">
                                    <?= $row['nome']; ?>
                                </option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php $dbh = null ?>
                    </select>
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide6()"> Voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back7">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="update.php" method="post">
                    <h1>Senha</h1>
                    <br>
                    <input type="password" name="senha" placeholder="Informe a senha atual" class="input" required
                        minlength="6" maxlength="50">
                    <br>
                    <input type="password" name="pass" placeholder="Insira nova senha" class="input" required
                        minlength="6" maxlength="50">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide7()">Voltar</button>
            </div>
        </div>
    </div>

    <div class="overlay" id="back8">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="delete.php" method="post">
                    <h1>Deletar Usuário</h1>
                    <br>
                    <!-- <input type="password" name="senha" placeholder="Informe senha atual" class="input" required minlength="6" maxlength="50"> -->
                    <!-- <br> -->
                    <input type="password" name="senha" placeholder="Insira sua senha de login senha para prosseguir" class="input"
                        required minlength="6" maxlength="50">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide8()">Voltar</button>
            </div>
        </div>
    </div>

    <div class="overlay" id="back9">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="update.php" method="post">
                    <h1>Data de Nascimento</h1>
                    <br>
                    <!-- <input type="password" name="senha" placeholder="Informe senha atual" class="input" required minlength="6" maxlength="50"> -->
                    <!-- <br> -->
                    <input type="date" name="dtnasc">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide9()">Voltar</button>
            </div>
        </div>
    </div>



</body>
<script>
    function hide1() {
        var x = document.getElementById("back1");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide2() {
        var x = document.getElementById("back2");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide3() {
        var x = document.getElementById("back3");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide4() {
        var x = document.getElementById("back4");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide5() {
        var x = document.getElementById("back5");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide6() {
        var x = document.getElementById("back6");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide7() {
        var x = document.getElementById("back7");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide8() {
        var x = document.getElementById("back8");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide9() {
        var x = document.getElementById("back9");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    function hide12() {
        var x = document.getElementById("back12");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>



<?php $dbh = null; ?>

</html>