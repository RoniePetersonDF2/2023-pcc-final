<?php 

session_start();

if (!isset($_SESSION['idusuario'])) {
    header('location:../index.php');}

    
    include_once '../src/database/conexao.php';
    include_once '../src/DTO/materialDTO.php';
    
    $materialDTO = new MaterialDTO(); 
    $dbh = Conexao::getConexao();
    
    $titulo = trim($_POST['titulo_video']);
    $descricao = trim($_POST['descricao_video']);
    $assunto = trim($_POST['assunto_video']);
    $proprietario = $_SESSION['idusuario'];
    $tipo = 'video';


if ( isset( $_FILES['video']['name'] ) AND !empty( $_FILES['video']['name'] ) ) {
    $vid_name = $_FILES['video']['name'];
    $tmp_name = $_FILES['video']['tmp_name'];
    $error    = $_FILES['video']['error'];
    
    if ( $error == 0 ) {
        $vid_ex       = pathinfo( $vid_name, PATHINFO_EXTENSION );
        $vid_ex_to_lc = strtolower( $vid_ex );
        
        $allowed_exs = array( 'mp4' );
        if ( in_array( $vid_ex_to_lc, $allowed_exs ) ) {
            
            // mkdir("../upload/".$nome);
            $new_vid_name          =  $titulo . '.' . $vid_ex_to_lc;
            $vid_upload_path       = '../upload/'. $_SESSION['nome'] .'/'.  $new_vid_name;
            $vid_upload_path_banco = '../upload/' .$_SESSION['nome'] .'/'.  $new_vid_name;
            move_uploaded_file( $tmp_name, $vid_upload_path );
            $materialDTO->setVideo( $vid_upload_path_banco );
        }
    }
}


$query= "INSERT INTO midletech.material (titulo, tipo, descricao, assunto, endereco, proprietario) values (:titulo, :tipo, :descricao, :assunto, :endereco, :proprietario); ";

$statement = $dbh->prepare($query);
$statement -> bindParam(':titulo',$titulo);
$statement -> bindParam(':tipo',$tipo);
$statement -> bindParam(':descricao',$descricao);
$statement -> bindParam(':assunto',$assunto);
$statement -> bindParam(':proprietario',$proprietario);
$statement->bindValue(":endereco", $materialDTO->getVideo());

$result = $statement->execute();


if ($result) {
    header('location:videos.php?msg=Material cadastrado com sucesso');
} else {
    header('location:videos.php?error=Não foi fossível inserir material');

    $error = $dbh->errorInfo();
    print_r($error);
    echo '<a href="index.php">voltar</a>';
}



$dbh = null;
