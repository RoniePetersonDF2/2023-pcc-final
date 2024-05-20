<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>login</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>
            <nav class="nav_menu">
            <ul> 

            <li><a href="../index.php">Voltar</a></li>

            </ul>
            </nav>
        </div>
    </header>
    <?php
if(isset($_GET['error']) || isset($_GET['msg']) ) { ?>
            <script>
                Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg');?>',
                title: 'Login',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error']: $_GET['msg']); ?>',
                })
            </script>
        <?php } ?>
    <main class="login">

        <div class="main_login">
            <div class="main_login_content">
                <div class="main_login_form">

                    <form action="alunologincontrole.php" method="POST">
                        <div class="main_login_cabeçalho">
                            <h1>Login</h1>
                        </div>
                        <div class="main_login_input">
                            <input type="text" name="email" placeholder="Email" class="size">
                            <input type="password" name="senha" placeholder="Senha" class="size">
                        </div>
                        <button type="submit"><b>Entrar</b></button>
                        <p class="ali-rig"><a href="senha.php" class="senha">Esqueci minha senha</a></p>
                        <p class="ali-rig"><a href="../usuario/index.php" class="senha">Não possuo cadastro</a></p>
                    </form>
                </div>

                <div >
                    <img src="../assets/img/login.svg" alt="" width="750" height="500">
                </div>
            </div>
        </div>
    </main>

</body>

</html>