<?php
require_once '../src/database/conexao.php';
require_once '../src/DTO/UsuarioDTO.php';
date_default_timezone_set('America/Sao_paulo');
$usuarioDTO = new UsuarioDTO();
$dbh = Conexao::getConexao();
$datacadastro = date('y-m-d H:i:s');
$emailcheck = $_POST['email'];

if ($_POST['perfil'] == 'docente') {
    $stmt = $dbh->prepare("SELECT * FROM midletech.usuarios WHERE email=?");

    $stmt->execute([$emailcheck]);

    $user = $stmt->fetch();
    if ($user) {
        echo '<script>alert("email exists");</script>';
        header('location:cadastrodocente.php?error=Email já Cadastrado');
    } else {




        $nome = strtoupper(trim($_POST['nome']));
        // $sobrenome = strtoupper(trim($_POST['sobrenome']));
        $senha = md5($_POST['senha']);
        $email = $_POST['email'];

        // $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $dtnasc = $_POST['dtnasc'];
        // $genero = $_POST['genero'];
        // $foto = $_POST['foto'];
        // $cep = $_POST['cep'];
        // $estado = $_POST['estado'];
        // $cidade = $_POST['cidade'];
        $instituicao = $_POST['instituicao'];
        // $ = strtoupper($_POST['']);
        // $ = strtoupper($_POST['']);
        $perfil = "3";
        $status = "1";
        if (isset($_FILES['imagem']['name']) and !empty($_FILES['imagem']['name'])) {
            $img_name = $_FILES['imagem']['name'];
            $tmp_name = $_FILES['imagem']['tmp_name'];
            $error = $_FILES['imagem']['error'];

            if ($error == 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png', 'jfif');
                if (in_array($img_ex_to_lc, $allowed_exs)) {

                    mkdir("../upload/" . $nome);
                    $new_img_name = uniqid($nome, true) . '.' . $img_ex_to_lc;
                    $img_upload_path = '../upload/' . $nome . '/' . $new_img_name;
                    $img_upload_path_banco = 'upload/' . $nome . '/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $usuarioDTO->setImagem($img_upload_path_banco);
                }
            }
        }

        if (isset($_FILES['docdocente']['name']) and !empty($_FILES['docdocente']['name'])) {
            $doc_name = $_FILES['docdocente']['name'];
            $tmp_name1 = $_FILES['docdocente']['tmp_name'];
            $error1 = $_FILES['docdocente']['error'];

            if ($error == 0) {
                $doc_ex = pathinfo($doc_name, PATHINFO_EXTENSION);
                $doc_ex_to_lc = strtolower($doc_ex);

                $allowed_exs1 = array('pdf');
                if (in_array($doc_ex_to_lc, $allowed_exs1)) {

                    $new_doc_name = uniqid($matricula, true) . '.' . $doc_ex_to_lc;
                    $doc_upload_path = '../upload/' . $nome . '/' . $new_doc_name;
                    $doc_upload_path_banco = '../upload/' . $nome . '/' . $new_doc_name;
                    move_uploaded_file($tmp_name1, $doc_upload_path);
                    $usuarioDTO->setdocmatricula($doc_upload_path_banco);
                }
            }
        }

        $query = "INSERT INTO midletech.usuarios (nome,  senha, email, telefone, dtnasc, perfil, status, imagem, docmatricula, datacadastro)  
                                     VALUES ( :nome,   :senha, :email, :telefone, :dtnasc, :perfil, :status, :imagem, :docdocente, :datacasdastro);";

        $statement = $dbh->prepare($query);
        $statement->bindParam(':nome', $nome);
        $statement->bindParam(':senha', $senha);
        $statement->bindParam(':email', $email);


        $statement->bindParam(':telefone', $telefone);
        $statement->bindParam(':dtnasc', $dtnasc);

        $statement->bindParam(':imagem', $imagem);


        $statement->bindParam(':perfil', $perfil);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':datacasdastro', $datacadastro);

        $statement->bindValue(":imagem", $usuarioDTO->getImagem());
        $statement->bindValue(":docdocente", $usuarioDTO->getdocmatricula());



        $result = $statement->execute();

        if ($result) {
            header('location:../login/login.php?msg=Usuário cadastrado com sucesso');
        } else {
            header('location:index.php?error=Não foi possível cadastrar Usuário');

            $error = $dbh->errorInfo();
            print_r($error);
        }


        $dbh = null;
    }

} else if (isset($_POST['perfil']) == 'aluno_assinate') {
    $stmt = $dbh->prepare("SELECT * FROM midletech.usuarios WHERE email=?");

    $stmt->execute([$emailcheck]);

    $user = $stmt->fetch();
    if ($user) {
        echo '<script>alert("email exists");</script>';
        header('location:cadastrodocente.php?error=Email já Cadastrado');
    } else {




        $nome = strtoupper(trim($_POST['nome']));
        // $sobrenome = strtoupper(trim($_POST['sobrenome']));
        $senha = md5($_POST['senha']);
        $email = $_POST['email'];

        // $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $dtnasc = $_POST['dtnasc'];
        // $genero = $_POST['genero'];
        // $foto = $_POST['foto'];
        // $cep = $_POST['cep'];
        // $estado = $_POST['estado'];
        // $cidade = $_POST['cidade'];
        // $instituicao = $_POST['instituicao'];
        // $ = strtoupper($_POST['']);
        // $ = strtoupper($_POST['']);
        $perfil = "4";
        $status = "1";
        if (isset($_FILES['imagem']['name']) and !empty($_FILES['imagem']['name'])) {
            $img_name = $_FILES['imagem']['name'];
            $tmp_name = $_FILES['imagem']['tmp_name'];
            $error = $_FILES['imagem']['error'];

            if ($error == 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png', 'jfif');
                if (in_array($img_ex_to_lc, $allowed_exs)) {

                    mkdir("../upload/" . $nome);
                    $new_img_name = uniqid($nome, true) . '.' . $img_ex_to_lc;
                    $img_upload_path = '../upload/' . $nome . '/' . $new_img_name;
                    $img_upload_path_banco = 'upload/' . $nome . '/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $usuarioDTO->setImagem($img_upload_path_banco);
                }
            }
        }


        $query = "INSERT INTO midletech.usuarios (nome,  senha, email, telefone, dtnasc, perfil, status, imagem, datacadastro)  
                                     VALUES ( :nome,   :senha, :email, :telefone, :dtnasc, :perfil, :status, :imagem, :datacasdastro);";

        $statement = $dbh->prepare($query);
        $statement->bindParam(':nome', $nome);
        $statement->bindParam(':senha', $senha);
        $statement->bindParam(':email', $email);


        $statement->bindParam(':telefone', $telefone);
        $statement->bindParam(':dtnasc', $dtnasc);

        $statement->bindParam(':imagem', $imagem);


        $statement->bindParam(':perfil', $perfil);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':datacasdastro', $datacadastro);

        $statement->bindValue(":imagem", $usuarioDTO->getImagem());




        $result = $statement->execute();

        if ($result) {
            $query0 = "SELECT usuarios.idusuario from midletech.usuarios where email = '$email';";
            $statement4 = $dbh->query($query0);
            $usuarios = $statement4->rowCount();
            $row = $statement4->fetch();
            $date = date('Y-m-d H:i:s', strtotime('+ 30 days'));
            $idusuario = $row['idusuario'];
            $tipo = "30 dias gratis";
            $valor = "0";
            $perildo = "30";
            $query4 = "INSERT INTO midletech.assinaturas (idusuario, data, tipo, valor, perildo, data_de_expiracao) 
                        values(:idusuario, :data, :tipo, :valor, :perildo, :date);";
            $statement5 = $dbh->prepare($query4);
            $statement5->bindParam(':idusuario', $idusuario);
            $statement5->bindParam(':data', $datacadastro);
            $statement5->bindParam(':tipo', $tipo);
            $statement5->bindParam(':valor', $valor);
            $statement5->bindParam(':perildo', $perildo);
            $statement5->bindParam(':date', $date);
            $result5 = $statement5->execute();

            header('location:../login/login.php?msg=Usuário cadastrado com sucesso');
        } else {
            header('location:index.php?error=Não foi possível cadastrar Usuário');

            $error = $dbh->errorInfo();
            print_r($error);
        }


        $dbh = null;
    }

} else {
    $matriculacheck = $_POST['matricula'];

    $stmt = $dbh->prepare("SELECT * FROM midletech.usuarios WHERE email=? or matricula =?");

    $stmt->execute([$emailcheck, $matriculacheck]);

    $user = $stmt->fetch();
    if ($user) {
        echo '<script>alert("email exists");</script>';
        header('location:index.php?error=Email ou matricula já exitente');
    } else {




        $nome = strtoupper(trim($_POST['nome']));
        // $sobrenome = strtoupper(trim($_POST['sobrenome']));
        $senha = md5($_POST['senha']);
        $email = $_POST['email'];
        $matricula = $_POST['matricula'];
        // $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $dtnasc = $_POST['dtnasc'];
        // $genero = $_POST['genero'];
        // $foto = $_POST['foto'];
        // $cep = $_POST['cep'];
        // $estado = $_POST['estado'];
        // $cidade = $_POST['cidade'];
        $instituicao = $_POST['instituicao'];
        // $ = strtoupper($_POST['']);
        // $ = strtoupper($_POST['']);
        $perfil = "2";
        $status = "1";
        if (isset($_FILES['imagem']['name']) and !empty($_FILES['imagem']['name'])) {
            $img_name = $_FILES['imagem']['name'];
            $tmp_name = $_FILES['imagem']['tmp_name'];
            $error = $_FILES['imagem']['error'];

            if ($error == 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png', 'jfif');
                if (in_array($img_ex_to_lc, $allowed_exs)) {

                    mkdir("../upload/" . $nome);
                    $new_img_name = uniqid($matricula, true) . '.' . $img_ex_to_lc;
                    $img_upload_path = '../upload/' . $nome . '/' . $new_img_name;
                    $img_upload_path_banco = 'upload/' . $nome . '/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $usuarioDTO->setImagem($img_upload_path_banco);
                }
            }
        }

        if (isset($_FILES['docmatricula']['name']) and !empty($_FILES['docmatricula']['name'])) {
            $doc_name = $_FILES['docmatricula']['name'];
            $tmp_name1 = $_FILES['docmatricula']['tmp_name'];
            $error1 = $_FILES['docmatricula']['error'];

            if ($error == 0) {
                $doc_ex = pathinfo($doc_name, PATHINFO_EXTENSION);
                $doc_ex_to_lc = strtolower($doc_ex);

                $allowed_exs1 = array('pdf');
                if (in_array($doc_ex_to_lc, $allowed_exs1)) {

                    $new_doc_name = uniqid($matricula, true) . '.' . $doc_ex_to_lc;
                    $doc_upload_path = '../upload/' . $nome . '/' . $new_doc_name;
                    $doc_upload_path_banco = '../upload/' . $nome . '/' . $new_doc_name;
                    move_uploaded_file($tmp_name1, $doc_upload_path);
                    $usuarioDTO->setdocmatricula($doc_upload_path_banco);
                }
            }
        }

        $query = "INSERT INTO midletech.usuarios (nome,  senha, email, matricula,  telefone, dtnasc, instituicao, perfil, status, imagem, docmatricula, datacadastro)  
                                     VALUES ( :nome,   :senha, :email, :matricula,  :telefone, :dtnasc, :instituicao, :perfil, :status, :imagem, :docmatricula, :datacasdastro);";

        $statement = $dbh->prepare($query);
        $statement->bindParam(':nome', $nome);
        $statement->bindParam(':senha', $senha);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':matricula', $matricula);

        $statement->bindParam(':telefone', $telefone);
        $statement->bindParam(':dtnasc', $dtnasc);

        $statement->bindParam(':imagem', $imagem);

        $statement->bindParam(':instituicao', $instituicao);
        $statement->bindParam(':perfil', $perfil);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':datacasdastro', $datacadastro);
        $statement->bindValue(":imagem", $usuarioDTO->getImagem());
        $statement->bindValue(":docmatricula", $usuarioDTO->getdocmatricula());



        $result = $statement->execute();

        if ($result) {
            header('location:../login/login.php?msg=Usuário cadastrado com sucesso');
        } else {
            header('location:index.php?error=Não foi possível cadastrar Usuário');

            $error = $dbh->errorInfo();
            print_r($error);
        }


    }
    $dbh = null;
}
