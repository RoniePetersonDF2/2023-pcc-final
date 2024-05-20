<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/boot.css">
    <link rel="stylesheet" href="css/style.css">

    <title>login</title>
</head>

<body>

    <main>
        <?php include_once "nav.html"; ?>

        <div class="div2 ">
            <header>
                <h1>Login</h1>
                <form method="POST">
                    <input type="text" name="matricula" placeholder="Aluno" class="size">

                    <input type="password" name="senha" placeholder="Senha" class="size">
                    <button type="submit"><b>Entrar</b></button>
                </form>
                <p class="ali-rig"><a href="#" class="link1">Recuperar Senha</a></p>
            </header>
        </div>
    </main>
</body>

</html>