<?php

session_start();

$idusuario = $_SESSION['idusuario'];


require_once('../src/dao/instituicaoDAO.php');
if (isset($_POST['idnoticia']) && !empty($_POST['idnoticia'])) {
    $idnoticia = $_POST['idnoticia'];
    $idinstituicao = $_POST['idinstituicao'];
    $noticia = $_POST['noticia'];
    $titulo = $_POST['titulo'];


    $dao = new InstituicaoDAO();
    $result = $dao->updatenoticia($idnoticia, $noticia, $idusuario, $titulo);


    if ($result) {
        if($_SESSION['perfil']=='1'){
        header('location:instituicoesnoticias.php?msg=Notícia atualizada com sucesso!');
            die;
        }
        header('location:noticias.php?id='. $idinstituicao .'&msg=Notícia atualizada com sucesso!');
    } else {
        if($_SESSION['perfil']=='1'){
            header('location:instituicoesnoticias.php?=error=Não foi possível atualizar a notícia!');
                die;
            }
        header('location: noticias.php?id='. $idinstituicao .'&error=Não foi possível atualizar a notícia!');
    }
}elseif (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updatenome($idusuario, $nome, $id);
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }


} else if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updateemail($idusuario, $email, $id);
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }
} else if (isset($_POST['telefone']) && !empty($_POST['telefone'])) {
    $telefone = $_POST['telefone'];
    $dao = new InstituicaoDAO();
    $result = $dao->updatefone($idusuario, $telefone, $id);
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }

}  else if (isset($_FILES['imagem']['name']) and !empty($_FILES['imagem']['name'])) {
    $img_name = $_FILES['imagem']['name'];
    $tmp_name = $_FILES['imagem']['tmp_name'];
    $error = $_FILES['imagem']['error'];

    if ($error == 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png', 'jfif');
        if (in_array($img_ex_to_lc, $allowed_exs)) {
            $dao = new InstituicaoDAO();
            $nome= $_POST['id'];
            $id = $_POST['id'];

            mkdir("../upload/instituicoes/".$nome);
            $new_img_name = uniqid($idusuario, true) . '.' . $img_ex_to_lc;
            $img_upload_path = '../upload/instituicoes/' . $nome . '/' . $new_img_name;
            $img_upload_path_banco = '../upload/instituicoes/' . $nome . '/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            # $usuarioDTO->setImagem( $img_upload_path_banco );
            $result = $dao->updateimagem($idusuario, $img_upload_path_banco, $id);
            if ($result) {
                header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');


            } else {
                header('location: listar.php?error=Não foi possível atualizar a instituição!');
            }


        }
    }
} else if (isset($_POST['sigla']) && !empty($_POST['sigla'])) {
    $sigla = $_POST['sigla'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updatesigla($idusuario, $sigla, $id);
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }

} else if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
    $descricao = $_POST['descricao'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updatedescricao($idusuario, $descricao, $id); 
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }

} else if (isset($_POST['endereco']) && !empty($_POST['endereco'])) {
    $endereco = $_POST['endereco'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updateendereco($idusuario, $endereco, $id); 
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }

} else if (isset($_POST['cidade']) && !empty($_POST['cidade'])) {
    $cidade = $_POST['cidade'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updatecidade($idusuario, $cidade, $id); 
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }

} else if (isset($_POST['facebook']) && !empty($_POST['facebook'])) {
    $facebook = $_POST['facebook'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updatefacebook($idusuario, $facebook, $id); 
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }

} else if (isset($_POST['instagram']) && !empty($_POST['instagram'])) {
    $instagram = $_POST['instagram'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updateinstagram($idusuario, $instagram, $id); 
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }

} else if (isset($_POST['cep']) && !empty($_POST['cep'])) {
    $cep = $_POST['cep'];
    $id = $_POST['id'];

    $dao = new InstituicaoDAO();
    $result = $dao->updatecep($idusuario, $cep, $id); 
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }

} else if (isset($_POST['slogan']) && !empty($_POST['slogan'])) {
    $slogan = $_POST['slogan'];
    $dao = new InstituicaoDAO();
    $id = $_POST['id'];

    $result = $dao->updateslogan($idusuario, $slogan, $id); 
    if ($result) {
        header('location: instituicaodados.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: listar.php?error=Não foi possível atualizar a instituição!');
    }
} else if (isset($_POST['idinstituicao_adm']) && !empty($_POST['idinstituicao_adm'])) {
    $slogan = $_POST['slogan'];
    $dao = new InstituicaoDAO();
    $id = $_POST['idinstituicao_adm'];
    $nome = $_POST['nome_inst'];
    $slogan = $_POST['slogan_inst'];
    $descricao = $_POST['descricao_inst'];
    $email = $_POST['email_inst'];
    $sigla = $_POST['sigla_inst'];
    $telefone = $_POST['telefone_inst'];
    $cep = $_POST['cep_inst'];
    $endereco = $_POST['endereco_inst'];
    $cidade = $_POST['cidade_inst'];
    $facebook = $_POST['facebook_inst'];
    $instagram = $_POST['instagram_inst'];

    $result = $dao->updateinstituicaoadm($nome, $slogan, $id, $descricao, $email, $sigla, $telefone, $cep, $endereco, $cidade, $facebook, $instagram);
    if ($result) {
        header('location: ../perfil/adm.php?msg=instituição atualizado com sucesso!');
    } else {
        header('location: ../perfil/adm.php?error=Não foi possível atualizar a instituição!');
    }

}    else {
    header('location:instituicaodados.php?error=Insira dados validos');
}


