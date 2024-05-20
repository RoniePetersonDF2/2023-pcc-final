<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <i class='bx bxs-user bx-md'></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <i class='bx bxs-user bx-lg'></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <?php
                                        require_once('../../controllers/usuarios_controller.php');
                                        if (isset($_SESSION['empresa'])) {
                                            require_once('../../controllers/empresas_controller.php');
                                            $empresasController = new EmpresasController();
                                            $empresa = $empresasController->show($_SESSION['empresa']['id']);
                                            echo '<span class="fw-semibold d-block">' . $empresa['nome_empresa'] . '</span>';
                                            echo '<small class="text-muted">Empresa - Plano Básico</small>';
                                        } elseif (isset($_SESSION['funcionario'])) {
                                            $usuariosController = new UsuariosController();
                                            $funcionario = $usuariosController->show($_SESSION['funcionario']['usuario_id']);
                                            echo '<span class="fw-semibold d-block">
                                            ' . $funcionario['nome'] . '
                                            </span>
                                            ';
                                            echo '<small class="text-muted">' . $_SESSION['funcionario']['cargo'] . '</small>';
                                        } elseif (isset($_SESSION['administrador'])) {
                                            $usuariosController = new UsuariosController();
                                            $administrador = $usuariosController->show($_SESSION['administrador']['usuario_id']);
                                            echo '<span class="fw-semibold d-block">
                                            ' . $administrador['nome'] . '
                                            </span>
                                            ';
                                            echo '<small class="text-muted">Administrador</small>';
                                        }
                                        ?>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <?php
                            if (isset($_SESSION['funcionario'])) {
                                echo '<a class="dropdown-item"
                            href="../funcionarios/usuario_update.php?id=' . $_SESSION['funcionario']['id'] . '">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Meu Perfil</span>
                            </a>';
                            } elseif (isset($_SESSION['empresa'])) {
                                echo '<a class="dropdown-item"
                            href="../empresas/edit.php?id=' . $_SESSION['empresa']['id'] . '&empresa=empresa">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Meu Perfil</span>
                            </a>';
                            } elseif (isset($_SESSION['administrador'])) {
                                echo '<a class="dropdown-item"
                            href="../administradores/edit.php?id=' . $_SESSION['administrador']['usuario_id'] . '">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Meu Perfil</span>
                            </a>';
                            }

                            ?>
                    </li>
                    <?php
                        if (isset($_SESSION['empresa'])) {
                            echo ' <li>
                            <a class="dropdown-item" href="#">
                                <span class="d-flex align-items-center align-middle">
                                    <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                    <span class="flex-grow-1 align-middle">Meu Plano</span>
                                    <span
                                        class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20"></span>
                                </span>
                            </a>
                        </li>
                        ';
                        }
                        ?>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="../logout.php">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Sair</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<?php
require_once('../../controllers/sessoes_controller.php');
require_once('../../controllers/pedidos_controller.php');
$pedidosController = new PedidosController();
?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">
        <div class="flex-grow-1">
            <h1>Pedidos</h1>
        </div>
    </div>
    <?php
    require_once('../../controllers/pedidos_controller.php');
    $pedidosController = new PedidosController();
    $pedidos = $pedidosController->show_pedidos($_GET['id']);
    ?>
    <div class="row">
        <?php foreach ($pedidos as $pedido) : ?>
        <div class="col-md-6">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Nome do Cliente:</label>
                            <h5 class="card-title"><?= $pedido['nome_cliente'] ?></h5>
                            <label for="">Pedido feito em: <?= $pedido['hora_inicio'] ?></label>
                            <?php if (!empty($pedido['hora_fim'])) : ?>
                            <label for="">Pedido concluído em: <?= $pedido['hora_inicio'] ?></label>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <label for="">Descrição do pedido:</label>
                            <p class=""><?= $pedido['descricao'] ?></p>
                            <?php if (!empty($pedido['status_pedido'])) : ?>
                            <p>Status do pedido: <?= $pedido['status_pedido'] ?></p>
                            <?php else : ?>
                            <p>Status não definido</p>
                            <?php endif; ?>
                            <p>Valor total do pedido: R$ <?= $pedido['valor_total'] ?></p>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <form method="POST" class="d-inline-block">
                            <input type="hidden" name="id" value="<?= $pedido['id'] ?>">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir o pedido do cliente <?= $pedido['nome_cliente'] ?> ?')">Excluir</button>
                        </form>
                        <a href="../pedidos/show.php?id=<?= $pedido['id'] ?>" class="btn btn-primary ml-2">Refeições</a>
                        <a href="../pedidos/edit.php?id=<?= $pedido['id'] ?>" class="btn btn-info ml-2">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php if (empty($pedidos)) : ?>
    <div class="col-12">
        <h5 class="text-center">Nenhum pedido encontrado.</h5>
    </div>
    <?php endif; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $pedidosController->delete($_POST['id']);
        header("Location: index.php");
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const sessoesQuantidade = <?= $sessoes_quantidade ?>;
const funcionariosQuantidade = <?= $funcionarios_quantidade ?>;
const produtosQuantidade = <?= $produtos_quantidade ?>;
const categoriasQuantidade = <?= $categorias_quantidade ?>;


const dashboardChart = document.getElementById('dashboardChart');
new Chart(dashboardChart, {
    type: 'bar',
    data: {
        labels: ['Sessões', 'Funcionários', 'Produtos', 'Categorias'],
        datasets: [{
            label: 'Quantidade',
            data: [sessoesQuantidade, funcionariosQuantidade, produtosQuantidade, categoriasQuantidade],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>
<?php require_once '../../views/layouts/user/footer.php'; ?>