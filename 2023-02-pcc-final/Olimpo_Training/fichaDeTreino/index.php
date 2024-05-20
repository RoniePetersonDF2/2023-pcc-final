<?php
session_start();
$_SESSION['sessaoFicha'] = [];

include_once __DIR__.'/../auth/restrito.php';

$dadosUsuario = $_SESSION['dadosUsuario'];

include_once __DIR__.'/../src/databases/conexao.php';
include_once __DIR__.'/../src/dao/crefdao.php';

$autenticado = new CREF();

// verifica se é admin, personal autenticado ou aluno
if(!isPersonal($dadosUsuario['perfil'], $autenticado->getAuthCREF($dadosUsuario['id']) ) && !isAluno($dadosUsuario['perfil'])){
    header('Location: ../views/index.php?error=Voce não pode acessar essa página, faça assintura.');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <title>Fichas de Treino</title>
</head>
<style>
    
.mainTitulo{
    margin-bottom: 30px;
    text-align: center;
    color: black;
   font-family: 'Ubuntu', sans-serif, Arial, Helvetica;;
    font-size: 70px;
    font-style: normal;
    font-weight: 600;
    line-height: 110%; /* 143px */
    letter-spacing: -1.625px;
}

.wrapbtn{
    text-align: end;
}

.btnCriar {
  border: none;
  width: 250px;
  padding: 5px 0px;
  color: #fff;
  text-align: center;
  text-decoration: none;
  display: inline-block;  

  box-sizing: border-box;
    margin-bottom: 15px;
    padding: 12.2362px 36.7085px;
    gap: 12.24px;
    background: radial-gradient(circle at 10% 20%, rgb(255, 200, 124) 0%, rgb(252, 251, 121) 90%);
    border: 1.22362px solid #F2F2F2;
    backdrop-filter: blur(2.44724px);
    border-radius: 83.206px;
    color: #68521b;
    font-weight: 800;
    font-size: 1.1rem;
    box-shadow: 7px 7px 13px 0px rgba(50, 50, 50, 0.22);
   font-family: 'Ubuntu', sans-serif, Arial, Helvetica;
}

.sectionFichas{
    display: flex;
    flex-direction: row;
    wrap: wrap;
    /* justify-content: space-between; */
    margin-bottom: 100px;
    flex-wrap: wrap;
    margin-left: 15px;
    margin-right: 15px;
}


.showficha{
    margin-top: 30px;
    color: white;
    border-radius: 5%;
    
    
    width: 310px;
    height: 420px;
    
    background: #000000;
    border-radius: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 4px;
    margin-left: 4px;
    margin-right: 4px;
    cursor: pointer;
    
}

.showficha:hover{
    transform: scale(1.09);
    transition: all .5s;
}

.showficha_margin{
    width: 100%;
    height: 100%;
    margin-top: 40px;
    margin-bottom: 40px;
    border: 1px solid gold;

}

.showficha_cabecalho{
    display:flex;
    flex-direction: row;
    align-items: center;
}
.showficha_cabecalho img{
    filter: brightness(0) saturate(100%) invert(90%) sepia(83%) saturate(1156%) hue-rotate(357deg) brightness(106%) contrast(103%);
    
}

.showficha_cabecalho p{
    font-style: 'monospace';
    font-weight: 600;
    font-size: 1.1rem;
    margin-left: 6px;
}

.showficha_dados{
    margin-left: 4px;
    margin-right: 4px;
    margin-top: 40px;
    display:flex;
    flex-direction: row;
    
}


.showficha_data{
    width: 30%;
    height: 50px;
    border-radius: 100px;
    background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
   font-family: 'Ubuntu', sans-serif, Arial, Helvetica;
    font-weight: 600;

}

.empty{
    width:70%;
    height: 50px;
    border-radius: 100px;
    background: #1A1A1A;

}

.showficha_title{
    margin-top: 10px;
    display: flex;
    min-height: 40px;
    width: 250px;
    padding: 20px;
    align-items: flex-start;
    gap: 5px;
    align-self: stretch;
    border-radius: 30px;
    background: #1A1A1A;
}


</style>
<body>
<?php
        $path = getenv('DOCUMENT_ROOT');
        include_once $path."/Olimpo_Training/layouts/header.php";
?>
<a href="../views/index.php" alt="voltar"><img height="60px" src="../views/assets/img/voltar.svg"></a>

    <?php 
    //verifica se é personal para imprimir o botão
    if(isPersonal($dadosUsuario['perfil'], $autenticado->getAuthCREF($dadosUsuario['id']))): ?>
    <div class="wrapbtn">
        <a href="usersRequires.php" class="btnCriar">Criar treino</a>
    </div>
    <?php endif; ?>

    <h1 class="mainTitulo">Treinos</h1>
    
    <section class="sectionFichas">
<?php

// pega o id do usuario que entrou na tela
isset($_GET['idUsuarios']) ? $usuarioId = $_GET['idUsuarios'] : $usuarioId = 1;


//algoritmo para mostrar todos as registro da ficha de treino

$dbh = Conexao::getConexao();

// seleciona a query de acordo com o tipo de usuario
if(isPersonal($dadosUsuario['perfil'], $autenticado->getAuthCREF($dadosUsuario['id']))){

    $query = "SELECT * FROM olimpo.fichas_treino ORDER BY idFichas_Treino DESC ";
}else{

    $query =    "SELECT * FROM olimpo.fichas_treino
                WHERE  idAluno = :idAluno 
                ORDER BY idFichas_Treino DESC";
}



$stmt = $dbh->prepare($query);
if($dadosUsuario['perfil'] == "ALUNO"){
    $stmt->bindParam(':idAluno', $dadosUsuario['id']);
}
$stmt->execute();
$fichas = $stmt->fetchAll();
$quantFichas = count($fichas);

    $i = $quantFichas;
    if($quantFichas <= 0){ ?>
        <br><br>
        <p style="text-align: center; width: 100%; font-size: 1.3rem;">Você ainda não possui nenhum treino.</p>
    <?php
    }

    foreach($fichas as $row): 

    ?>


     <!-- 'Nome: '.$row['titulo']."<br>";
     'Data Criacao: '.$row['data_criacao'];
     "<br>"; -->
    <form action='detailsFicha.php' method="POST">
        <button class='showficha' type="submit" name="Enviar">
            <div class="showficha_margin">
                <div class="showficha_cabecalho">
                        <p> <?=$i?><font  color="gold"> de <?=$quantFichas?></font></p>
                    <img src="../views/assets/img/setaFicha.png" height="9px">
                </div>
                <div class="showficha_dados">
                    <div class="showficha_data">
                        <?php echo date("d/m/Y", strtotime($row['data_criacao']));?>
                    </div>
                    <div class="empty">
                    </div>                    
                </div>

                <div class="showficha_title">
                    <h1><?=$row['titulo']?></h1>
                </div>
            <div>
            <input type="hidden" name="idFichas_treino" value="<?=$row['idFichas_treino']?>">
        </button>
    </form>
<?php 
    $i--;
    endforeach; ?>
    </section>
</body>
</html>

<?php
    $path = getenv('DOCUMENT_ROOT');
    include_once $path."/Olimpo_Training/layouts/footer.php";
?>