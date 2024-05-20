<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/boot.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css"> 
    <link rel="stylesheet" href="../assets/css/style_options.css">
    <link rel="stylesheet" href="../assets/css/list_format.css">


    <title>PROJETO HTLM MOD 3</title>
</head>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="header_menu">
        <div class="div_menu">
            <a href="index.php" class="logo">
                <img src="../assets/img/logo.png" alt="Bem vindo ao portal do aluno MidleTech" class="logo_img" title="Bem vindo ao portal do aluno MidleTech">
            </a>
            <nav class="nav_menu">
                <ul>
                    <li><a href="index.php">voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--FIM DOBRA CABEÇALHO-->
    <div class="list_container">
        <h1>Seus dados</h1>
        <form action="">
            <table width="1150px">
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Profissão</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Ação</th>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>João</td>
                    <td>30</td>
                    <td>Arquiteto</td>
                    <td>joao@joao.com</td>
                    <td>Casa João</td>
                    <td>
                        <button class="btn">Editar</button>&nbsp;
                        <button class="btn">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <td>Maria</td>
                    <td>22</td>
                    <td>Estudante</td>
                    <td>maria@maria.com</td>
                    <td>Casa Maria</td>
                    <td>
                        <button class="btn">Editar</button>&nbsp;
                        <button class="btn">Excluir</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>



</body>

</html>