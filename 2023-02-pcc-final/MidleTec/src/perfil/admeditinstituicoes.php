<?php
session_start();

require_once '../src/dao/instituicaoDAO.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];
$dao = new InstituicaoDAO();
$instituicao = $dao->getInst($id);
// $query = "SELECT * from midletech.material where material.idmaterial = '$id'";
// $statement = $dbh->query($query);
// $material = $statement->rowCount();

if (($_SESSION['perfil'] == '2')) {

    header('location:../material/index.php?msg=Você não tem permissão para acessar a página.');

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



    <title>Editar Fórum</title>
</head>

<body>
    <section>
        <header>
            <h2>Fórum</h2>
        </header>
        <div>
            <form method="post" action="../instituicao/updateinstituicao.php">
                <input type="hidden" name="idinstituicao_adm" value="<?= $instituicao['idinstituicoes'] ?>">
                <div>
                    <label for="nome_inst">nome</label>
                    <input class="input" type="text" name="nome_inst" value="<?= $instituicao['nome'] ?>" size="60" required
                        autofocus>
                    <label for="slogan_inst">Slogan</label>
                    <input class="input" type="slogan" name="slogan_inst" value="<?= $instituicao['slogan'] ?>" size="100"
                        required autofocus>

                    <label for="descricao_inst">Descriçao</label>

                    <textarea name="descricao_inst" id="" cols="30" rows="10" required
                        autofocus><?= $instituicao['descricao'] ?></textarea>
                    <label for="email_inst">Email</label>
                    <input type="email" name="email_inst" value="<?= $instituicao['email'] ?>">
                    <label for="sigla_inst">Sigla</label>
                    <input type="text" name="sigla_inst" value="<?= $instituicao['sigla'] ?>">
                    <label for="telefone_inst">Telefone</label>
                    <input type="tel" name="telefone_inst" value="<?= $instituicao['telefone'] ?>">
                    <label for="cep_inst">CEP</label>
                    <input type="number" name="cep_inst" value="<?= $instituicao['cep'] ?>">
                    <label for="endereco_inst">Endereço</label>
                    <input type="text" name="endereco_inst" value="<?= $instituicao['endereco'] ?>">
                    <label for="cidade_inst">Cidade</label>
                    <input type="text" name="cidade_inst" value="<?= $instituicao['cidade'] ?>">
                    <label for="facebook_inst">Facebook</label>
                    <input type="url" name="facebook_inst" value="<?= $instituicao['facebook'] ?>">
                    <label for="instagram_inst">Instagram</label>
                    <input type="url" name="instagram_inst" value="<?= $instituicao['instagram'] ?>">

                </div>

                <button type="submit" class="btn">Salvar</button>
                <a href="index.php" class="btn">Voltar</a>
        </div>
        </form>

        </div>
    </section>
</body>

</html>