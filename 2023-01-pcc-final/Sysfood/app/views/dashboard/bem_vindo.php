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
    require_once('../../controllers/sessoes_controller.php');
    $sessoesController = new SessoesController();
    if (isset($_SESSION['funcionario'])) {
        $sessoes = $sessoesController->index($_SESSION['funcionario']['empresa_id']);
    } elseif (isset($_SESSION['empresa'])) {
        $sessoes = $sessoesController->index($_SESSION['empresa']['id']);
    }
    if (isset($_SESSION['funcionario']) && isset($_SESSION['funcionario']['cargo']) && ($_SESSION['funcionario']['cargo'] == "Funcionário Comum" || $_SESSION['funcionario']['cargo'] == "Funcionário Cozinha") && !empty($sessoes)) {
        echo '<div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 20px;">
        <label style="margin-right: 20px">Selecione uma Sessão:</label>
            <form action="" method="post" style="display: flex;">
                <select name="sessao" id="sessao" class="form-control" required>';
        foreach ($sessoes as $sessao) {
            echo '<option value="' . $sessao["id"] . '">' . $sessao["nome_sessao"] . '</option>';
        }
        echo '</select>
        <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Selecionar</button>
        </form>
    </div>';
    }
    ?>
    <?php
    require_once('../../controllers/funcionarios_controller.php');
    require_once('../../controllers/produtos_controller.php');
    require_once('../../controllers/categorias_controller.php');
    $funcionariosController = new FuncionariosController();
    $produtosController = new ProdutosController();
    $categoriasController = new CategoriasController();

    if (isset($_SESSION['funcionario'])) {
        $sessoes = $sessoesController->index($_SESSION['funcionario']['empresa_id']);
    } elseif (isset($_SESSION['empresa'])) {
        $sessoes = $sessoesController->index($_SESSION['empresa']['id']);
    }
    if (isset($_SESSION['empresa'])) {
        $funcionarios_quantidade = $funcionariosController->index_quantidade($_SESSION['empresa']['id']);
        $sessoes_quantidade = $sessoesController->index_quantidade($_SESSION['empresa']['id']);
        $produtos_quantidade = $produtosController->index_quantidade($_SESSION['empresa']['id']);
        $categorias_quantidade = $categoriasController->index_quantidade($_SESSION['empresa']['id']);
    } elseif (isset($_SESSION['funcionario'])) {
        $funcionarios_quantidade = $funcionariosController->index_quantidade($_SESSION['funcionario']['empresa_id']);
        $sessoes_quantidade = $sessoesController->index_quantidade($_SESSION['funcionario']['empresa_id']);
        $produtos_quantidade = $produtosController->index_quantidade($_SESSION['funcionario']['empresa_id']);
        $categorias_quantidade = $categoriasController->index_quantidade($_SESSION['funcionario']['empresa_id']);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['funcionario']['sessao_id'] = $_POST['sessao'];
        header('Location: ../pedidos/pedidos_na_fila.php?sessao_selecionada');
    }
    ?>
    <?php
    if (isset($_SESSION['administrador'])){
        echo '<h1>Área administrativa!</h1>';
    }
    if (isset($_SESSION['empresa']) || isset($_SESSION['funcionario'])){
    if (isset($_SESSION['empresa']) || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
        require_once('dados_gerais.php');
    } elseif (isset($_SESSION['funcionario']['sessao_id'])) {
        $sessao = $sessoesController->show($_SESSION['funcionario']['sessao_id']);
        echo '<h1>Você está atualmente na sessão ' . $sessao['nome_sessao'] . '!</h1>';
    } elseif (empty($sessoes) && !isset($_SESSION['administrador'])) {
        echo '<h2 style="color: red" class="text-center">Não existe uma Sessão em andamento no momento!</h2>';
    } else {
        echo '<div>
        <h1 style="margin-top: -10px;">Escolha uma Sessão!</h1>
        </div>';
    }
    }
    ?>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>