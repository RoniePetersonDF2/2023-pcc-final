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
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <form method="GET" action="">
                    <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Buscar..."
                        aria-label="Search..." />
                </form>
            </div>
        </div>
        <!-- /Search -->

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
    if (isset($_SESSION['funcionario'])) {
        if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0 || isset($_SESSION['empresa'])) {
            echo '<div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">
                <div class="flex-grow-1">
                    <h1>Categorias</h1>
                </div>
                <a href="create.php" class="btn btn-primary">Nova Categoria</a>
                </div>';
        } else {
            echo '<div style="margin-top: 20px;">
            <h1>Categorias</h1>
            </div>';
        }
    } elseif (isset($_SESSION['empresa'])) {
        echo '<div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">
                <div class="flex-grow-1">
                    <h1>Categorias</h1>
                </div>
                <a href="create.php" class="btn btn-primary">Nova Categoria</a>
                </div>';
    }

    require_once('../../controllers/categorias_controller.php');

    $categoriasController = new CategoriasController();
    if (isset($_GET['search'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $nome = $_GET['search'];
            if (isset($_SESSION['funcionario'])) {
                $categorias = $categoriasController->index($_SESSION['funcionario']['empresa_id'], $nome);
            } elseif (isset($_SESSION['empresa'])) {
                $categorias = $categoriasController->index($_SESSION['empresa']['id'], $nome);
            }
        }
    } else {
        if (isset($_SESSION['funcionario'])) {
            $categorias = $categoriasController->index($_SESSION['funcionario']['empresa_id']);
        } elseif (isset($_SESSION['empresa'])) {
            $categorias = $categoriasController->index($_SESSION['empresa']['id']);
        }
    }
    ?>
    <div class="row">
        <?php if (!empty($categorias)) : ?>
        <?php foreach ($categorias as $categoria) : ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <div class=" card-body text-center">
                    <h5 class="card-title"><?= $categoria['nome_categoria'] ?></h5>
                    <?php
                            if (isset($_SESSION['funcionario'])) {
                                if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
                                    echo '<div>
                                <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id_categoria" value=' . $categoria["id"] . '>
                            <button type="submit" class="btn btn-sm btn-danger"';
                                    echo 'onclick="return confirm(' . 'Tem certeza que deseja excluir a categoria' . $categoria["nome_categoria"] . '?)">Excluir</button>';
                                    echo '</form>
                            <a href="edit.php?id=' . $categoria["id"] . '" class="btn btn-sm btn-info">Editar</a>
                        </div>';
                                }
                            } elseif (isset($_SESSION['empresa'])) {
                                echo '<div>
                                <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id_categoria" value=' . $categoria["id"] . '>
                            <button type="submit" class="btn btn-sm btn-danger"';
                                echo "<button onclick='return confirm(\"Tem certeza que deseja excluir a categoria " . $categoria["nome_categoria"] . "?\")'>Excluir</button>";
                                echo '</form>
                            <a href="edit.php?id=' . $categoria["id"] . '" class="btn btn-sm btn-info">Editar</a>
                        </div>';
                            }
                            ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <div>
            <h5 colspan="6" class="text-center">Nenhuma categoria encontrada.</h5>
        </div>
        <?php endif; ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $categoriasController->delete($_POST['id_categoria']);
            header("Location: index.php?categoria_deletada");
        }
        ?>
    </div>
    <?php require_once '../../views/layouts/user/footer.php'; ?>