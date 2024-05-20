<?php
session_start();
$idusuario = $_SESSION['idusuario'];
// require_once '../src/database/conexao.php';
require_once '../src/dao/instituicaoDAO.php';

$dbh = conexao::getConexao();


$dao = new InstituicaoDAO();
$rows = $dao->getAllInstituicoes();

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
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/style_options.css">
    <link rel="stylesheet" href="../assets/css/list_format.css">
    <link rel="stylesheet" href="../assets/css/popup.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>dados</title>
</head>

<body>
    
<header class="header_menu">
        <div class="div_menu">
            <a href="index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="adm.php">voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php
if(isset($_GET['error']) || isset($_GET['msg']) ) { ?>
            <script>
                Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg');?>',
                title: 'Perfil',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error']: $_GET['msg']); ?>',
                })
            </script>
        <?php } ?>

<section>
         <div>
                    <table border="0" class="table" style="width:100vw;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Slogan</th>
                                <th>Email</th>
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Sigla</th>
                                <!-- <th>descrição</th> -->

                                <th>Logo</th>

                                <th>Facebook</th>
                                <th>Instagram</th>

                                <th>Moderador</th>
                                <th>Moderador Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$rows) : ?>
                                <tr>
                                    <td colspan="6"><strong>Não existem dados cadastrados.</strong></td>
                                </tr>
                                <?php else : $count = 1;
                                foreach ($rows as $row) :  ?>
                                    <tr>
                                        <td><?= $count++;  ?></td>
                                        <td><?= $row["instname"]?></td>
                                        <td><?= $row["slogan"] ?></td>
                                        <td><?= $row["instemail"] ?></td>
                                        <td><?= $row["cep"] ?></td>
                                        <td><?= $row["cidade"] ?></td>
                                        <td><?= $row["endereco"] ?></td>
                                        <td><?= $row["telefone"] ?></td>
                                        <td><?= $row["sigla"] ?></td>
                                        <!-- <td><?= $row["descricao"] ?></td> -->
                                        <td><a href="<?= $row["logo"]?>">Logo</a></td>

                                        <td><a href="<?= $row["facebook"] ?>"><?= $row["facebook"] ?></a></td>
                                        <td><?= $row["instagram"] ?></td>
                                        <td><?=$row["username"] ?></td>
                                        <td><?=$row["useremail"] ?></td>
                                        <td>
                                            <div style="display:flex;">
                                                <a href="admeditinstituicoes.php?id=<?= $row['idinstituicoes'] ?>" class="btn">Editar</a>&nbsp;
                                                <form action="delete.php" method="post">
                                                    <input type="hidden" name="idinstituicao" value="<?= $row['idinstituicoes']?>">
                                                    <button class="btn" name="botao" value="deletar" onclick="return confirm('Deseja excluir o Forum?');">Apagar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>

        
</body>



<?php $dbh = null; ?>

</html>