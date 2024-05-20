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
    <script src="../assets/js/mask.js" defer></script>



    <title>Cadastro Docente</title>
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
                                <input type="text" name="nome" placeholder="Nome Completo" maxlength="50" required
                                    class="input_nome">
                                <!-- <input type="text" name="sobrenome" placeholder="Sobrenome" required maxLength="50" class="input_nome"> -->

                                <br>

                                <label for="email">E-mail</label>
                                <input type="email" name="email" placeholder="Informe Seu E-mail" required>

                                <br>

                                <label for="senha">Senha</label>
                                <input type="password" name="senha" minlength="6" maxlength="50"
                                    placeholder="Crie uma Senha" required>

                                <br>
                                <label for="telefone">Telefone</label>
                                <!-- <input class="ddd" type="tel" name="ddd" minlength="2" maxlength="2" placeholder="DDD" required> -->
                                <input type="tel" name="telefone" minlength="11" maxlength="15" id="telefone"
                                    placeholder="Informe Seu Número de Telefone" required>

                                <br>

                                <label for="dtnasc">Data de nascimento</label>
                                <input type="date" name="dtnasc" required>

                                <br>
                                <label for="imagem">Foto</label>
                                <input type="file" name="imagem" accept="image/png, image/jpeg" required>
                                <br>
                                <label for="docdocente">Documento Docente</label>
                                <input type="file" name="docdocente" accept=".pdf" required>
                                <input type="hidden" name="perfil" value="docente">



                                <button type="submit">Enviar</button>
                            </form>
                        </div>

                    </fieldset>
                </div>
                <div class="main_cadastro_img">
                    <img src="../assets/img/docente.svg" alt="" width="750" height="500">
                </div>
            </div>
        </div>
    </main>
</body>


</html>