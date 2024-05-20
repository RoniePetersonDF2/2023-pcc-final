<?php
session_start();
require_once '../src/dao/usuariodao.php';
require_once '../src/dao/perfildao.php';
$dbh = conexao::getConexao();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];
$perfilDAO = new PerfilDAO();
$rows = $perfilDAO->getAll();
$dao = new AlunoDAO();
$usuario = $dao->getById($id);
$query = "SELECT * from midletech.instituicoes;";
$statement = $dbh->query($query);
$escola = $statement->rowCount();

if (($_SESSION['perfil'] != '1')) {

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
    <link rel="stylesheet" href="../assets/css/list_format.css">
    <link rel="stylesheet" href="../assets/css/style_options.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="../assets/js/menu.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>Editar Usuário</title>
</head>

<body>
    <section>
        <header>
            <h3 class="list_title">Informações do Usuário</h2>
        </header>

        <div class="list_container">

            <form method="post" action="update.php" class="novo__form" style=width:50%>
                <input type="hidden" name="admid" value="<?= $usuario['idusuario'] ?>">
                <div>
                    <label>Nome</label>
                    <input class="input" type="text" name="admnome" value="<?= $usuario['nome'] ?>" size="60" required autofocus>
                </div>
                <br>
                <div>
                    <label>Matrícula</label>
                    <input class="input" type="number" name="admmatricula" value="<?= $usuario['matricula'] ?>" size="60"  autofocus>
                </div>
                <br>
                <div>
                    <label>Instituição</label>
                    <select name="adminstituicao" id="">
                    <option value=""></option>
                    <?php if ($escola == "0"): ?>
                            <option value="none">none</option>
                        <?php else: ?>
                            <?php while ($row1 = $statement->fetch()): ?>
                                <option value="<?= $row1['0']; ?>" <?php if ($row1['0']==$usuario['instituicao']): ?> selected <?php endif ?>>
                                    <?= $row1['nome']; ?>
                                </option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php $dbh = null ?>
               </select>
                </div>
                <br>
                <div>
                    <label>Telefone</label>
                    <input class="input" type="tel" name="admtelefone" value="<?= $usuario['telefone'] ?>" size="60" required autofocus>
                </div>
                <br>
                <div>
                    <label>E-mail</label>
                    <input type="email" name="admemail" placeholder="Informe o e-mail do usuário." value="<?= $usuario['email'] ?>" required>
                </div>
                <br>
                <div>
                    <label>Status</label>
                    <select name="status">
                        <option value="1" <?= $usuario['status'] == '1' ? 'selected' : '' ?>>ATIVO</option>
                        <option value="0" <?= $usuario['status'] == '0' ? 'selected' : '' ?>>INATIVO</option>
                    </select>
                </div>
                <br>
                <div>
                    <label>Perfil</label>
                    <select name="perfil">
                        <?php foreach ($rows as $row) : ?>
                            <option value="<?= $row['idperfil'] ?>" <?php if ($row['0'] == $usuario['userperfil'] ):?> selected <?php endif ?>><?= $row['nome'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn">Save</button>
                    <a href="admusuarios.php" class="btn">Voltar</a>
                </div>
            </form>

        </div>

    </section>
</body>

</html>