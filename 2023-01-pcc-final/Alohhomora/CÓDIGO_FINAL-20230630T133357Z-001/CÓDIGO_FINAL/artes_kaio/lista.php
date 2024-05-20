<?php

require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");
require_once 'classe-chat.php';
$cp = new Chat("arte", "localhost", "root", "");


if(isset($_GET['id_ats']))
    header("Location: logout.php");

session_start();

if(!isset($_SESSION['perfil']) || ($_SESSION['perfil'] !== 'use' && $_SESSION['perfil'] !== 'off')) {
    header("Location: logout2.php");
    exit();
}

if(!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'use'){
    header("Location: opcao.php");
    exit();
}

$email = $_SESSION['email'];
$resDados = $a->buscarDadosArtesao3($email);


// // Verificar se os dados foram encontrados
// echo $resDados['idartesao'];
// echo $email;


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

<script>
    function confirmExclusao(id) {
        if (confirm("Tem certeza de que deseja excluir?")) {
            // Se o usuário confirmar, redireciona para a mesma página, adicionando o parâmetro de confirmação
            window.location.href = "lista.php?id_ats=" + id;
        } else {
            // Caso contrário, não faz nada
        }
    }
</script>

<style>

div#name{

    /* background-color: #63718a; */
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


</style>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
        
            <div class="listagem_info">
                <samp class="icon-books">Seus Dados</samp>
           </div>
       </div>

           
        </div>
    </header>

    <!--FIM DOBRA CABEÇALHO-->

    <!--DOBRA PALCO PRINCIPAL-->
    
    <?php
    
if(isset($_GET['id_ats']))
{   
    $excluir_chat = $email;
    $excluir_artesao = addslashes($_GET['id_ats']);
    $cp->excluirChat($excluir_chat);
    $a->excluirArtesao($excluir_artesao); 
}

?>

    <!--1ª DOBRA-->
    <main>

        <div class="main_stage">
            <div class="main_stage_content">
               
                <article>
                    <header>

                    <div id="name"><br><b>ARTESÃO: <?php echo $resDados['nome_artesao']; ?></b><br><br></div>    
                    <div id="container">
                    
                    </header>
                </article>
                        <table border="0" width="1300px" class="table">
                        <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <!--<th>Tipo de produto</th>-->
                                    <th>Email</th>
                                    <!-- <th>Senha</th> -->
                                    <th>Telefone</th>
                                    <th>Endereço</th>
                                    <th>Associado a</th>
                                    <th>Opção</th>
                                    
                        </tr>
                            <?php
                                $dados = $a->buscarDadosUser($email);
                                /*echo "<pre>";
                                var_dump($dados);
                                echo "</pre>";*/
                                if(count($dados) > 0){
                                    for ($i=0; $i < count($dados) ; $i++) {
                                        echo"<tr>";
                                        foreach ($dados[$i] as $key => $value) {
                                            if($key != "idartesao" && $key != "idcoop" && $key != "perfil"   && $key != "senha"){
                                                echo"<td>";
                                                if ($key == "senha") {
                                                    echo str_repeat("*", strlen($value)); // Asteriscos no lugar da senha
                                                } else {
                                                    echo $value;
                                                }
                                                "</td>";
                                            }
                                        
                                        }
                            ?>
                                    <td>
                                    <br>
                                        <nav class="btns">
                                            <ul>
                                                &nbsp;
                                                <a href="edit-artesao2.php?id_up=<?php echo $dados[$i]
                                                ['idartesao'] ?>">Editar</a>
                                                &nbsp;
                                                <a href="#" onclick="confirmExclusao(<?php echo $dados[$i]['idartesao']; ?>)">Excluir</a>
                                                &nbsp;
                                            </ul>
                                        </nav>
                                    <br>
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
                            <a href="opcao.php" class="btn">Voltar</a>
                            <?php if(!isset($_SESSION['email'])) {?>
                                <a href="index.php" class="btn">Inicio</a>
                            <?php } else {?>
                                <a href="logout.php" class="btn">Página Inicial</a>
                            <?php }?>
                        </h2>
                    </header>
                </article>
            </div>
            </div>
        </div>




    </main>
</body>

</html>