<?php
require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-chat.php';
$cp = new Chat("arte", "localhost", "root", "");

session_start();

$email = $_SESSION['email'];
$resDados = $cp->buscarDadosArtesao3($email);
$idcoop = $resDados['idcoop'];

// Verificar se a sessão está ativa e se o perfil é "adm"
if (isset($email) && $_SESSION['perfil'] === 'adm') {
    //    echo "teste de permissao adm";
        
    } else {
        // echo "Você não tem permissão para acessar";
        header("Location: logout2.php");
        exit();
    }


if(isset($_GET['idcoop2'])) //verifica se a pessoa apertou no botao "editar" da listaAdm.php
{
    $idcoop2 = addslashes($_GET['idcoop2']);
    $mensagens = $cp->buscarMensagens($idcoop2);
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href="css/chat.css" rel="stylesheet">
    <title>Chat Cooperativa</title>
</head>

<script>
 // Quando a página for recarregada
window.onload = function() {
  // cria .chat
  var chatElement = document.querySelector('.chat');

  //  .chat para o final
  chatElement.scrollTop = chatElement.scrollHeight;
}
</script>

<body>

<header style="margin-bottom: 0;">
                <a href="listaChat.php" class="btn">Retornar</a>
          
    </header>

<div class="chat-container">
    <div class="chat">
        <?php
        if (!empty($mensagens)) {
            foreach ($mensagens as $mensagem) {
                if ($mensagem['nome_artesao'] == $resDados['nome_artesao']) {
                    echo '<div class="user-message">';
                    echo '<span class="user-name">' . $mensagem['nome_artesao'] . ':</span> ';
                    echo $mensagem['mensagem'];
                    echo '</div>';
                } else {
                    echo '<div class="other-message">';
                    echo '<span class="user-name">' . $mensagem['nome_artesao'] . ':</span> ';
                    echo $mensagem['mensagem'];
                    echo '</div>';
                }
            }
        } else {
            echo "Não há mensagens.";
        }
        ?>
    </div>
</div>


</body>
</html>
