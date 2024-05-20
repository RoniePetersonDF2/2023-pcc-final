<?php
session_start();

require_once 'ClasseLogin.php';
$pdoLogin = new PDO('mysql:host=localhost;dbname=arte', 'root', '');
$pdoLogin->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilitar exceções
$classeLogin = new ClasseLogin($pdoLogin);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $perfil = $classeLogin->realizarLogin($email, $senha);

    // header("Location: opcao.php");

    // var_dump($perfil);

    
    if (is_string($perfil))
    {
        
        $_SESSION['perfil'] = $perfil;
        // if($perfil !== 'use' && $perfil !== 'adm'){
        //     echo "Você não tem permisão para acessar, talvez sua assinatura tenha inspirado";
        //     header("Location: login.php");
        //     exit(); 
        // }
        // else
        {
            $_SESSION['perfil'] = $perfil;
            $_SESSION['email'] = $email;
            
            if ($perfil === 'adm') {
                header("Location: opcaoAdm.php");
                exit();
            } 
            elseif ($perfil === 'use') {
                header("Location: opcao.php");
                exit();
            } 
            elseif ($perfil === 'off') {
                // echo '<div id="mensagem"> Assinatura expirada </div>';
                // $_SESSION = array();
                // session_destroy();
                header("Location: opcao.php");
                exit();
            } 
            else {
                echo '<div id="mensagem"> Email e/ou senha inválido </div>';
                $_SESSION = array();
                session_destroy();
            }
        }
    }
}
?>

<style>
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
<title>Login</title>
</head>
    <body>
        <div class="container">
            <div class="login-form">
                <h1 style="text-align: left;">Login</h1>
                <br>
                <form method="POST" action="login.php">
                    <input type="email" name="email" placeholder="Email" required>
                    <br><br>
                    <input type="password" name="senha" placeholder="Senha" maxlength="10" required>
                    <br><br>
                    <input type="submit" value="Entrar" class="button">
                    <a style="color: white; padding: 5px; border: none; border-radius: 0px; font-size: 1em; opacity: 0.7; text-decoration: none;"
                                href="esqueceuSenha.php">Esqueceu a senha?</a>
                </form>
                <!-- <div style="display: flex; justify-content: space-between; width: 100%; margin-top: 1px;"> -->
                    
                <!-- </div> -->
                <div style="display: flex; justify-content: space-between; width: 100%; margin-top: 1px;">
                    <a style="background-color: #080e1a; color: white; padding: 5px 10px; 
                            border: none; border-radius: 0px; font-size: 1em; opacity: 0.7; text-decoration: none;"
                            href="logout.php">Voltar</a>
                    <a style="background-color: #080e1a; color: white; padding: 5px 10px; 
                            border: none; border-radius: 0px; font-size: 1em; opacity: 0.7; text-decoration: none;"
                            href="listacoop.php">Cadastre-se</a>
                </div><br>
            </div>
        </div>
    </body>
</html>
