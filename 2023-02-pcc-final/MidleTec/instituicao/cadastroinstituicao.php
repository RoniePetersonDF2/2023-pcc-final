<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/mask.js" defer></script>

    <title>Cadastro Instituição</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>
            <nav class="nav_menu">
            <ul>
                    <li><a href="../material/index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="login">

        <div class="main_login">
            <div class="main_login_content">
                <div class="main_login_form">

                    <form action="instituicaoADD.php" method="POST"  enctype="multipart/form-data">
                        <div class="main_login_cabeçalho">
                            <h1>Ficha da Instituição</h1>
                        </div>
                        <div class="main_login_input">
                            <input type="text" name="nome" placeholder="Nome da Instituição" class="size" required>
                            <input type="text" name="slogan" placeholder="Slogan da Instituição" class="size">
                            <textarea class="size" name="descricao" placeholder="Sobre a Instituição" cols="45" rows="7"></textarea>
                            <input type="text" name="cep" placeholder="CEP da Instituição" class="size"required>
                            <input type="text" name="cidade" placeholder="Cidade da Instituição" class="size"required>
                            <input type="text" name="endereco" placeholder="Endereço da Instituição" class="size"required>
                            <input type="tel" name="telefone" placeholder="Telefone da Instituição" class="size" required maxLength="15" id="telefone">
                            <input type="email" name="email" placeholder="Email da Instituição" class="size" required>
                            <input type="text" name="sigla" placeholder="Sigla da Instituição" class="size">
                            <input type="text" name="facebook" placeholder="Facebook da Instituição" class="size">
                            <input type="text" name="instagram" placeholder="Instagram da Instituição" class="size">

                            <label for="logo">Logo</label>
                            <input type="file" name="imagem" accept="image/png, image/jpeg" placeholder="Faça o upload da logo" required>
                        </div>
                        <button type="submit"><b>Enviar</b></button>
                    </form>
                    

                </div>

                <div class="main_login_img">
                    <img src="../assets/img/instituicao.svg" alt="Adcionando Artigo" width="750" height="500">
                </div>
            </div>
        </div>
    </main>

</body>

</html>