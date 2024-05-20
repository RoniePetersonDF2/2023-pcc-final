<?php
    
    require_once '../../controllers/enderecos_controller.php';
    require_once '../../controllers/empresas_controller.php';
    require_once '../../models/database/conexao.php';
    session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $db = Conexao::getInstance();

    //Vai para empresa
    $nome_empresa = isset($_POST['nome_empresa']) ? $_POST['nome_empresa'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
    $senha = isset($_POST['senha']) ? md5($_POST['senha']) : '';
    //Vai para endereços
    $rua = isset($_POST['rua']) ? $_POST['rua'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['email'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';


    //Codigo para debug: echo "<pre>".print_r($_POST)."</pre>";

    //Envia a array post para endereços
    $enderecoController = new EnderecosController;
    $endereco = $enderecoController->create($_POST);

    //Envia a array post para empresa
    $empesaController = new EmpresasController;
    $empresa = $empesaController->create($_POST, $endereco);

    $query = "SELECT * FROM `sysfood`.`empresas` WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $empresa);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row) {
        $_SESSION['empresa'] = [
            'id' => $row['id'],
            'nome_empresa' => $row['nome_empresa'],
            'email' => $row['email']
        ];
        header('location: ../dashboard/bem_vindo.php?registro_sucesso');
    }

}


?>