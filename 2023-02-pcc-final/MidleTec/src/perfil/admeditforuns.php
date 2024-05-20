<?php
session_start();

require_once '../src/dao/materialDAO.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];
$dao = new MaterialDAO();
$foruns = $dao->getForum($id);
// $query = "SELECT * from midletech.material where material.idmaterial = '$id'";
// $statement = $dbh->query($query);
// $material = $statement->rowCount();

if (($_SESSION['perfil'] == '2')) {

    header('location:../material/index.php?msg=Você Não tem permissão para acessar a página.');
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/list_format.css">
    <link rel="stylesheet" href="../assets/css/style_options.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="../assets/js/menu.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>Editar Fórum</title>
</head>

<body>
    <section>
        <header>
            <h2 class="list_title">Dados do Fórum</h2>
        </header>
        <div class="list_container">
            <form method="post" action="update.php" style=width:50%>
                <input type="hidden" name="idforum" value="<?= $foruns['idforum'] ?>">
                <div>
                    <label>Título</label>
                    <input class="input" type="text" name="titulo" value="<?= $foruns['titulo'] ?>" size="60" required autofocus>
                </div>
                <br>
                <div>
                    <label>Descrição</label>

                    <textarea name="descricao" id="" cols="30" rows="10" required autofocus><?= $foruns['descricao'] ?></textarea>
                </div>
                <br>
                <div>
                    <label>Categoria</label>
                    <select name="categoria">
                        <option value="<?php echo $foruns['categoria']; ?>"><?php echo $foruns['categoria']; ?></option>
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
                        <option value="Tecnologia e Gadgets">Tecnologia e Gadgets</option>
                        <option value="Física e Matemática">Física e Matemática</option>
                        <option value="Educação e Aprendizado">Educação e Aprendizado</option>
                    </select>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn">Salvar</button>
                    <a href="admforuns.php" class="btn">Voltar</a>
                </div>
            </form>

        </div>
    </section>
</body>

</html>