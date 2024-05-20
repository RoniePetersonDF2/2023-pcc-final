<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Criar Fórum</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>
            <nav class="nav_menu">
            <ul>
                    <li><a href="foruns.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="login">

        <div class="main_login">
            <div class="main_login_content">
                <div class="main_login_form">

                    <form action="forumadd.php" method="POST"  enctype="multipart/form-data">
                        <div class="main_login_cabeçalho">
                            <h1>Ficha do Fórum</h1>
                        </div>
                        <div class="main_login_input">
                            <input type="text" name="titulo_forum" placeholder="Título" class="size">
                            <textarea name="descricao_forum" placeholder="Descrição" id="" cols="45" rows="7"></textarea>
                           <br>
                            <select name="categoria_forum" id="">
                            <option value="Saúde e Bem-Estar">Saúde e Bem-Estar</option>
                            <option value="Arte e Cultura">Arte e Cultura</option>
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
                            <option value="Educação e Aprendizado">Educação e Aprendizado</option>
                            <option value="Física e Matemática">Física e Matemática</option>
                            <option value="Tecnologia e Gadgets">Tecnologia e Gadgets</option>
                            </select>
                        </div>
                        <button type="submit"><b>Enviar</b></button>
                    </form>
                    

                </div>

                <div class="main_login_img">
                    <img src="../assets/img/forum.svg" alt="Adcionando Fórum" width="750" height="500">
                </div>
            </div>
        </div>
    </main>

</body>

</html>