<?php
require_once('../../controllers/pedidos_controller.php');
$pedidosController = new PedidosController();
$pedidosController->status_finalizado($_GET['id']);
header("Location: pedidos_finalizados.php");
?>