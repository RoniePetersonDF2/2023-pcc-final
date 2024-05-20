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
    require_once('../../controllers/enderecos_controller.php');
    require_once('../../controllers/usuarios_controller.php');
    require_once('../../controllers/funcionarios_controller.php');
    $funcionariosController = new FuncionariosController();
    $funcionario = $funcionariosController->show($_GET['id']);
    $enderecosController = new EnderecosController();
    $endereco_funcionario = $enderecosController->show($funcionario['endereco_id']);
    $usuariosController = new UsuariosController();
    $usuario_funcionario = $usuariosController->show($funcionario['usuario_id']);
    ?>
    <h1>Editar meus dados</h1>
    <hr>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-4">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="<?= $usuario_funcionario['nome'] ?>" />
            </div>
            <div class="col-md-4">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control"
                    value="<?= $usuario_funcionario['sobrenome'] ?>" />
            </div>
            <div class="col-md-4">
                <label>Data de nascimento</label>
                <input type="date" name="data_nascimento" class="form-control"
                    value="<?= $usuario_funcionario['data_nascimento'] ?>" />
            </div>
        </div>

        <div class="row">
            <input type="hidden" name="cargo" value="<?= $funcionario['cargo'] ?>" required>
            <div class="col-md-4">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?= $funcionario['cpf'] ?>" />
            </div>
            <div class="col-md-4">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $usuario_funcionario['email'] ?>" />
            </div>
            <div class="col-md-4">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" />
            </div>
        </div>
        <label for="">Endereço</label>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label>Rua</label>
                <input type="text" name="rua" class="form-control" value="<?= $endereco_funcionario['rua'] ?>" />
            </div>

            <div class="col-md-6">
                <label>Bairro</label>
                <input type="text" name="bairro" class="form-control" value="<?= $endereco_funcionario['bairro'] ?>" />
            </div>

            <div class="col-md-6">
                <label>Cidade</label>
                <input type="text" name="cidade" class="form-control" value="<?= $endereco_funcionario['cidade'] ?>" />
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <input type="text" name="estado" class="form-control" value="<?= $endereco_funcionario['estado'] ?>" />
            </div>

            <div class="col-md-6">
                <label>CEP</label>
                <input type="text" name="cep" class="form-control" value="<?= $endereco_funcionario['cep'] ?>" />
            </div>

            <div class="col-md-6">
                <label>Complemento</label>
                <input type="text" name="complemento" class="form-control"
                    value="<?= $endereco_funcionario['complemento'] ?>" />
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="../dashboard/bem_vindo.php" class="btn btn-secondary">Cancelar</a>
        </div>
</div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $test = $funcionariosController->update($_GET['id'], $_POST, $endereco_funcionario['id'], $usuario_funcionario['id']);
    header('Location: ../dashboard/bem_vindo.php?user_att');
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>