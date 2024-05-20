<?php
require_once 'classe-chat.php';
$cp = new Chat("arte", "localhost", "root", "");

$coops = $cp->buscarCoops(); // Buscar todas as cooperativas

session_start();

// Verificar se a sessão está ativa e se o perfil é "adm"
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'adm') {
    header("Location: logout2.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href="css/chatLista.css" rel="stylesheet">
    <title>Lista de chats</title>
   
</head>
<body>
    

<header style="margin-bottom: 0;">
    <a href="opcaoAdm.php" class="btn">Retornar</a>
</header>

<br>

<div id="name"><strong>Chats das Cooperativas</strong></div>
<div class="container">

        <ul>
            <?php foreach ($coops as $coop) : ?>
                <li>
                    <form action="chatCoopAdm.php" method="get">
                        <input type="hidden" name="idcoop2" value="<?php echo $coop['idcoop']; ?>">
                        <button type="submit" name="submit" value="<?php echo $coop['nome_fantasia']; ?>">
                            <?php echo $coop['nome_fantasia']; ?>
                        </button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
