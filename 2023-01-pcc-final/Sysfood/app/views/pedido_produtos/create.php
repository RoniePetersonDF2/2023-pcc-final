<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<script>
window.onload = function() {
    var produtoSelect = document.getElementById("produto_id");
    produtoSelect.addEventListener("change", exibirDadosProduto);

    function exibirDadosProduto() {
        var produtoId = produtoSelect.value;
        var produto = buscarProdutoPorId(produtoId);
        exibirDados(produto, produtoId);
    }

    function buscarProdutoPorId(id) {
        return fetch('produtos.php?id=' + id)
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Erro ao buscar o produto');
                }
            })
            .then(function(produto) {
                return produto;
            })
            .catch(function(error) {
                console.error(error);
            });
    }

    function exibirDados(produto, produtoid) {
        var produtoPromise = buscarProdutoPorId(produtoid);
        produtoPromise.then(function(resultado) {
            var produto = resultado;

            var nomeProdutoElement = document.getElementById("nome_produto");
            var precoProdutoElement = document.getElementById("preco_produto");
            var imagemProdutoElement = document.getElementById("imagem");
            var descricaoProdutoElement = document.getElementById("descricao_produto");

            const quantidadeInput = document.getElementById("quantidade");
            const totalGroup = document.getElementById("total_group");

            quantidadeInput.addEventListener("input", function() {
                const quantidade = parseFloat(quantidadeInput.value);

                if (quantidade) {
                    totalGroup.style.display = "block";
                } else {
                    totalGroup.style.display = "none";
                }
            });

            descricaoProdutoElement.textContent = produto.descricao
            imagemProdutoElement.src = "../../uploads/" + produto.imagem
            nomeProdutoElement.textContent = produto.nome_produto;
            precoProdutoElement.textContent = "R$ " + produto.valor;
        }).catch(function(error) {
            // Ocorreu um erro ao resolver a promessa
            console.error(error);
        });

    }

    exibirDadosProduto();

    document.getElementById("quantidade").addEventListener("input", calcularValorTotal);

    function calcularValorTotal() {
        var quantidade = parseInt(document.getElementById("quantidade").value);
        var precoProdutoTexto = document.getElementById("preco_produto").textContent;
        var precoProduto = parseFloat(precoProdutoTexto.replace("R$ ", ""));
        var valorTotal = 0;

        if (!isNaN(precoProduto) && quantidade > 0) {
            valorTotal = quantidade * precoProduto;
        }


        document.getElementById("valor_total").textContent = "R$ " + valorTotal.toFixed(2);
    }

};
</script>
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
    <h1>Adicionar Refeição</h1>
    <hr>
    <form action="" method="post">

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <img id="imagem"
                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nome_produto">Nome do Produto:</label>
                                    <p id="nome_produto"></p>
                                </div>
                                <div class="form-group">
                                    <label for="preco_produto">Preço do Produto:</label>
                                    <p id="preco_produto"></p>
                                </div>
                                <div class="form-group">
                                    <label for="descricao_produto">Descrição do Produto:</label>
                                    <p id="descricao_produto"></p>
                                </div>
                                <div class="form-group" id="total_group" style="display: none;">
                                    <label for="valor_total">Total:</label>
                                    <p id="valor_total"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <?php
                        require_once('../../controllers/produtos_controller.php');
                        $produtosController = new ProdutosController();
                        if (isset($_SESSION['funcionario'])) {
                            $produtos = $produtosController->index($_SESSION['funcionario']['empresa_id']);
                        } elseif (isset($_SESSION['empresa'])) {
                            $produtos = $produtosController->index($_SESSION['empresa']['id']);
                        }
                        ?>
                    <label for="produto_id">Produto:</label>
                    <select name="produto_id" id="produto_id" class="form-control" required>
                        <?php foreach ($produtos as $produto) : ?>
                        <option value="<?= $produto['id'] ?>">
                            <?= $produto['nome_produto'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" name="quantidade" id="quantidade" class="form-control" required>
                </div>
            </div>

        </div>

        <div class="text-center" style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="../pedidos/show.php?id=<?= $_GET['id_pedido']?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php
require_once('../../controllers/pedido_produtos_controller.php');

$pedido_produtosController = new PedidoProdutosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pedido_produtosController->create($_POST, $_GET['id_pedido']);
    header('Location: ../pedidos/show.php?id=' . $_GET['id_pedido']);
}
?>

<?php require_once '../../views/layouts/user/footer.php'; ?>