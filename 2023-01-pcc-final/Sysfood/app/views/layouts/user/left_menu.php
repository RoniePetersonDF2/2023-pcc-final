<?php
if (!$_SESSION) {
    header('Location: ../index.php');
}
?>
<ul class="menu-inner py-1">
    <li class="menu-item">
        <a href="../dashboard/bem_vindo.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <?php
    if (isset($_SESSION['administrador'])) {
        echo '<li class="menu-item">
        <a href="../administradores/index.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Administradores</div>
        </a>
    </li>';
        echo '<li class="menu-item">
        <a href="../empresas/index.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Empresas</div>
        </a>
    </li>';
    }
    ?>

    <?php
    if (isset($_SESSION['empresa']) || isset($_SESSION['funcionario'])){
    if (isset($_SESSION['empresa']) || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
        echo '<li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Sessões</div>
                </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="../sessoes/index.php" class="menu-link">
                                <div data-i18n="Without menu">Sessões em andamento</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="../sessoes/index_finalizado.php" class="menu-link">
                                <div data-i18n="Without navbar">Sessões finalizadas</div>
                            </a>
                        </li>
                    </ul>
                </li>';
        echo '<li class="menu-item">
        <a href="../funcionarios/index.php" class="menu-link">';
        echo '<i class="' . 'menu-icon tf-icons bx bxs-user-account' . '"></i>';
        echo '<div>Funcionários</div>
                </a>
            </li>';
        echo '<li class="menu-item">
        <a href="../produtos/index.php" class="menu-link">';
        echo '<i class="' . 'menu-icon tf-icons bx bx-food-menu' . '"></i>';
        echo '<div>Produtos</div>
            </a>
        </li>';
        echo '<li class="menu-item">
        <a href="../categorias/index.php" class="menu-link">';
        echo '<i class="' . 'menu-icon tf-icons bx bx-receipt' . '"></i>';
        echo '<div>Categorias</div>
            </a>
        </li>';
    }
}
    ?>
    <?php
    if (isset($_SESSION['funcionario'])) {
        if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Comum') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Cozinha') == 0) {
            echo '<li class="menu-item" id="prod_func">
            <a href="../produtos/index.php" class="menu-link">';
            echo '<i class="' . 'menu-icon tf-icons bx bx-food-menu' . '"></i>';
            echo '<div>Produtos</div>
                </a>
            </li>';
            echo '<li class="menu-item menu-func" id="cat_func">
            <a href="../categorias/index.php" class="menu-link">';
            echo '<i class="' . 'menu-icon tf-icons bx bx-receipt' . '"></i>';
            echo '<div>Categorias</div>
                </a>
            </li>';
        }
    }
    ?>
    <?php
    if (isset($_SESSION['funcionario']['sessao_id'])) {
        echo '<li class="menu-item" id="pedido_principal_func">
        <a href="javascript:void(0);" class="menu-link menu-toggle">';
        echo '<i class="' . 'menu-icon tf-icons bx bxs-user-account' . '"></i>';
        echo '<div data-i18n="Layouts">Pedidos</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item" id="pedido_fila_func">
                <a href="../pedidos/pedidos_na_fila.php" class="menu-link">
                    <div data-i18n="Without menu">Pedidos na fila</div>
                </a>
            </li>
            <li class="menu-item" id="pedido_preparacao_func">
                <a href="../pedidos/pedidos_em_preparacao.php" class="menu-link">
                    <div data-i18n="Without navbar">Pedidos em andamento</div>
                </a>
            </li>
            <li class="menu-item" id="pedido_finalizado_func">
                <a href="../pedidos/pedidos_finalizados.php" class="menu-link">
                    <div data-i18n="Without navbar">Pedidos finalizados</div>
                </a>
            </li>
        </ul>
    </li>';
    }
    ?>

</ul>
</aside>


<div class="layout-page">