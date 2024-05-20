<?php
require_once "../../models/database/conexao.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    //função md5 temporariamente removida
    $senha = isset($_POST['senha']) ? md5($_POST['senha']) : '';

    $dbh = Conexao::getInstance();

    //Query de verificação se é uma empresa
    $query = "SELECT * FROM `sysfood`.`empresas` WHERE email = :email AND senha = :senha";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //Query de verificação se é um funcionario
    $query_usuario = "SELECT * FROM `sysfood`.`usuarios` WHERE email = :email AND senha = :senha";
    $stmt_usuario = $dbh->prepare($query_usuario);
    $stmt_usuario->bindParam(':email', $email);
    $stmt_usuario->bindParam(':senha', $senha);

    $stmt_usuario->execute();
    $row_usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['empresa'] = [
            'id' => $row['id'],
            'nome_empresa' => $row['nome_empresa'],
            'email' => $row['email']
        ];
        header('location: ../dashboard/bem_vindo.php?login_sucesso');
    } elseif ($row_usuario) {

        $query_admin = "SELECT * FROM `sysfood`.`administradores` WHERE usuario_id = :id";
        $stmt_admin = $dbh->prepare($query_admin);
        $stmt_admin->bindParam(':id', $row_usuario['id']);
        $stmt_admin->execute();
        $row_admin = $stmt_admin->fetch(PDO::FETCH_ASSOC);
        if ($row_admin) {
            $_SESSION['administrador'] = [
                'usuario_id' => $row_admin['usuario_id'],
                'id' => $row_admin['id'],
                'nome' => $row_usuario['nome'],
                'email' => $row_usuario['email']
            ];
            header('location: ../dashboard/bem_vindo.php');
        } else {
            $query_funcionario = "SELECT * FROM `sysfood`.`funcionarios` WHERE usuario_id = :id";
            $stmt_funcionario = $dbh->prepare($query_funcionario);
            $stmt_funcionario->bindParam(':id', $row_usuario['id']);
            $stmt_funcionario->execute();
            $row_funcionario = $stmt_funcionario->fetch(PDO::FETCH_ASSOC);

            $_SESSION['funcionario'] = [
                'usuario_id' => $row_funcionario['usuario_id'],
                'id' => $row_funcionario['id'],
                'nome' => $row_usuario['nome'],
                'email' => $row_usuario['email'],
                'cargo' => $row_funcionario['cargo'],
                'empresa_id' => $row_funcionario['empresa_id']
            ];

            //Aqui vai ter uma condicional pra ver qual pagina ser redirecionado, tipo, adm vai pra pag adm e funcionario comum vai pra funcionario comum
            header('location: ../dashboard/bem_vindo.php');
        }
    } else {
        session_destroy();
        header('location: ../index.php?login_invalido' . $row_F['id']);
    }
}