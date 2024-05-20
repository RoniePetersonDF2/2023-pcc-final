<?php

require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-chat.php';
$cp = new Chat("arte", "localhost", "root", "");
 

if(isset($_POST['email_artesao']))
{
    $email = addslashes($_POST['email_artesao']);
    $resDados = $a->buscarDadosArtesao3($email);
    $idartesao = $resDados['idartesao'];
        if(isset($idartesao)){
            header("location: edit-senha.php?id_up=$idartesao");
        }else{
            echo '<div id="mensagem">Email não encontrado </div>';
        }
 
    
}

?>

<style>
        div#mensagem {
            background-color: #63718a;
            background-image: linear-gradient(to right, red, #080e1f);
            color: #eeeeee;
            font-size: 1.5em;
            top: 100px;
            padding: 5px 98px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to top right, #001f21, #080e29);
            background-size: 100% 15px; /* faz as listras so com duas cores */
        }

        .container {
            background-color: #003f5f;
            background-image: linear-gradient(to right, #003f5f, #080e1f);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 0;
            border-radius: 15px;
            color: #fff;
        }

        .login-form {
            background-color: #003f5f;
            padding: 30px 60px;
            border-radius: 15px;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .button {
            background-color: #080e1f;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: #ffffff;
            font-size: 15px;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .button:hover {
            background-color: #bebebe;
            color: #2d3142;
            cursor: pointer;
            opacity: 1;
        }

        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        .inputSubmit {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
        }

        .inputSubmit:hover {
            background-color: deepskyblue;
            cursor: pointer;
        }

        div#mensagem {
            background-color: #63718a;
            background-image: linear-gradient(to right, red, #080e1f);
            color: #eeeeee;
            font-size: 1.5em;
            top: 100px;
            padding: 5px 98px;
        }

        .custom-button {
            background-color: #080e1a;
            color: white;
            padding: 2px 10px;
            border: none;
            border-radius: 0px;
            font-size: 1em;
            opacity: 0.7;
            text-decoration: none;
        }

        .custom-button:hover {
            background-color: #bebebe;
            color: #2d3142;
            cursor: pointer;
            opacity: 0.7;
        }
</style>

<!DOCTYPE html>
<html>
<head>
<title>Redefinir Senha</title>
</head>
    <body>
        <div class="container">
            <div class="login-form">
                <h1 style="text-align: left;">Esqueceu <br>Senha</h1>
                <br>
                <form method="POST" action="esqueceuSenha.php">
                    <input type="email" id="email_artesao" name="email_artesao" placeholder="Email" required>
                    <!-- <input type="text" name="idartesao" placeholder="idarteao" value="<?php echo $ress['idartesao']; ?>" required> -->
                    <br><br>
                    <input type="submit" nome="submit" id="submit" class="button">
                </form>
                <div style="display: flex; justify-content: space-between; width: 100%; margin-top: 1px;">
                    <a style="background-color: #080e1a; color: white; padding: 5px 10px; 
                            border: none; border-radius: 0px; font-size: 1em; opacity: 0.7; text-decoration: none;"
                            href="login.php">Voltar</a>
                </div><br>
            </div>
        </div>
    </body>
</html>
