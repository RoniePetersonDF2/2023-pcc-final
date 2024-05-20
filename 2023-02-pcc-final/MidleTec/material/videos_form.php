<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/video.css">



    <title>Adicionar Video</title>
</head>

<body>
    <header class="header_menu">
        <div class="div_menu">

            <a href="../index.php" class="logo"><img src="../assets/img/logo.png" alt="logo" class="logo_img"></a>
            <div class="spacer"></div>
            <nav class="nav_menu">
            <ul>
                    <li><a href="videos.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="login">

        <div class="img_fundo">
            <div class="main_login">
                <div class="main_login_content">
                    <div class="main_login_form">
                        
                        <div class="container" id="container">
                            <div class="form-container sign-up-container">
                                <form action="videosadd.php" method="POST" enctype="multipart/form-data" class="formulario">
                                    <div class="main_login_cabeçalho">
                                        <h1>Ficha do Material</h1>
                                    </div>
                                    <h2>arquivo de video</h2>
                                    <div class="main_login_input">
                                        <input type="text" name="titulo_video" placeholder="Título" class="size">
                                        <textarea name="descricao_video" placeholder="Descrição" cols="45" rows="7"></textarea>
                                        <input type="text" name="assunto_video" placeholder="Assunto" class="size">
                                        <!-- <input type="link" name="link_video" placeholder="Insira o Link"> -->
                                        <input type="file" name="video" accept=".mp4"
                                            placeholder="Faça o upload">
                                            <button type="submit" class="button"><b>Enviar</b></button>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <div class="form-container sign-in-container">
                                <form action="ytbvidadd.php" method="POST" enctype="multipart/form-data" id="formulario" class="formulario">
                                    <div class="main_login_cabeçalho">
                                        <h1>Ficha do Material</h1>
                                    </div>
                                    <h2>youtube video</h2>
                                    <div class="main_login_input">
                                        <input type="text" name="titulo_video" placeholder="Título" class="size">
                                        <textarea name="descricao_video" placeholder="Descrição" cols="45" rows="7"></textarea>
                                        <input type="text" name="assunto_video" placeholder="Assunto" class="size">
                                        <input type="link" name="link_video" placeholder="Insira o Link">
                                        <!-- <input type="file" name="video" accept="image/png, image/jpeg" placeholder="Faça o upload"> -->
                                        <button type="submit"><b>Enviar</b></button>
                                    </div>
                                </form>
                                <br>
                            </div>
                            <div class="overlay-container">
                                <div class="overlay">
                                    <div class="overlay-panel overlay-left">
                                        <h2>Quer enviar um video do youtube?</h2>
                                        <p>Clique no butão abaixo e preencha o formulário</p>
                                        <button class="bnt" id="signIn" onclick="esconder()">Video youtube</button>
                                    </div>
                                    <div class="overlay-panel overlay-right">
                                        <h2>Quer Enviar um arquivo de video?</h2>
                                        <p>Clique no botão abaixo e preencha o formulário</p>
                                        <button class="bnt" id="signUp" onclick="esconder()">Arquivo de Video</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main_login_img">
                        <!-- <img src="../assets/img/addvideo.svg" alt="Adicionando Video" width="750" height="500"> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--  -->
    <script src="../assets/js/form switch.js"></script>

    <script>
        function esconder() {
            var x = document.getElementById("formulario");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <!-- <script>
function myFunction1() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "initial") {
    x.style.display = "block";
  } else {
    x.style.display = "initial";
  }
}
</script> -->
</body>

</html>