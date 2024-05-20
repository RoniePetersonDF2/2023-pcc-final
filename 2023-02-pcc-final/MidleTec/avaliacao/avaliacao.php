<?php
session_start();
require_once '../src/database/conexao.php';
$dbh = conexao::getConexao();



$id = $_GET['id'];





$idusuario = $_SESSION['idusuario'];

$stmt = $dbh->prepare("SELECT * FROM midletech.avaliacoes WHERE idusuario=? and idinstituicao =?");

$stmt->execute([$idusuario, $id]);

$verificaravaliacao = $stmt->fetch();
if ($verificaravaliacao) {
  header('location:../instituicao/index.php?msg =Instituição já avaliada');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/boot.css">
  <link rel="stylesheet" href="../assets/css/list_format.css">

  <link rel="stylesheet" href="../assets/css/radio.css">

  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="css/fonticon.css" rel="stylesheet">

  <title>Avaliar</title>
</head>

<body>
  <header class="header_menu">
    <div class="div_menu">
      <a href="index.php" class="logo">
        <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
      </a>
      <nav class="nav_menu">
        <ul>
          <li><a href="../instituicao/index.php">Voltar</a></li>
        </ul>
      </nav>
    </div>
  </header>


  <h1 class="list_title">Avaliação</h1>
  <div class="list_container">
    <div class="list_container2">
    <form action="avaliacaoadd.php" method="post" style=width:50%>
      <div class='star-rating star-5'>

        <input type="radio" name="rating" value="1" checked><i></i>
        <input type="radio" name="rating" value="2"><i></i>
        <input type="radio" name="rating" value="3"><i></i>
        <input type="radio" name="rating" value="4"><i></i>
        <input type="radio" name="rating" value="5"><i></i>

        <input type="hidden" name="idinstituicao" id="" value="<?php echo $id ?>">
        <input type="hidden" name="idusuario" id="" value="<?php echo $_SESSION['idusuario'] ?>">
      </div>
      <br>
      <textarea name="comentario" placeholder="Comentário" id="comentario" cols="75" rows="10"></textarea>
      <br>
      <button value="submit" class="btn">enviar</button>

    </form>
    </div>
  </div>

</body>

</html>