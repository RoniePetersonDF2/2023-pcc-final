<?php
session_start();
require_once('../../controllers/pedidos_controller.php');
$pedidosController = new PedidosController();
$pedidosController->status_em_preparacao($_GET['id'], $_SESSION['funcionario']['id']);
header("Location: pedidos_em_preparacao.php");
?>