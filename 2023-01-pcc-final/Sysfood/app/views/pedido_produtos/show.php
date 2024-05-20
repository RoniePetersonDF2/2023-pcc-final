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
<div class="container">
    <?php
            require_once('../../controllers/pedidos_controller.php');
            
            $pedidosController = new PedidosController();
            $pedido = $pedidosController->show($_GET['id'])
        ?>
    <h1>Detalhes do Pedido</h1>
    <table class="table">
        <thead>
            <h1>
                Pedidos
            </h1>
            <tr>
                <th>Descrição do pedido</th>
                <th>Nome do cliente</th>
                <th>Hora de inicio</th>
                <th>Hora de Fim</th>
                <th>Valor total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../../controllers/pedidos_controller.php');
            $pedidosController = new PedidosController();
            $pedidos = $pedidosController->show_pedidos($_GET['id']);
            ?>
            <?php if (!empty($pedidos)) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
            <tr>
                <td><?= $pedido['descricao']; ?></td>
                <td><?= $pedido['nome_cliente']; ?></td>
                <td><?= $pedido['hora_inicio']; ?></td>
                <td><?= $pedido['hora_fim']; ?></td>
                <td><?= $pedido['valor_total']; ?></td>
                <td><?= $pedido['status_pedido']; ?></td>
                <td colspan="6">
                    <a href="../pedidos/show.php?id=<?= $pedido['id'] ?>" class="btn btn-sm btn-primary">Pesquisar</a>
                    <a href="../pedidos/edit.php?id=<?= $pedido['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                    <form action="<?= $pedidosController->delete($pedido['id']) ?>" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Nenhuma pedido encontrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a class="btn btn-secondary" href="../sessoes/show.php?id=<?= $pedido['sessao_id'] ?>">Voltar</a>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>