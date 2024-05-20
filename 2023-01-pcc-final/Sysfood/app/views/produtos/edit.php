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
<div class="container mt-5">
    <h1>Editar Produto</h1>
    <hr>
    <?php
    require_once('../../controllers/produtos_controller.php');

    $produtosController = new ProdutosController();
    $produto = $produtosController->show($_GET['id']);

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_produto">Nome do produto:</label>
            <input type="text" name="nome_produto" id="nome_produto" class="form-control"
                value="<?= $produto['nome_produto'] ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do produto:</label>
            <textarea name="descricao" id="descricao" rows="5"
                class="form-control"><?= $produto['descricao'] ?></textarea>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-2 text-center">
                <label for="valor">Preço do Produto:</label>
                <input maxlength="8" type="text" name="valor" id="valor" class="form-control preco_class"
                    value="<?= $produto['valor'] ?>" required>
            </div>
            <div class="col-md-2 text-center">
                <?php
                require_once('../../controllers/categorias_controller.php');
                $categoriasController = new CategoriasController();
                if (isset($_SESSION['funcionario'])) {
                    $categorias = $categoriasController->index($_SESSION['funcionario']['empresa_id']);
                } elseif (isset($_SESSION['empresa'])) {
                    $categorias = $categoriasController->index($_SESSION['empresa']['id']);
                }
                ?>
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required
                    value="<?= $produto['categoria_id'] ?>">
                    <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['id'] ?>">
                        <?= $categoria['nome_categoria'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-8">
                <label for="imagem">Foto do produto:</label>
                <input type="file" name="imagem" id="imagem" class="form-control">
            </div>
        </div>
        <hr>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_POST["valor"] = str_replace("R$", "", $_POST["valor"]);
    $_POST["valor"] = str_replace(",", ".", $_POST["valor"]);

    $produtosController->update($produto['id'], $_POST);
    header('Location: index.php?produto_editado');
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>