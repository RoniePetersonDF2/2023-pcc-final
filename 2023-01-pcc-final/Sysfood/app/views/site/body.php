<body>
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.php" class="logo" style="margin: -5px;">
                            <img src="../assets/images/sysfood_logo_interna.png" alt="Sysfood"
                                style="width: 120px; height: 120px;">
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Serviços</a></li>
                            <li class="scroll-to-section"><a href="#pricing">Preços</a></li>
                            <li>
                                <div class="gradient-button"><a id="modal_trigger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fa fa-sign-in-alt"></i> Entrar</a>
                                </div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #0d6efd">Conecte-se</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="">
                        <!-- Social Login -->
                        <div class="social_login">
                            <div class="action_btns">
                                <div class="one_half"><a href="#" id="login_form" class="btn">Acessar</a></div>
                                <div class="one_half last"><a href="" id="register_form" class="btn">Registrar-se</a>
                                </div>
                            </div>
                        </div>

                        <div class="user_login">
                            <form action="site/login.php" method="post">

                                <label style="color: #0d6efd">Email</label>
                                <input type="text" name="email" class="form-control" required />


                                <label style="color: #0d6efd">Senha</label>
                                <input type="password" name="senha" class="form-control" required />
                                <br>
                                <div class="checkbox">
                                    <input id="remember" type="checkbox" />
                                    <label for="remember">
                                        Lembrar de mim neste computador</label>
                                    <div class="d-flex flex-row-reverse align-items-center">
                                        <a href="#" class="forgot_password">Esqueceu a senha?</a>
                                    </div>
                                </div>

                                <div class="action_btns">
                                    <div class="one_half"><a href="#" class="btn back_btn"><i
                                                class="fa fa-angle-double-left"></i>
                                            Voltar</a></div>
                                    <input class="one_half last btn btn_red" type="submit"
                                                value="Acessar">
                                </div>
                            </form>
                        </div>

                        <div class="user_register box">
                            <form id="cadastro_form" method="post" action="site/cadastrar.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">Nome da Empresa</label>
                                        <input type="text" name="nome_empresa" class="form-control cadastro-input" required />
                                        <span class="cadastro-span">O nome da empresa deve ter mais de 3 letras</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">CNPJ</label>
                                        <input type="text" name="cnpj" class="form-control cadastro-input" maxlength="18" required />
                                        <span class="cadastro-span">Ex: xx.xxx.xxx/xxxx-xx</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">Email</label>
                                        <input type="email" name="email" class="form-control cadastro-input" required />
                                        <span class="cadastro-span">Ex:email@gmail.com</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">Senha</label>
                                        <input type="password" name="senha" class="form-control cadastro-input" required />
                                        <span class="cadastro-span">A senha deve possuir ao menos 8 caracteres<br>Com:<br> 1 Caractere Especial<br>1 Caractere Numerico</span>
                                    </div>
                                </div>
                                <label for="">Endereço</label>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">CEP</label>
                                        <input type="text" name="cep" class="form-control cadastro-input" maxlength="9" required />
                                        <span class="cadastro-span">Ex: xxxxx-xxx</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">Rua</label>
                                        <input type="text" name="rua" class="form-control cadastro-input" required />
                                    </div>

                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">Bairro</label>
                                        <input type="text" name="bairro" class="form-control cadastro-input" required />
                                    </div>

                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">Cidade</label>
                                        <input type="text" name="cidade" class="form-control cadastro-input" required />
                                    </div>

                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">Estado</label>
                                        <input type="text" name="estado" class="form-control cadastro-input" required />
                                    </div>

                                    <div class="col-md-6">
                                        <label style="color: #0d6efd">Complemento</label>
                                        <input type="text" name="complemento" class="form-control" />
                                    </div>
                                </div>
                                <div style="margin-bottom: 20px;"></div>

                                <div class="action_btns">
                                    <div class="one_half"><a href="#" class="btn back_btn"><i
                                                class="fa fa-angle-double-left"></i>
                                            Voltar</a></div>
                                   <input class="one_half last btn btn_red" type="submit"
                                                value="Registrar-se">
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 style="font-family: 'Roboto', sans-serif;font-size:4em;">Sysfood</h2>
                                        <p style=" font-family: 'Roboto', sans-serif;font-size:1.4em;">O sistema de gerenciamento de
                                            pedidos Sysfood é a solução ideal para
                                            pequenos restaurantes que buscam se destacar no mercado altamente
                                            competitivo da gastronomia.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="../assets/images/tema.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4 style="font-family: 'Roboto', sans-serif; font-size:2.1em;">Quais serviços <em
                                style="font-family: 'Roboto', sans-serif">Sysfood</em> tem a oferecer?
                        </h4>
                        <img src=" ../assets/images/heading-line-dec.png" alt="">
                        <p style="font-family: 'Roboto', sans-serif; font-size:1.4em;">O Sysfood disponibiliza várias ferramentas e
                            funcionalidades, desde o
                            gerenciamento de pedidos até a emissão de relatórios financeiros. Os cards
                            abaixo detalham de forma mais precisa os serviços oferecidos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>Gerenciamento de Pedidos</h4>
                        <p>Melhora a eficiência e a produtividade do negócio, reduz erros no processamento dos pedidos,
                            fornece informações precisas e simplifica o processo de faturamento. Melhora a experiência
                            do cliente, levando a uma maior satisfação e lucratividade.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>Geração de Relatorios</h4>
                        <p>Fornece informações valiosas sobre o desempenho do negócio, como receita, despesas, lucro e
                            volume de vendas. Ajuda os gerentes a tomarem decisões sobre preços, promoções e estratégias
                            de marketing, identificar oportunidades de crescimento e problemas de desempenho.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>Intuitivo</h4>
                        <p>Fácil de usar e compreender, aumentando a eficiência e produtividade do usuário. Minimiza
                            erros e aumenta a satisfação do usuário, resultando em uma experiência mais agradável e
                            eficaz. Leva a uma melhor adoção e utilização do sistema, aumentando a efetividade do
                            investimento.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item fourth-service">
                        <div class="icon"></div>
                        <h4>Multiplataforma</h4>
                        <p>Pode ser executado em diferentes sistemas operacionais e dispositivos, o que aumenta sua
                            acessibilidade e a flexibilidade. Permite que os usuários acessem o sistema de qualquer
                            lugar e a qualquer momento. Resultando em economia de custos e maior escalabilidade do
                            negócio.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pricing" class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4 style="font-size:2em;">Preços <em>elaborados</em> para <em>ajudar</em> novos empresarios</h4>
                        <img src="../assets/images/heading-line-dec.png" alt="">
                        <p style="font-size:1.4em;">A seguir, os valores dos planos disponíveis, especialmente
                            elaborados para quem está iniciando no ramo.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-regular">
                        <span class="price">R$0</span>
                        <h4>Plano Básico</h4>
                        <div class="icon">
                            <img src="../assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Criar 5 sessões</li>
                            <li>Criar 5 pedidos</li>
                            <li>Criar 5 produtos</li>
                            <li>Criar 5 categorias</li>
                            <li class="non-function">Verificar estatísticas</li>
                            <li class="non-function">Gerar relatórios</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Compre esse plano agora!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-pro">
                        <span class="price">R$39</span>
                        <h4>Plano Premium</h4>
                        <div class="icon">
                            <img src="../assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Criar sessões ilimitadas</li>
                            <li>Criar pedidos ilimitados</li>
                            <li>Criar produtos ilimitados</li>
                            <li>Criar categorias ilimitadas</li>
                            <li>Verificar estatísticas</li>
                            <li>Gerar relatórios ilimitados</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Compre esse plano agora!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-regular">
                        <span class="price">R$19</span>
                        <h4>Plano Padrão</h4>
                        <div class="icon">
                            <img src="../assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Criar 15 sessões</li>
                            <li>Criar 15 pedidos</li>
                            <li>Criar 15 produtos</li>
                            <li>Criar 15 categorias</li>
                            <li>Verificar estatísticas</li>
                            <li class="non-function">Gerar relatórios</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Compre esse plano agora!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>