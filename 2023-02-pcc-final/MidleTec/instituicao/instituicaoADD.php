<?php
session_start();
require_once '../src/database/conexao.php';

require_once '../src/DTO/UsuarioDTO.php';
$usuarioDTO = new UsuarioDTO(); 

$dbh = Conexao::getConexao();

$nome = trim($_POST['nome']);
$sigla = $_POST['sigla'];
$cep = $_POST['cep'];
// $estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
// $numero = $_POST['numero'];
// $complemento = $_POST['complemento'];
// $ddd = $_POST['ddd'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$slogan = $_POST['slogan'];
$descricao = $_POST['descricao'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$idusuario = $_SESSION['idusuario'];

// $horarioabertura = $_POST['horarioabertura'];
// $horariofechamento = $_POST['horariofechamento'];
if ( isset( $_FILES['imagem']['name'] ) AND !empty( $_FILES['imagem']['name'] ) ) {
    $img_name = $_FILES['imagem']['name'];
    $tmp_name = $_FILES['imagem']['tmp_name'];
    $error    = $_FILES['imagem']['error'];
    
    if ( $error == 0 ) {
        $img_ex       = pathinfo( $img_name, PATHINFO_EXTENSION );
        $img_ex_to_lc = strtolower( $img_ex );
        
        $allowed_exs = array( 'jpg', 'jpeg', 'png', 'jfif' );
        if ( in_array( $img_ex_to_lc, $allowed_exs ) ) {
            
            mkdir("../upload/instituicoes/".$nome);
            $new_img_name          = uniqid( $nome, true ) . '.' . $img_ex_to_lc;
            $img_upload_path       = "../upload/instituicoes/".$nome .'/'.  $new_img_name;
            $img_upload_path_banco = "../upload/instituicoes/" .$nome .'/'.  $new_img_name;
            move_uploaded_file( $tmp_name, $img_upload_path );
            $usuarioDTO->setImagem( $img_upload_path_banco );
        }
    }
}

$query = "INSERT INTO midletech.instituicoes (nome, sigla, cep,  cidade, endereco, telefone, email, slogan, descricao, logo, facebook, instagram, docente)  
VALUES ( :nome, :sigla, :cep,  :cidade, :endereco, :telefone, :email, :slogan, :descricao, :logo, :facebook, :instagram, :docente);";

$statement = $dbh->prepare($query);
$statement->bindParam(':nome', $nome);
$statement->bindParam(':sigla', $sigla);
$statement->bindParam(':cep', $cep);
// $statement->bindParam(':estado', $estado);
$statement->bindParam(':cidade', $cidade);
$statement->bindParam(':endereco', $endereco);
// $statement->bindParam(':numero', $numero);
// $statement->bindParam(':complemento', $complemento);
// $statement->bindParam(':ddd', $ddd);
$statement->bindParam(':telefone', $telefone);
$statement->bindParam(':email', $email);
$statement->bindValue(":logo", $usuarioDTO->getImagem());
$statement->bindParam(':slogan', $slogan);
$statement->bindParam(':descricao', $descricao);
$statement->bindParam(':facebook', $facebook);
$statement->bindParam(':instagram', $instagram);
$statement->bindParam(':docente', $idusuario);

$result = $statement->execute();

if ($result) {
    header('location:index.php?msg=Instituição cadastrada com sucesso!');

} else {

    header('location:../index.php?error=Não foi fossível inserir instituição');
    $error = $dbh->errorInfo();
    print_r($error);
}



$dbh = null;