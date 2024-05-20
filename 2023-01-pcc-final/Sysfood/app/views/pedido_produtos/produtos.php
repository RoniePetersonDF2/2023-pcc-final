<?php
require_once('../../controllers/produtos_controller.php');

// Verifique se o ID do produto foi fornecido na solicitação
if (isset($_GET['id'])) {
    $produtosController = new ProdutosController();
    $produto = $produtosController->show($_GET['id']);

    // Verifique se o produto foi encontrado
    if ($produto) {
        // Defina o cabeçalho de resposta para indicar que estamos retornando JSON
        header('Content-Type: application/json');

        // Retorna os dados do produto como JSON
        echo json_encode($produto);
    } else {
        // Retorna uma resposta de erro se o produto não foi encontrado
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Produto não encontrado']);
    }
} else {
    // Retorna uma resposta de erro se o ID do produto não foi fornecido
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'ID do produto não fornecido']);
}