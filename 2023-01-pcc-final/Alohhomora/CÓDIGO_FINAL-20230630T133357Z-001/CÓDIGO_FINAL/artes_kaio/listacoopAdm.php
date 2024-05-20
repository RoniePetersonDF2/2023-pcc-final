<?php
require_once 'classe-cooperativa.php';
$c = new Cooperativa("arte", "localhost", "root", "");

session_start();
$email = $_SESSION['email'];

// Verificar se a sessão está ativa e se o perfil é "adm"
if (isset($email) && $_SESSION['perfil'] === 'adm') {
    //    echo "teste de permissao adm";
        
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


</style>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
        
            <div class="listagem_info">
                <samp class="icon-books">Listagem de Cooperativas</samp>
           </div>
       </div>

           
        </div>
    </header>

    <!--FIM DOBRA CABEÇALHO-->

    <!--DOBRA PALCO PRINCIPAL-->
    
    <!--1ª DOBRA-->
    <main>

        <div class="main_stage">
            <div class="main_stage_content">
               
                <article>
                    
                    <header>
                            <div id="name"><br>
                            
                            <b>Escolha uma cooperativa e clique em 'associe-se'</b>.

                            
                            <br><br></div>

                    </header> 
                    
                </article>

                            <table border="0" width="1300px" class="table">
                        <tr>
                                    <!-- <th>Nome da Empresa</th> -->
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
                                            if($key != "nome_empresa" && $key != "idcoop" ){
                                                echo"<td>".$value."</td>";
                                            }
                                        
                                        }
                            ?>
                                    <td><br>
                                        <nav class="btns">
                                            <ul>
                                                <a href="form-artesaoAdm.php?id_upcoop=<?php echo $dadoscoop[$i]
                                                ['idcoop'] ?>">Associe-se</a>
                                            </ul><br>
                                        </nav>
                                    </td>
                            <?php
                            
                                    }
                                }
                            ?>
                            
                            </table>

                    </div>
                    
                    <!-- header e article estava aqui -->
               
            <div class="main_optin_footer_content">
                <article>
                    <header>
                        <h2>
                            <a href="form-cooperativaAdm.php" class="btn">Cadastrar Cooperativa</a>
                            <a href="listaAdm.php" class="btn">Retornar</a>
                        </h2>
                    </header>
                </article>
            </div>
            </div>
        </div>
    </main>
</body>

</html>