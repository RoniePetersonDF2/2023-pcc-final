<header class="main_header">
    <div class="main_header_content">
        <a href="index.php" class="logo">
            <img src="assets/img/LIBRATEC-cortado.png" alt="libratec" title="Libratec"></a>

        <!-- <?php var_dump($_SESSION) ?> -->

        <nav class="main_header_content_menu">
            <ul>
                <?php
                $currentPage = basename($_SERVER['PHP_SELF']); // Obtém o nome do arquivo atual
                if ($currentPage !== 'index.php') {
                    echo '<li><a href="index.php" class="navmenu_index">Início</a></li>';
                }
                ?>
                <li><a href="index.php#seuespaco" onclick="scrollToSeuEspaco()">Seu espaço</a></li>
                <li><a href="index.php#sobrenos" onclick="scrollToSobreNos()">Sobre nós</a></li>
                <li><a href="index.php#contato" onclick="scrollToContato()">Contato</a></li>

                <?php
                if (isset($_SESSION['usuario']) && isset($_SESSION['usuario']['perfil']) && $_SESSION['usuario']['perfil'] == 'ADM') {
                    echo "<li><a href='usuario_admin.php' class='navmenu_index'>Admin</a></li>";
                    echo "<li><a href='logout.php' class='navmenu_index'>Sair</a></li>";
                }

                if (isset($_SESSION['usuario'])) {
                    $perfisExibirNome = array('SUR', 'INT', 'EMP');
                    $perfilUsuario = $_SESSION['usuario']['perfil'];

                    if (in_array($perfilUsuario, $perfisExibirNome)) {
                        $nomeUsuario = '';

                        if ($perfilUsuario === 'SUR') {
                            $nomeCompleto = $_SESSION['usuario']['nome_surdo'];
                            $nomeArray = explode(' ', $nomeCompleto);
                            $nomeUsuario = $nomeArray[0];
                            echo "<li><a href='perfil_surdo.php'>$nomeUsuario</a></li>";
                        } elseif ($perfilUsuario === 'INT') {
                            $nomeCompleto = $_SESSION['usuario']['nome_interprete'];
                            $nomeArray = explode(' ', $nomeCompleto);
                            $nomeUsuario = $nomeArray[0];
                            echo "<li><a href='perfil_inter.php'>$nomeUsuario</a></li>";
                        } elseif ($perfilUsuario === 'EMP') {
                            $nomeCompleto = $_SESSION['usuario']['nome_empresa'];
                            $nomeArray = explode(' ', $nomeCompleto);
                            $nomeUsuario = $nomeArray[0];
                            echo "<li><a href='perfil_emp.php'>$nomeUsuario</a></li>";
                        }

                        echo "<li><a href='logout.php'>Sair</a></li>";
                    }
                } else {
                    echo "<li><a href='' class='modal-link'>Login</a></li>";
                }
                ?>

            </ul>
        </nav>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js">
    //biblioteca do JavaScript(necessário pra rodar códigos .js)
</script>

<script src="assets/js/modal.js">
    //janela modal
</script>

<script>
    function scrollToSeuEspaco() {
        $('html, body').animate({
            scrollTop: $('#seuespaco').offset().top
        }, 'slow');
    }

    function scrollToSobreNos() {
        $('html, body').animate({
            scrollTop: $('#sobrenos').offset().top
        }, 'slow');
    }

    function scrollToContato() {
        $('html, body').animate({
            scrollTop: $('#contato').offset().top
        }, 'slow');
    }
</script>