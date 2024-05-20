<?php
session_start();
// require_once('../src/DTO/usuarioDTO.php');
require_once('../src/dao/usuariodao.php');
$idusuario = $_SESSION['idusuario'];

$nome = $_SESSION['nome'];

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];
    $dao = new AlunoDAO();
    $result = $dao->updatenome($idusuario, $nome);
    if ($result) {
        header('location: listar.php?msg=Usuário atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar o usuário!');
    }

} else if (isset($_POST['matricula']) && !empty($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $dao = new AlunoDAO();
    $result = $dao->updatematricula($idusuario, $matricula);
    if ($result) {
        header('location: listar.php?msg=Usuário atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar o usuário!');
    }
} else if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $dao = new AlunoDAO();
    $result = $dao->updateemail($idusuario, $email);
    if ($result) {
        header('location: listar.php?msg=Usuário atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar o usuário!');
    }
} else if (isset($_POST['telefone']) && !empty($_POST['telefone'])) {
    $telefone = $_POST['telefone'];
    $dao = new AlunoDAO();
    $result = $dao->updatetelefone($idusuario, $telefone);
    if ($result) {
        header('location: listar.php?msg=Usuário atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar o usuário!');
    }
} else if (isset($_POST['instituicao']) && !empty($_POST['instituicao'])) {
    $instituicao = $_POST['instituicao'];
    $dao = new AlunoDAO();
    $result = $dao->updateinstituicao($idusuario, $instituicao);
    if ($result) {
        header('location: listar.php?msg=Usuário atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar o usuário!');
    }
} else if (isset($_POST['pass']) and !empty($_POST['pass'])) {
    $pass = md5($_POST['pass']);
    $senha = md5($_POST['senha']);

    // require_once '../src/database/conexao.php';
    require_once '../src/DTO/UsuarioDTO.php';

    $usuarioDTO = new UsuarioDTO();
    $dbh = Conexao::getConexao();

    $senhacheck = $senha;

    $stmt = $dbh->prepare("SELECT * FROM midletech.usuarios WHERE senha =? and idusuario =?;");

    $stmt->execute([$senhacheck, $idusuario]);

    $senhachecked = $stmt->fetch();
    if ($senhachecked) {
        $dao = new AlunoDAO();
        $result = $dao->updatesenha($idusuario, $pass);
        if ($result) {
            header('location: listar.php?msg=Usuário atualizado com sucesso!');
            $dbh = null;

        } else {
            header('location: listar.php?error=Não foi possível atualizar o usuário!');
        }

    } else {
        header('location: listar.php?error=Não foi possível atualizar o usuário!');
        $dbh = null;
    }

} else if (isset($_FILES['imagem']['name']) and !empty($_FILES['imagem']['name'])) {
    $img_name = $_FILES['imagem']['name'];
    $tmp_name = $_FILES['imagem']['tmp_name'];
    $error = $_FILES['imagem']['error'];

    if ($error == 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png', 'jfif');
        if (in_array($img_ex_to_lc, $allowed_exs)) {
            $dao = new AlunoDAO();

            $new_img_name = uniqid($idusuario, true) . '.' . $img_ex_to_lc;
            $img_upload_path = '../upload/' . $nome . '/' . $new_img_name;
            $img_upload_path_banco = 'upload/' . $nome . '/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            # $usuarioDTO->setImagem( $img_upload_path_banco );
            $result = $dao->updateimagem($idusuario, $img_upload_path_banco);
            if ($result) {
                header('location: listar.php?msg=Usuário atualizado com sucesso!');


            } else {
                header('location: listar.php?error=Não foi possível atualizar o usuário!');
            }


        }
    }
} else if (isset($_POST['dtnasc']) && !empty($_POST['dtnasc'])) {
    $dtnasc = $_POST['dtnasc'];
    $dao = new AlunoDAO();
    $result = $dao->updatedtnasc($idusuario, $dtnasc);
    if ($result) {
        header('location: listar.php?msg=Usuário atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar o usuário!');
    }

} else if (isset($_POST['idforum']) && !empty($_POST['idforum'])) {
    $idforum = $_POST['idforum'];

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];

    $dao = new AlunoDAO();
    $result = $dao->updateforum($idforum, $titulo, $descricao, $categoria, $idusuario);

    if ($result) {
        header('location:index.php?msg=Fórum atualizado com sucesso!');
    } else {
        header('location: index.php?error=Não foi possível atualizar o fórum!');
    }

}else if(isset($_POST['admid']) && !empty($_POST['admid'])){
    $nome = $_POST['admnome'];
    $id = $_POST['admid'];
    $email = $_POST['admemail'];
    $status = $_POST['status'];
    $perfil = $_POST['perfil'];
    $matricula = $_POST['admmatricula'];
    $telefone = $_POST['admtelefone'];
    if(empty($_POST['adminstituicao'])){
        $instituicao=null;    
    }
    $instituicao = $_POST['adminstituicao'];

    $dao = new AlunoDAO();
    $result = $dao->admupdate($nome,$id, $email, $status, $perfil, $matricula, $telefone, $instituicao);
    if ($result) {
        header('location: admusuarios.php?msg=Usuário atualizado com sucesso!');
    } else {
        header('location: admusuarios.php?error=Não foi possível atualizar o usuário!');
    }
} else if (isset($_FILES['docmatricula']['name']) and !empty($_FILES['docmatricula']['name'])) {
    $img_name = $_FILES['docmatricula']['name'];
    $tmp_name = $_FILES['docmatricula']['tmp_name'];
    $error = $_FILES['docmatricula']['error'];

    if ($error == 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('pdf');
        if (in_array($img_ex_to_lc, $allowed_exs)) {
            $dao = new AlunoDAO();

            $new_img_name = uniqid($idusuario, true) . '.' . $img_ex_to_lc;
            $img_upload_path = '../upload/' . $nome . '/' . $new_img_name;
            $img_upload_path_banco = '../upload/' . $nome . '/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            # $usuarioDTO->setImagem( $img_upload_path_banco );
            $result = $dao->updatedoc($idusuario, $img_upload_path_banco);
            if ($result) {
                header('location: listar.php?msg=Usuário atualizado com sucesso!');


            } else {
                header('location: listar.php?error=Não foi possível atualizar o usuário!');
            }


        }
    }
}
else {
    header('location:listar.php?error=Insira dados válidos');
}


