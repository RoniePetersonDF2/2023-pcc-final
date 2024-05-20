<?php 

session_start();

if (!isset($_SESSION['idusuario'])) {
    header('location:../index.php');
}

include_once '../src/database/conexao.php';
include_once '../src/DTO/materialDTO.php';

$materialDTO = new MaterialDTO(); 
$dbh = Conexao::getConexao();

$titulo = trim($_POST['titulo_artigo']);
$descricao = trim($_POST['descricao_artigo']);
$assunto = trim($_POST['assunto_artigo']);
$proprietario = $_SESSION['idusuario'];
$tipo = 'artigo';

if ( isset( $_FILES['artigo']['name'] ) AND !empty( $_FILES['artigo']['name'] ) ) {
    $art_name = $_FILES['artigo']['name'];
    $tmp_name = $_FILES['artigo']['tmp_name'];
    $error    = $_FILES['artigo']['error'];
    
    if ( $error == 0 ) {
        $art_ex       = pathinfo( $art_name, PATHINFO_EXTENSION );
        $art_ex_to_lc = strtolower( $art_ex );
        
        $allowed_exs = array( 'pdf', 'docx', 'pptx' );
        if ( in_array( $art_ex_to_lc, $allowed_exs ) ) {
            
            // mkdir("../upload/".$nome);
            $new_art_name          =  $titulo . '.' . $art_ex_to_lc;
            $art_upload_path       = '../upload/'. $_SESSION['nome'] .'/'.  $new_art_name;
            $art_upload_path_banco = '../upload/' .$_SESSION['nome'] .'/'.  $new_art_name;
            move_uploaded_file( $tmp_name, $art_upload_path );
            $materialDTO->setArtigo( $art_upload_path_banco );
        }
    }
}

$query= "INSERT INTO midletech.material (titulo, tipo, descricao, assunto, endereco, proprietario) 
values (:titulo, :tipo, :descricao, :assunto, :endereco, :proprietario); ";

$statement = $dbh->prepare($query);
$statement -> bindParam(':titulo',$titulo);
$statement -> bindParam(':tipo',$tipo);
$statement -> bindParam(':descricao',$descricao);
$statement -> bindParam(':endereco',$endereco);
$statement -> bindParam(':assunto',$assunto);
$statement -> bindParam(':proprietario',$proprietario);
$statement -> bindParam(':proprietario',$proprietario);
$statement->bindValue(":endereco", $materialDTO->getArtigo());

$result = $statement->execute();


if ($result) {
   header('location:artigos.php?msg=Material cadastrado com sucesso');
} else {
    
    header('location:artigos.php?error=Não foi fossível inserir material');

    $error = $dbh->errorInfo();
    print_r($error);
    echo '<a href="index.php">voltar</a>';
}



$dbh = null;
