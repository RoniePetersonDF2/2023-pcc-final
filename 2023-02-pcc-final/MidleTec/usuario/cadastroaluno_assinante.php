<?php
require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();

$query = "SELECT * FROM midletech.instituicoes;";

$statement = $dbh->query($query);

$escola = $statement->rowCount();

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Cadastro Aluno</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>
            <nav class="nav_menu">
            <ul> 

            <li><a href="index.php">Voltar</a></li>

            </ul>
            </nav>
        </div>
    </header>

    <main class="login">

        <div class="main_login">
            <div class="main_login_content">
                <div class="main_login_form">

                    <fieldset>
                        <div class="main_login_cabeçalho">
                            <h1>Cadastro</h1>
                        </div>

                        <div class="main_login_input">
                            <form action="CadastroADD.php" method="POST" enctype="multipart/form-data">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" placeholder="Nome Completo" maxlength="50" required class="input_nome">
                                <!-- <input type="text" name="sobrenome" placeholder="Sobrenome" required maxLength="50" class="input_nome"> -->

                                <br>

                                <label for="email">E-mail</label>
                                <input type="email" name="email" placeholder="Informe Seu E-mail" required>

                                <br>
                               
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" minlength="6" maxlength="50" placeholder="Crie uma Senha" required>

                                <br>
<!-- 
                                <label for="matricula">Matrícula</label>
                                <input type="number" name="matricula" placeholder="Informe Seu Número de Matrícula" required> -->

                                <!-- a matricula consiste em 9 numeros. não é possivel usar maxLength e minlength em input type="number".-->
                                <br>

                                <label for="telefone">Telefone</label>
                                <!-- <input class="ddd" type="tel" name="ddd" minlength="2" maxlength="2" placeholder="DDD" required> -->
                                <input type="tel" name="telefone" minlength="11" maxlength="11" placeholder="Informe Seu Número de Telefone" required>

                                <br>

                                <label for="dtnasc">Data de nascimento</label>
                                <input type="date" name="dtnasc" required>

                                <br>
                                <label for="imagem">Foto</label>
                                <input type="file" name="imagem" accept="image/png, image/jpeg">
                                <input type="hidden" name="perfil" value="aluno_assinate">

                        </div>

                        <button type="submit">Enviar</button>
                        </form>
                    </fieldset>
                </div>
                <div class="main_cadastro_img">
                        <img src="../assets/img/cadastro.svg" alt="" width="750" height="500">
                    </div>
            </div>
        </div>
    </main>
    <?php
if(isset($_GET['error']) || isset($_GET['msg']) ) { ?>
            <script>
                Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg');?>',
                title: 'Cadastro',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error']: $_GET['msg']); ?>',
                })
            </script>
        <?php } ?>
</body>

</html>