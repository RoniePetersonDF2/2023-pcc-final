<?php
require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");

session_start();

$email = $_SESSION['email'];

// Verificar se a sessão está ativa e se o perfil é "adm"
if (isset($email) && $_SESSION['perfil'] === 'adm') {
//    echo "teste de permissao, apenas adm tem que ver isso";
    
} else {
    // echo "Você não tem permissão para acessar esta página";
    header("Location: logout2.php");
    exit();
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
    <link href="css/boot.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/fonticon.css" rel="stylesheet">
    <link href="css/lista.css" rel="stylesheet">


    <title>Artes & Artistas</title>
</head>

<style>

div#name{
    
    background-color: #63718a;
    background-image: linear-gradient(to right, white,#63718a, #2d3142,#63718a, white);
    color: #eeeeee;
    font-size: 1.75em;
    border-radius: 6px;
    padding: 0 3px; /* Adiciona um espaçamento de 5px no início e no fim */
    max-width: 1300px; /* Define um limite máximo de largura */
    width: 97.5vw; /* Faz a div ocupar 100% da largura disponível */
    box-sizing: border-box; /* Inclui a largura do padding na largura total da div */
    margin: 0 auto; /* Centraliza a div horizontalmente */
}
/*div#container{
    overflow-x: auto;

}*/


.linha-use {
    background-color: #f2f2f2; /* Cor cinza para "use" */
}

.linha-adm {
    background-color: #d7eaf7; /* Cor azul para o perfil "adm" */
}

.linha-off {
    background-color: #fcdedf; /* Cor vermelha pra "off" */
}

</style>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
        
            <div class="listagem_info">
                <samp class="icon-books">Listagem de Usuários</samp>
           </div>
       </div>

           
        </div>
    </header>

    <!--FIM DOBRA CABEÇALHO-->

    <!--DOBRA PALCO PRINCIPAL-->
    
    <?php


if (isset($_GET['id_ats'])) {
    $excluir_artesao = addslashes($_GET['id_ats']);

    // Verificar se a ação de exclusão do artesão foi confirmada pelo usuário
    if (isset($_GET['confirmacao']) && $_GET['confirmacao'] === '1') {
        $a->excluirArtesao($excluir_artesao);
        // Redirecionar para a página após a exclusão
        header("Location: listaAdm.php");
        exit();
    } else {
        // Exibir mensagem de confirmação antes de excluir o artesão
        echo "<script>
                if (confirm('Tem certeza que deseja excluir o artesão?')) {
                    window.location.href = 'listaAdm.php?id_ats={$excluir_artesao}&confirmacao=1';
                } else {
                    window.location.href = 'listaAdm.php';
                }
            </script>";
    }
}

if (isset($_GET['id_excoop'])) {
    $excluir_cooperativa = addslashes($_GET['id_excoop']);

    // Verificar se a ação de exclusão da cooperativa foi confirmada pelo usuário
    if (isset($_GET['confirmacao']) && $_GET['confirmacao'] === '1') {
        $c->excluirCooperativa($excluir_cooperativa);
        // Redirecionar para a página após a exclusão
        header("Location: listaAdm.php");
        exit();
    } else {
        // Exibir mensagem de confirmação antes de excluir a cooperativa
        echo "<script>
                if (confirm('Tem certeza que deseja excluir a cooperativa?')) {
                    window.location.href = 'listaAdm.php?id_excoop={$excluir_cooperativa}&confirmacao=1';
                } else {
                    window.location.href = 'listaAdm.php';
                }
            </script>";
    }
}

?> 
    <!--1ª DOBRA-->
    <main>

        <div class="main_stage">
            <div class="main_stage_content">
               
                <article>
                    <header>
                        <div id="name"><br><strong>ARTESÃOS</strong><br><br></div>    
                        <div id="container">
                    </header>
                </article>
                    
                    
                    <table border="0" width="1300px" class="table">
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <!--<th>Tipo de produto</th>-->
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Associado a</th>
        <th>Status</th>
        <th>Opção</th>
    </tr>
    <?php
    $dados = $a->buscarDados();
    if (count($dados) > 0) {
        for ($i = 0; $i < count($dados); $i++) {
            $perfil = $dados[$i]['perfil'];
            $linhaClass = "";

            switch ($perfil) {
                case "use":
                    $linhaClass = "linha-use";
                    break;
                case "adm":
                    $linhaClass = "linha-adm";
                    break;
                case "off":
                    $linhaClass = "linha-off";
                    break;
                default:
                    $linhaClass = "";
                    break;
            }

            echo "<tr class='$linhaClass'>";

            foreach ($dados[$i] as $key => $value) {
                if ($key != "idartesao" && $key != "idcoop" && $key != "senha") {
                    echo"<td>";
                    if ($key == "senha") {
                        echo str_repeat("*", strlen($value)); // Asteriscos no lugar da senha
                    } else {
                        echo $value;
                    }
                    "</td>";                   
                }
            }
            echo "<td>
                <br>
                <nav class=\"btns\">
                    <ul>
                        &nbsp;
                        <a href=\"edit-artesaoAdm.php?id_up=" . $dados[$i]['idartesao'] . "\">Editar</a>
                        &nbsp;
                        <a href=\"listaAdm.php?id_ats=" . $dados[$i]['idartesao'] . "\">Excluir</a>
                        &nbsp;
                    </ul>
                    <br>
                </nav>
            </td>";
            echo "</tr>";
        }
    }
    ?>
</table>
                    <article>
                            <header>
                            <br><div id="name"><br><strong>COOPERATIVAS</strong><br><br></div>
                            </header>
                    </article>
                    
                            <table border="0" width="1300px" class="table">
                        <tr>
                                    <th>Nome da Empresa</th>
                                    <th>CNPJ</th>
                                    <!--<th>Tipo de produto</th>-->
                                    <th>Naturaza</th>
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Email</th>
                                    <th>Nome Fantasia</th>
                                    <th>Opção</th>
                                    
                                </tr>
                            <?php
                                $dadoscoop = $c->buscarDadosCoop();
                                /*echo "<pre>";
                                var_dump($dados);
                                echo "</pre>";*/
                                if(count($dadoscoop) > 0){
                                    for ($i=0; $i < count($dadoscoop) ; $i++) {
                                        echo"<tr style=\"background-color: #f2f2f2;\">";
                                        foreach ($dadoscoop[$i] as $key => $value) {
                                            if($key != "idcoop"){
                                                echo"<td>".$value."</td>";
                                            }
                                        
                                        }
                            ?>
                                    <td>
                                    <br>
                                        <nav class="btns">
                                            <ul>
                                                
                                                <a href="edit-cooperativaAdm.php?id_upcoop=<?php echo $dadoscoop[$i]
                                                ['idcoop'] ?>">Editar</a>
                                                <br><br>
                                                <a href="listaAdm.php?id_excoop=<?php echo $dadoscoop[$i]
                                                ['idcoop'] ?>">Excluir</a>
                                                
                                            </ul>
                                            <br>
                                        </nav>
                                    </td>
                            <?php
                            
                                    }
                                }
                            ?>
                            
                            </table>

                    </div>
                   
                    <!-- </header>
                    
                    </article> -->
            
            <div class="main_optin_footer_content">
                <article>
                    <header>
                        <h2>
                            <a href="listacoopAdm.php" class="btn">Cad. Artesão</a>
                            <a href="form-cooperativaAdm.php" class="btn">Cad. Coop.</a>
                            <a href="opcaoAdm.php" class="btn">Retornar</a>
                            <a href="logout.php" class="btn">Página Inicial</a>
                        </h2>
                    </header>
                </article>
            </div>

            </div>
        </div>


    </main>
</body>

</html>