<?php 
session_start();
require_once '../src/dao/materialDAO.php';

        if(!isset($_GET['id'] ) || empty($_GET['id'])){
            header('location:index.php');
        }
 $id = $_GET['id'];
 $dao = new MaterialDAO();
 $material = $dao->getMaterial($id);
// $query = "SELECT * from midletech.material where material.idmaterial = '$id'";
// $statement = $dbh->query($query);
// $material = $statement->rowCount();

if(($_SESSION['perfil']=='2')){

    header('location:../material/index.php?msg=Você Não Tem Permissão para Acessar a Página.');

}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <link rel="stylesheet" href="../assets/css/style_options.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="../assets/js/menu.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>Editar Material</title>
</head>
<body>
<section>
            <header >
                <h2 class="list_title">Material</h2>
            </header>
            <div class="list_container">
                <form method="post" action="../material/updatematerial.php" style=width:50%>
                    <input type="hidden" name="idmaterial" value="<?=$material['idmaterial']?>">
                    <div >
                        <label>Titulo</label>
                        <input class="input" type="text" name="titulo" value="<?=$material['titulo']?>" size="60" required autofocus>
                    </div>
                    <div >
                        <label>Descriçao</label>
                        <input class="input" type="text" name="descricao" value="<?=$material['descricao']?>" size="60" required autofocus>
                    </div>
                    <div >
                        <label>Assunto</label>
                        <input class="input" type="text" name="assunto" value="<?=$material['assunto']?>" size="60" required autofocus>
                    </div>

                    <div>
                        <button type="submit" class="btn">Salvar</button>
                        <a href="admmateriais.php" class="btn">Voltar</a>
                    </div>
                </form>

            </div>
        </section>
</body>
</html>