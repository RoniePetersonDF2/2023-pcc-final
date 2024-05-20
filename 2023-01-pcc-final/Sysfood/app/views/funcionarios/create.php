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
    <h1 style="margin-top: 20px">Cadastrar Funcionário</h1>
    <hr>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control f_create_edit" required />
            </div>
            <div class="col-md-3">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control f_create_edit" required />
            </div>
            <div class="col-md-3">
                <label>Data de nascimento</label>
                <input type="date" name="data_nascimento" class="form-control f_create_edit" required />
            </div>
            <div class="col-md-3">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control f_create_edit" maxlength="14" required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Cargo</label>
                <select name="cargo" id="cargo" class="form-control" required>
                    <?php
                    if ($_SESSION['empresa']) {
                        echo '
                            <option value="Funcionário Comum">Funcionário Comum</option>
                            <option value="Funcionário Cozinha">Funcionário Cozinha</option>
                            <option value="Funcionário Gerente">Funcionário Gerente</option>
                            <option value="Funcionário Supervisor">Funcionário Supervisor</option>
                             ';
                    } elseif ($_SESSION['funcionario'] && $_SESSION['funcionario']['cargo'] == 'Funcionário Supervisor') {
                        echo '
                            <option value="Funcionário Comum">Funcionário Comum</option>
                            <option value="Funcionário Cozinha">Funcionário Cozinha</option>
                            <option value="Funcionário Gerente">Funcionário Gerente</option>
                            ';
                    } elseif ($_SESSION['funcionario'] && $_SESSION['funcionario']['cargo'] == 'Funcionário Gerente') {
                        echo '
                            <option value="Funcionário Comum">Funcionário Comum</option>
                            <option value="Funcionário Cozinha">Funcionário Cozinha</option>
                            ';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control f_create" required />
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
</div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../controllers/enderecos_controller.php');
    require_once('../../controllers/usuarios_controller.php');
    require_once('../../controllers/funcionarios_controller.php');

    $_POST["cpf"] = str_replace(".", "", $_POST["cpf"]);
    $_POST["cpf"] = str_replace("-", "", $_POST["cpf"]);

    $enderecosController = new EnderecosController();
    $endereco = $enderecosController->create($_POST);
    $usuariosController = new UsuariosController();
    $usuario = $usuariosController->create($_POST);
    $funcionariosController = new FuncionariosController();
    if ($_SESSION['empresa']) {
        $funcionariosController->create($_POST, $endereco, $usuario, $_SESSION['empresa']['id']);
    } elseif ($_SESSION['funcionario']) {
        $funcionariosController->create($_POST, $endereco, $usuario, $_SESSION['funcionario']['empresa_id']);
    }
    header('Location: index.php?funcionario_criado');
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>