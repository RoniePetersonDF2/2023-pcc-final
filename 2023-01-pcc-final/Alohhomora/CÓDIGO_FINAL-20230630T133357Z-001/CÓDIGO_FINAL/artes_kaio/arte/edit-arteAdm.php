<?php
require_once '../classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");
require_once '../classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-arte.php';
$ar = new Arte("arte", "localhost", "root", "");

session_start();

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'adm') {
    header("Location: ../logout2.php");
    exit();
}

if(isset($_GET['id_a'])) //"editar" da listaArtesAdm.php
{
    $id_arte = addslashes($_GET['id_a']);
    $ress = $ar->buscarDadosArte($id_arte);
}

if(isset($_POST['submit'])){
        $idarte = addslashes($_GET['id_a']);
        $nome_img = addslashes($_POST['nome_img']);
        $descricao_arte = addslashes($_POST['descricao_arte']);

    if(!empty($nome_img) && !empty($descricao_arte)){
        if ($ar->atualizarArte($idarte, $nome_img, $descricao_arte)) {
            $atualizacaoSucesso = true;
            header("location: listaArtesAdm.php");
        }else{header("location: listaArtesAdm.php");}
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <link href="../css/formulario.css" rel="stylesheet">
    <link href="../css/lista.css" rel="stylesheet">
    <script type="text/javascript" src="js/modal.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <title>Cadastro Artesão</title>
</head>

<body>
    <header class="main_header">
        <div class="main_header_content">
            <div class="listagem_info">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <samp class="icon-blog">Editar Arte</samp>
            </div>
            <a href="listaArtesAdm.php" class="btn">Retornar</a>
        </div>
    </header>

    <style>
        .btnform {
            background-color: #fd4a4a;
            border: none;
            color: #ffffff;
            top: 1000px;
            padding: 0 0;
            align-items: center;
            opacity: 1;
            border-radius: 2px;
        }

        .btnform:hover {
            background-color: #fd4a4a;
            color: #ffffff;
            cursor: pointer;
            opacity: 0.9;
        }

        .main_cta {
            width: 100%;
            background-image: url('../IMG/bg_main_home.png');
            background-color: #2d3142;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }

        div#mensagem {
            background-color: #63718a;
            background-image: linear-gradient(to right, red, #080e1f);
            color: #eeeeee;
            font-size: 1.5em;
            top: 100px;
            padding: 5px 98px;
        }
    </style>

    <main>
        <div class="box">
            <form action="" method="post">
                <fieldset>
                    <legend><b>Cadastrar Arte</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome_img" id="nome_img" class="inputUser" value="<?php echo $ress['nome_img']; ?>" maxlength="30" required>
                        <label for="nome_img" class="labelInput">Nome Arte</label>
                    </div>
                    <br><br>
                    
                    <div class="inputBox">
                        <textarea type="text" name="descricao_arte" id="descricao_arte" class="inputUser" maxlength="250" 
                        placeholder="Faça uma descrição de até 250 caracteres" required><?php echo $ress['descricao_arte']; ?></textarea>
                    </div>
                    <br><br>
                    
                    <div class="btn_alinhamento">
                        <input type="submit" name="submit" id="submit" value="Editar">
                    </div>
                    <br>
                </fieldset>
            </form>
        </div>
    </main>
</body>

</html>
