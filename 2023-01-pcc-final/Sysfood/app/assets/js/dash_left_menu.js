//Esses codigos aqui servem para mudar a cor das opçoes do left menu quando sao selecionadas

//Empresa, gerente e supervisor
const opcoes = document.querySelectorAll('.menu-item');

//PAGINAS PRINCIPAIS
if (window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php" || window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php?login_sucesso" || window.location.href == "http://localhost/Sysfood/app/views/dashboard/bem_vindo.php?registro_sucesso") {
    opcoes[0].classList.add('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index_finalizado.php" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/create.php" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?nova_sessao_criada" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?sessao_finalizada" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?sessao_editada" || window.location.href == "http://localhost/Sysfood/app/views/sessoes/index.php?sessao_deletada") {
    opcoes[2].classList.add('active')
    opcoes[1].classList.add('active')
}else{
    opcoes[2].classList.remove('active')
    opcoes[1].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/sessoes/index_finalizado.php") {
    opcoes[3].classList.add('active')
    opcoes[2].classList.remove('active')
}else{
    opcoes[3].classList.remove('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php" || window.location.href == "http://localhost/Sysfood/app/views/funcionarios/create.php" || window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php?funcionario_editado" || window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php?funcionario_deletado"|| window.location.href == "http://localhost/Sysfood/app/views/funcionarios/index.php?funcionario_criado") {
    opcoes[4].classList.add('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php" || window.location.href == "http://localhost/Sysfood/app/views/produtos/create.php" || window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php?produto_deletado" || window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php?produto_editado" || window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php?produto_criado") {
    opcoes[5].classList.add('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php" || window.location.href == "http://localhost/Sysfood/app/views/categorias/create.php" || window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php?categoria_editada" || window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php?categoria_deletada" || window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php?categoria_criada") {
    opcoes[6].classList.add('active')
}



//Funcionario comum/cozinha
let produto_funcionario = document.getElementById("prod_func");
let categoria_funcionario = document.getElementById("cat_func");
let pedido_principal_func = document.getElementById("pedido_principal_func");
let pedido_fila_func = document.getElementById("pedido_fila_func");
let pedido_preparacao_func = document.getElementById("pedido_preparacao_func");
let pedido_finalizado_func = document.getElementById("pedido_finalizado_func")

if (window.location.href == "http://localhost/Sysfood/app/views/produtos/index.php") {
    produto_funcionario.classList.add('active')
}

if(window.location.href == "http://localhost/Sysfood/app/views/categorias/index.php"){
    categoria_funcionario.classList.add('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/pedidos/pedidos_na_fila.php" || window.location.href == "http://localhost/Sysfood/app/views/pedidos/pedidos_na_fila.php?pedido_criado" || window.location.href == "http://localhost/Sysfood/app/views/pedidos/index.php?pedido_editado" || window.location.href == "http://localhost/Sysfood/app/views/pedidos/index.php?pedido_excluido" || window.location.href == "http://localhost/Sysfood/app/views/pedidos/pedidos_na_fila.php?pedido_excluido") {
    pedido_principal_func.classList.add('active')
    pedido_fila_func.classList.add('active')
}

if (window.location.href == "http://localhost/Sysfood/app/views/pedidos/pedidos_em_preparacao.php") {
    pedido_principal_func.classList.add('active')
    pedido_preparacao_func.classList.add('active')
}

if(window.location.href == "http://localhost/Sysfood/app/views/pedidos/pedidos_finalizados.php"){
    pedido_principal_func.classList.add('active');
    pedido_finalizado_func.classList.add('active');
}

//Meu deus do ceu essa parte do codigo ta muito porca mas pelomenos ta funcionando entao ta bom -b