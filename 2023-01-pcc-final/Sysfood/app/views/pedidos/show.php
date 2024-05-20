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
<style>
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
</style>
<div class="container">
    <?php
    require_once('../../controllers/pedidos_controller.php');
    require_once('../../controllers/pedido_produtos_controller.php');
    $pedido_produtos_Controller = new PedidoProdutosController();
    $pedidosController = new PedidosController();
    $pedido = $pedidosController->show($_GET['id'])
    ?>
    <div class="d-flex justify-content-between align-items-center" style="margin-top: 20px">
        <div class="flex-grow-1">
            <h1>Refeições</h1>
        </div>
        <?php
        if ($pedido['status_pedido'] != 'Finalizado') {
            require_once('../../controllers/produtos_controller.php');

            $produtosController = new ProdutosController();
            if (isset($_SESSION['funcionario'])) {
                $produtos_quantidade = $produtosController->index_quantidade($_SESSION['funcionario']['empresa_id']);
                if ($produtos_quantidade > 0) {
                    echo '<a href="../pedido_produtos/create.php?id_pedido=' . $_GET['id'] . '" class="btn btn-primary">Nova
                Refeição</a>';
                } else {
                    echo '<h6 style="color: red;">Não existe nenhum produto cadastrado!</h6>';
                }
            }
        }
        ?>
    </div>
    <hr>
    <div>
        <div class="d-flex justify-content-around">
            <h5 for="">Nome do cliente: <?= $pedido['nome_cliente'] ?> </h5>
            <h5 for="">Status do pedido: <?= $pedido['status_pedido'] ?></h5>
            <h5 for="">Valor total: <label for="" style="color:green">R$
                    <?= $pedido_produtos_Controller->valor_total($_GET['id']) ?></label>
                <h5 for="">Hora do pedido: <?= $pedido['hora_inicio'] ?></h5>
            </h5>
        </div>
    </div>
    <?php
    require_once('../../controllers/pedido_produtos_controller.php');
    require_once('../../controllers/produtos_controller.php');
    $produtos_Controller = new ProdutosController();
    $pedido_produtosController = new PedidoProdutosController();
    $pedido_produtos = $pedido_produtosController->index($_GET['id'])
    ?>

    <div class="card-container">
        <?php if (!empty($pedido_produtos)) : ?>
        <?php foreach ($pedido_produtos as $pedido_produto) : ?>
        <?php $produto = $produtos_Controller->show($pedido_produto['produto_id']) ?>
        <div class="card mb-8" style="width: 300px; margin-bottom: 20px;">
            <img src="../../uploads/<?= $produto['imagem']; ?>" alt="" class="card-img-top h-100">
            <div class="card-body">
                <h5 class="card-title text-center"><?= $produto['nome_produto'] ?></h5>
                <p class="card-text text-center"><?= $produto['descricao'] ?>.</p>
                <p class="card-text text-center"><?= $pedido_produto['quantidade'] ?> Refeições</p>
                <p class="card-text text-center">Total: R$<?= $pedido_produto['valor_total'] ?></p>
            </div>
            <?php
                    if ($pedido['status_pedido'] != 'Finalizado') {
                        echo '<div class="text-center" style="margin-bottom: 20px;">
                <form method="POST" class="d-inline-block">
                        <input type="hidden" name="id" value="' . $pedido_produto['id'] . '">
                        <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm(\'Tem certeza que deseja excluir o produto ' . $produto['nome_produto'] . ' do pedido?\')">
                    Excluir
                </button>
                </form> 
                <a href="../pedido_produtos/edit.php?id=' . $pedido_produto['id'] . '&pedido_id=' . $_GET['id'] . '"
                class="btn btn-sm btn-info ml-2">Editar</a>
            </div>';
                    }
                    ?>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <h5>Nenhum Refeição encontrado.</h5>
        <?php endif; ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $pedido_produtosController->delete($_POST['id']);
            header("Location: show.php?id=" . $_GET['id']);
        }
        ?>
    </div>
    <div class="text-center">
        <a class="btn btn-secondary" href="pedidos_na_fila.php">Voltar</a>
    </div>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>