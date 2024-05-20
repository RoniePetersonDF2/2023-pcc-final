<?php
session_start();
$idusuario = $_SESSION['idusuario'];
// require_once '../src/database/conexao.php';
require_once '../src/dao/materialDAO.php';

$dbh = conexao::getConexao();


$dao = new MaterialDAO();
$rows = $dao->getAllMaterial();

if(($_SESSION['perfil']=='2')){

    header('location:../material/index.php?msg=Você Não Tem Permissão para Acessar a Página.');

}


#echo var_dump($usuario);

// if(isset($_GET['edit']) && !empty($_GET['edit'])){
//     if ($_GET['edit'] = 'nome'){
//         echo '   <div class="overlay"></div>
//         <div class="modal">
//             <div class="div_login">
//                 <form action="opcao.html" method="get">
//                     <h1>Login</h1>
//                     <br>
//                     <input type="text" name="name" placeholder="Nome" class="input">
//                     <br><br>
//                     <input type="password" name="password" placeholder="Senha" class="input">
//                     <br><br>
//                     <button class="button">Enviar</button>
//                 </form>
//             </div>
//         </div>';

//     }
// }


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
    <link rel="stylesheet" href="../assets/css/list_format_2.css">
    <link rel="stylesheet" href="../assets/css/popup.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>Dados</title>
</head>

<body>
    
<header class="header_menu">
        <div class="div_menu">
            <a href="index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="adm.php">Voltar</a></li>
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
                    <table border="0" class="table" style="width:100vw;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <!-- <th>descrição</th> -->
                                <!-- <th>Tipo</th> -->
                                <!-- <th>Assunto</th> -->
                                <th>Proprietario Nome</th>
                                <th>Proprietario E-mail</th>
                                <th>Material</th>
                                <th>Ação</th>
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
                                        <td><?= $row["titulo"] ?></td>
                                        <!-- <td><?= $row["descricao"] ?></td> -->
                                        <!-- <td><?= $row["tipo"]?></td> -->
                                        <!-- <td><?= $row["assunto"] ?></td> -->
                                        <td><?= $row["nome"] ?></td>
                                        <td><?= $row["email"] ?></td>
                                        <td><a href="<?= $row["endereco"] ?>" target="_blank">Material</a></td>
                                        <td>
                                            <div class="table" style="display:flex;">
                                                <a href="admeditmaterial.php?id=<?= $row['idmaterial'] ?>" class="btn">Editar</a>&nbsp;
                                                <form action="../material/deletematerial.php" method="post">
                                                    <input type="hidden" name="idmaterial" value="<?= $row['idmaterial'] ?>" />
                                                    <button class="btn" name="botao" value="deletar" onclick="return confirm('Deseja excluir o material?');">Apagar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            endif ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>
</body>



<?php $dbh = null; ?>

</html>