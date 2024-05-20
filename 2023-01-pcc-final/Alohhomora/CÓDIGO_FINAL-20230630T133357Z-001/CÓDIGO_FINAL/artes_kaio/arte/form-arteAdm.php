<?php
require_once '../classe-cooperativa.php';
require_once '../classe-artesao.php';
require_once 'classe-arte.php';

$c = new Cooperativa("arte", "localhost", "root", "");
$a = new Artesao("arte", "localhost", "root", "");
$ar = new Arte("arte", "localhost", "root", "");

session_start();

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'adm') {
    header("Location: ../logout2.php");
    exit();
}

$email = $_SESSION['email'];
$resDados = $a->buscarDadosArtesao3($email);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTemp = $_FILES['imagem']['tmp_name'];
        $nome_arte = $_FILES['imagem']['name'];
        $nome_img = addslashes($_POST['nome_img']);
        $descricao_arte = addslashes($_POST['descricao_arte']);
        $idartesao = addslashes($_POST['idartesao']);
        $idcoop = addslashes($_POST['idcoop']);

        $extensao = strtolower(pathinfo($nome_arte, PATHINFO_EXTENSION));
        if ($extensao === 'png' || $extensao === 'jpeg' || $extensao === 'jpg') {
            if ($_FILES['imagem']['size'] <= 2 * 1024 * 1024) {
                $caminhoImagem = 'arteaqui/' . basename($nome_arte);
                if (move_uploaded_file($imagemTemp, $caminhoImagem)) {
                    if ($ar->criarArte($nome_arte, $nome_img, $descricao_arte, $idartesao, $idcoop)) {
                        echo '<div id="mensagem"> Arte inserida com sucesso! </div>';
                    } else {
                        echo '<div id="mensagem"> Erro ao inserir a arte. </div>';
                    }
                } else {
                    echo '<div id="mensagem"> Erro ao mover a imagem. </div>';
                }
            } else {
                echo '<div id="mensagem"> O tamanho da imagem excede o limite de 2MB. </div>';
            }
        } else {
            echo '<div id="mensagem"> Formato de arquivo inválido. Apenas imagens PNG e JPEG são permitidas. </div>';
        }
    } else {
        echo '<div id="mensagem"> Nenhum arquivo enviado. </div>';
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
                <samp class="icon-blog">Cadastrar Arte</samp>
            </div>
            <a href="../opcaoAdm.php" class="btn">Retornar</a>
            <a href="listaArtesAdm.php" class="btn">Todas as Artes</a>
            <a href="../logout.php" class="btn">Página Inicial</a>

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
            <form action="form-arteAdm.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend><b>Cadastrar Arte</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome_img" id="nome_img" class="inputUser" maxlength="30" required>
                        <label for="nome_img" class="labelInput">Nome Arte</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <textarea type="text" name="descricao_arte" id="descricao_arte" class="inputUser" maxlength="250" 
                        placeholder="Faça uma descrição de até 250 caracteres" required></textarea>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="file" name="imagem" id="imagem" accept="image/png, image/jpeg" required>
                        <label for="imagem" class="labelInput">Sua arte:</label>
                    </div>
                    <br>
                    <input type="hidden" name="idartesao" id="idartesao" value="<?php echo $resDados['idartesao']; ?>" required>
                    <input type="hidden" name="idcoop" id="idcoop"  value="<?php echo $resDados['idcoop']; ?>" required>
                    <br>
                    <div class="btn_alinhamento">
                        <input type="submit" name="submit" id="submit" value="Cadastrar Arte">
                    </div>
                    <br>
                </fieldset>
            </form>
        </div>
    </main>
</body>

</html>
