<?php
session_start();
date_default_timezone_set('America/Sao_paulo');

require_once '../src/database/conexao.php';
require_once '../src/DTO/UsuarioDTO.php';
$usuarioDTO = new UsuarioDTO(); 


$dbh = Conexao::getConexao();
$data = date('y-m-d H:i:s');

$idusuario = $_POST['idusuario'];
$idinstituicao = $_POST['idinstituicao'];
$noticia = $_POST['noticia'];
$titulo = $_POST['titulo'];

if ( isset( $_FILES['imagem']['name'] ) AND !empty( $_FILES['imagem']['name'] ) ) {
    $img_name = $_FILES['imagem']['name'];
    $tmp_name = $_FILES['imagem']['tmp_name'];
    $error    = $_FILES['imagem']['error'];
    
    if ( $error == 0 ) {
        $img_ex       = pathinfo( $img_name, PATHINFO_EXTENSION );
        $img_ex_to_lc = strtolower( $img_ex );
        
        $allowed_exs = array( 'jpg', 'jpeg', 'png', 'jfif' );
        if ( in_array( $img_ex_to_lc, $allowed_exs ) ) {
            
            mkdir("../upload/instituicoes/".$idinstituicao);
            $new_img_name          = uniqid( $titulo, true ) . '.' . $img_ex_to_lc;
            $img_upload_path       = "../upload/instituicoes/".$idinstituicao .'/'.  $new_img_name;
            $img_upload_path_banco = "../upload/instituicoes/" .$idinstituicao .'/'.  $new_img_name;
            move_uploaded_file( $tmp_name, $img_upload_path );
            $usuarioDTO->setImagem( $img_upload_path_banco );
        }
    }
}


$query= "INSERT INTO midletech.noticias (idusuario, idinstituicao, titulo, noticia, imagem, data)#dataenvio 
values (:idusuario, :idinstituicao, :titulo, :noticia, :imagem, :data);"; #:dataenvio);

$statement = $dbh->prepare($query);
$statement -> bindParam(':idusuario',$idusuario);
$statement -> bindParam(':idinstituicao',$idinstituicao);
$statement -> bindParam(':noticia',$noticia);
$statement->bindValue(":imagem", $usuarioDTO->getImagem());
$statement -> bindParam(':data',$data);
$statement -> bindParam(':titulo',$titulo);

#$statement -> bindParam(':dataenvio',$dataenvio);

$result = $statement->execute();

if ($result) {
    header('location:noticias.php?id='.$idinstituicao.'&msg=Noticia cadastrada com sucesso!');
} else {
    header('location: ../material/index.php?error=Não foi possível cadastrar a noticia!');

    $error = $dbh->errorInfo();
    print_r($error);
    echo '<a href="index.php">voltar</a>';
}



$dbh = null;