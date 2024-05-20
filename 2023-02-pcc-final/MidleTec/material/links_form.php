<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    

    <title>Adicionar Link</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>
            
            <nav class="nav_menu">
            <ul>
                    <li><a href="links.php">Voltar</a></li>
            </ul>
            </nav>
        </div>
    </header>

    <main class="login">

        <div class="main_login">
            <div class="main_login_content">
                <div class="main_login_form">

                    <form action="linkadd.php" method="POST">
                        <div class="main_login_cabeçalho">
                            <h1>Ficha do Material</h1>
                        </div>
                        <div class="main_login_input">
                            <input type="text" name="titulo_link" placeholder="Título" class="size">
                            <textarea name="descricao_link" placeholder="Descrição" id="" cols="30" rows="05"></textarea>
                            <input type="text" name="assunto_link" placeholder="Assunto" class="size">
                            <input type="link" name="link" placeholder="Insira o Link">
                        </div>
                        <button type="submit"><b>Enviar</b></button>
                    </form>
                    

                </div>

                <div class="main_login_img">
                    <img src="../assets/img/addlink.svg" alt="Recuperação de Senha" width="750" height="500">
                </div>
            </div>
        </div>
    </main>

</body>

</html>