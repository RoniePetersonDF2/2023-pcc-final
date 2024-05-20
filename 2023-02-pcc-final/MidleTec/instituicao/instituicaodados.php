<?php
session_start();
$idusuario = $_SESSION['idusuario'];
// require_once '../src/database/conexao.php';
require_once '../src/dao/instituicaoDAO.php';

$dbh = conexao::getConexao();

$query = "SELECT * FROM midletech.instituicoes;";

$statement = $dbh->query($query);

$escola = $statement->rowCount();

$dao = new InstituicaoDAO();
$instituicao = $dao->getInstituicao($idusuario);


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
    <link rel="stylesheet" href="../assets/css/list_format.css">
    <link rel="stylesheet" href="../assets/css/popup.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/mask.js" defer></script>



    <title>Dados</title>
</head>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="header_menu">
        <div class="div_menu">
            <a href="index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img"
                    title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="../material/index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php
    if (isset($_GET['error']) || isset($_GET['msg'])) { ?>
        <script>
            Swal.fire({
                icon: '<?php echo (isset($_GET['error']) ? 'error' : 'msg'); ?>',
                title: 'Perfil',
                text: '<?php echo (isset($_GET['error']) ? $_GET['error'] : $_GET['msg']); ?>',
            })
        </script>
    <?php } ?>
    <!--FIM DOBRA CABEÇALHO-->
    <div class="list_title">
        <h1>Dados da Instituição</h1>


        <div class="list_img">
            <img src="<?php echo $instituicao['logo']; ?>" alt="foto de perfil" height="75px">
            <br>
            <button class="btn" onclick="hide1()">Editar</button>
        </div>
    </div>

    <div class="list_container">



        <table style=width:50%>
            <tr>
                <th>Nome</th>
                <td>
                    <?php echo $instituicao['nome'] ?>
                </td>
                <td>

                    <button class="btn" onclick="hide2()">Editar</button>&nbsp;

                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>slogan</th>
                <td>
                    <?php echo $instituicao['slogan'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide3()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <th>Sigla</th>
                <td>
                    <?php echo $instituicao['sigla'] ?>
                </td>
                <td>
                    <button class="btn" onclick="sigla()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td>
                    <?php echo $instituicao['descricao'] ?>
                </td>
                <td>
                    <button class="btn" onclick="descricao()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <!-- <tr>
                    <td>&nbsp;</td>
                </tr> -->

            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <?php echo $instituicao['email'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide4()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Telefone</th>
                <td>
                    <?php echo $instituicao['telefone'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide5()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Endereço</th>
                <td>
                    <?php echo $instituicao['endereco'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide9()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Cidade</th>
                <td>
                    <?php echo $instituicao['cidade'] ?>
                </td>
                <td>
                    <button class="btn" onclick="hide6()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <th>Facebook</th>
                <td>
                    <a href="<?php echo $instituicao['facebook'] ?>">
                        <?php echo $instituicao['facebook'] ?>
                    </a>

                </td>
                <td>
                    <button class="btn" onclick="facebook()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <th>Instagram</th>
                <td>
                    <a href="<?php echo $instituicao['instagram'] ?>">
                        <?php echo $instituicao['instagram'] ?>
                    </a>

                </td>
                <td>
                    <button class="btn" onclick="instagram()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <th>CEP</th>
                <td>
                    <?php echo $instituicao['cep'] ?>
                </td>
                <td>
                    <button class="btn" onclick="cep()">Editar</button>&nbsp;
                    <!-- <button class="btn">Excluir</button> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            <tr>
                <td>&nbsp;</td>
            </tr>
 
            <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    <button class="btn" onclick="hide8()">Excluir Instituicao</button>&nbsp;

                </td>
            </tr>
        </table>

    </div>















    <div class="overlay" id="back1">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post" enctype="multipart/form-data">
                    <h1>Foto</h1>
                    <br>
                    <input type="file" name="imagem" accept="image/png, image/jpeg">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'] ?>">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide1()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back2">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="Post">
                    <h1>Nome</h1>
                    <br>
                    
                    <input type="text" name="nome" placeholder="Informe o nome" class="input">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">
                    
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide2()"> voltar</button>
            </div>
        </div>
    </div>

    <div class="overlay" id="back3">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>Slogan</h1>
                    <br>
                    <input type="text" name="slogan" placeholder="Informe o slogan" class="input">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">
                    
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide3()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back4">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>E-mail</h1>
                    <br>
                    <input type="email" name="email" placeholder="Informe o E-mail" class="input">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">
                    
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide4()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back5">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>Telefone</h1>
                    <br>
                    <input type="tel" name="telefone" placeholder="Informe o Telefone" class="input" maxLength="15" id="telefone">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">
                   
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide5()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back6">
        <div class="modal1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>Cidade</h1>
                    <br>
                    <input type="text" name="cidade" placeholder="Informe a cidade" class="input">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">

                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide6()"> voltar</button>
            </div>
        </div>
    </div>


    <div class="overlay" id="back8">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="deleteinstituicao.php" method="post">
                    <h1>Deletar Instituicao</h1>
                    <br>
                    <!-- <input type="password" name="senha" placeholder="Informe senha atual" class="input" required minlength="6" maxlength="50"> -->
                    <!-- <br> -->
                    <p>Deseja excluir a instituicao '<?= $instituicao['nome'];?>' ?</p>
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">
                    <br><br>
                    <button class="button">Excluir</button>
                </form>
                <button onclick="hide8()">voltar</button>
            </div>
        </div>
    </div>

    <div class="overlay" id="back9">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>Endereço</h1>
                    <br>
                    <!-- <input type="password" name="senha" placeholder="Informe senha atual" class="input" required minlength="6" maxlength="50"> -->
                    <!-- <br> -->
                    <input type="text" name="endereco" placeholder="Informe o endereço" class="input">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">

                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="hide9()">voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back10">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>Sigla</h1>
                    <br>
                    <input type="text" name="sigla" placeholder="Informe a Sigla" class="input">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">
                    
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="sigla()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back11">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>Descrição</h1>
                    <br>
                    <textarea name="descricao" id="" cols="30" rows="10"></textarea>
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">
                    
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="descricao()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back12">
        <div class="modal1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>facebook</h1>
                    <br>
                    <input type="url" name="facebook" placeholder="Informe o Facebook" class="input">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">

                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="facebook()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back13">
        <div class="modal1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="post">
                    <h1>Instagram</h1>
                    <br>
                    <input type="url" name="instagram" placeholder="Informe o Instagram" class="input">
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">

                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="instagram()"> voltar</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="back14">
        <div class="modal1" id="hide1">
            <div class="div_login">
                <form action="updateinstituicao.php" method="Post">
                    <h1>CEP</h1>
                    <br>
                    <input type="hidden" name="id" value="<?= $instituicao['idinstituicoes'];?>">

                    <input type="text" name="cep" placeholder="Informe o CEP" class="input">
                    <br><br>
                    <button class="button">Enviar</button>
                </form>
                <button onclick="cep()"> voltar</button>
            </div>
        </div>
    </div>

</body>
<script>
    function hide1() {
        var x = document.getElementById("back1");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide2() {
        var x = document.getElementById("back2");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide3() {
        var x = document.getElementById("back3");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide4() {
        var x = document.getElementById("back4");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide5() {
        var x = document.getElementById("back5");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide6() {
        var x = document.getElementById("back6");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide7() {
        var x = document.getElementById("back7");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide8() {
        var x = document.getElementById("back8");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function hide9() {
        var x = document.getElementById("back9");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    function sigla() {
        var x = document.getElementById("back10");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    function descricao() {
        var x = document.getElementById("back11");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    function facebook() {
        var x = document.getElementById("back12");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    function instagram() {
        var x = document.getElementById("back13");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    function cep() {
        var x = document.getElementById("back14");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>



<?php $dbh = null; ?>

</html>