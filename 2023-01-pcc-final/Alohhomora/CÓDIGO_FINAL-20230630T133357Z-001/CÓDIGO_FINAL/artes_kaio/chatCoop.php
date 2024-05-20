<?php
require_once 'classe-artesao.php';
$a = new Artesao("arte", "localhost", "root", "");
require_once 'classe-chat.php';
$cp = new Chat("arte", "localhost", "root", "");

session_start();

$email = $_SESSION['email'];
$resDados = $cp->buscarDadosArtesao3($email);
$idcoop = $resDados['idcoop'];

// Verificar se a sessão está ativa e se o perfil é "use"
if (isset($email) && $_SESSION['perfil'] === 'use') {
    //    echo "teste de permissao use";
        
    } else {
        // echo "Você não tem permissão para acessar esta página";
        header("Location: logout2.php");
        exit();
    }


if(isset($_POST['submit']))
{
    $nome_artesao = addslashes($_POST['nome_artesao']);
    $email_artesao = addslashes($_POST['email_artesao']);
    $idcoop = addslashes($_POST['idcoop']);
    $idartesao = addslashes($_POST['idartesao']);
    $mensagem = addslashes($_POST['mensagem']);

    if(!empty($nome_artesao) && !empty($email_artesao) && !empty($idcoop)  && !empty($idartesao) && !empty($mensagem)){
        // Cadastrar
        if($cp->cadastrarMensagem($idcoop, $idartesao, $email_artesao, $nome_artesao, $mensagem)){
            // cadastradado
            header("location: chatCoop.php"); 
        }
    }
}

$mensagens = $cp->buscarMensagens($idcoop);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href="css/chat.css" rel="stylesheet">
    <title>Cooperativa</title>
</head>

<script>
 // Quando a página for recarregada
window.onload = function() {
  // cria .chat
  var chatElement = document.querySelector('.chat');

  // .chat para o final
  chatElement.scrollTop = chatElement.scrollHeight;
}
</script>

<body>

<header style="margin-bottom: 0;">
                <a href="opcao.php" class="btn">Voltar</a>
          
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

    <form action="chatCoop.php" method="post" class="message-input-container">
        <input type="hidden" name="nome_artesao" id="nome_artesao" value="<?php echo $resDados['nome_artesao']; ?>" required>
        <input type="hidden" name="email_artesao" id="email_artesao" value="<?php echo $email; ?>" required>
        <input type="hidden" name="idcoop" id="idcoop" value="<?php echo $resDados['idcoop']; ?>" required>
        <input type="hidden" name="idartesao" id="idartesao" value="<?php echo $resDados['idartesao']; ?>" required>
        <textarea name="mensagem" id="mensagem" class="message-input" required></textarea>
        <input type="submit" name="submit" id="submit" class="send-button" value="Enviar">
    </form>
</div>


</body>
</html>
