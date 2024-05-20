<?php 

include_once("cabecalho.php");
include_once("conexao.php");

//VERIFICAR SE EXISTE UM USUÁRIO ADMINISTRADOR, CASO NÃO EXISTA, CRIAR.
$senha = '123';
$res_usuarios = $pdo->query("SELECT * from usuarios where nivel = 'Admin'");
$dados_usuarios = $res_usuarios->fetchAll(PDO::FETCH_ASSOC);
$total_usuarios = count($dados_usuarios);

if($total_usuarios == 0){
  $res_insert = $pdo->query("INSERT into usuarios (nome, cpf, telefone, usuario, senha, nivel) values ('Administrador', '000.000.000-00', '3333-3333', '$email_adm', '$senha', 'Admin')");
}


?>

<!-- Swiper-->
<section class="section swiper-container swiper-slider swiper-slider-modern" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="true" data-slide-effect="fade">
  <div class="swiper-wrapper text-left">
    <div class="swiper-slide context-dark" data-slide-bg="images/banner/01.jpg">
      <div class="swiper-slide-caption">
        <div class="container">
          <div class="row justify-content-center justify-content-xxl-start">
            <div class="col-md-10 col-xxl-6">
              <div class="slider-modern-box">
                <h1 class="slider-modern-title"><span data-caption-animate="slideInDown" data-caption-delay="0">Sanduíches</span></h1>
                <p data-caption-animate="fadeInRight" data-caption-delay="400">Venha conhecer nossos Hamburgues artesanais, os melhores da região!</p>
                <div class="oh button-wrap"><a class="button button-primary button-ujarak" href="about-us.html" data-caption-animate="slideInLeft" data-caption-delay="400">Veja Mais</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-slide context-dark" data-slide-bg="images/banner/02.jpg">
      <div class="swiper-slide-caption">
        <div class="container">
          <div class="row justify-content-center justify-content-xxl-start">
            <div class="col-md-10 col-xxl-6">
              <div class="slider-modern-box">
                <h1 class="slider-modern-title"><span data-caption-animate="slideInLeft" data-caption-delay="0">Massas</span></h1>
                <p data-caption-animate="fadeInRight" data-caption-delay="400">Expiremente nossas pizzas, temos vários sabores, você também pode recheá-las como preferir!!</p>
                <div class="oh button-wrap"><a class="button button-primary button-ujarak" href="about-us.html" data-caption-animate="slideInLeft" data-caption-delay="400">Veja Mais</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Swiper Navigation-->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <!-- Swiper Pagination-->
  <div class="swiper-pagination swiper-pagination-style-2"></div>
</section>

<!-- Icons Ruby
<section class="section section-md bg-default section-top-image">
  <div class="container">
    <div class="row row-30 justify-content-center">
      <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0s">
        <article class="box-icon-ruby">
          <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column align-items-center text-lg-center flex-xl-row text-xl-left">
            <div class="unit-left">
              <div class="box-icon-ruby-icon linearicons-smile"></div>
            </div>
            <div class="unit-body">
              <h4 class="box-icon-ruby-title"><a href="#">Sanduíches</a></h4>
            </div>
          </div>
        </article>
      </div>
      <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".1s">
        <article class="box-icon-ruby">
          <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column align-items-center text-lg-center flex-xl-row text-xl-left">
            <div class="unit-left">
              <div class="box-icon-ruby-icon linearicons-pie-chart"></div>
            </div>
            <div class="unit-body">
              <h4 class="box-icon-ruby-title"><a href="#">Massas e Pizzas</a></h4>
            </div>
          </div>
        </article>
      </div>
      <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".2s">
        <article class="box-icon-ruby">
          <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column align-items-center text-lg-center flex-xl-row text-xl-left">
            <div class="unit-left">
              <div class="box-icon-ruby-icon linearicons-coffee-cup"></div>
            </div>
            <div class="unit-body">
              <h4 class="box-icon-ruby-title"><a href="#">Drinks e Bebidas</a></h4>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section> -->

<!-- Trending products-->
<section class="section section-md bg-default">
  <div class="container">
    <div class="row row-40 justify-content-center">
      <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
        <div class="product-banner"><img src="images/logo.jpg" alt="" width="570" height="715"/>

        </div>
      </div>
      <div class="col-md-5 col-lg-6">
        <div class="row row-30 justify-content-center">

          <?php 
          $res = $pdo->query("SELECT * from produtos where adicional is null order by vendas desc LIMIT 4");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
          for ($i=0; $i < count($dados); $i++) { 
            foreach ($dados[$i] as $key => $value) {
            }

            $id = $dados[$i]['id']; 
            $nome = $dados[$i]['nome'];

            $descricao = $dados[$i]['descricao'];
            $valor = $dados[$i]['valor'];
            $categoria = $dados[$i]['categoria'];
            $imagem = $dados[$i]['imagem'];
            $descricao_longa = $dados[$i]['descricao_longa'];

            $valor_sem_desconto = $valor + ($valor * 0.10);

            $valor_sem_desconto = number_format( $valor_sem_desconto , 2, ',', '.');
            $valor = number_format( $valor , 2, ',', '.');

            ?>


            <div class="col-sm-6 col-md-12 col-lg-6">
              <div class="oh-desktop">
                <!-- Product-->
                <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
                  <div class="unit flex-row flex-lg-column">
                    <div class="unit-left">
                      <div class="product-figure"><img src="images/produtos/<?php echo $imagem ?>" alt="" width="270" height="280"/>
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="" onclick="carrinhoModal('<?php echo $id ?>')">Add ao Carrinho</a></div>
                      </div>
                    </div>
                    <div class="unit-body">
                      <h6 class="product-title"><a href="" onclick="setaDadosModal('<?php echo $descricao ?>','<?php echo $descricao_longa ?>')" data-toggle="modal" data-target="#modal-desc"><?php echo $nome ?></a></h6>
                      <div class="product-price-wrap">
                        <div class="product-price product-price-old">R$<?php echo $valor_sem_desconto ?></div>
                        <div class="product-price">R$<?php echo $valor ?></div>
                      </div><a class="button button-sm button-secondary button-ujarak" href="" onclick="carrinhoModal('<?php echo $id ?>')">Add ao Carrinho</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>


           

         <?php } ?>


       </div>
     </div>
   </div>
 </div>
</section>

<!-- Section CTA 2-->
<section class="section text-center">
  <div class="parallax-container" data-parallax-img="images/">
    <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-40">
      <div class="container">
        <h2 class="oh font-weight-normal"><span class="d-inline-block wow slideInDown" data-wow-delay="0s">Promoções</span></h2>
        <p color="" class="oh big text-width-large"><span class="d-inline-block wow slideInUp" data-wow-delay=".2s">Veja as nossas outras promoções clicando no botão abaixo, temos várias promoções com diversos produtos!!</span></p><a class="button button-primary button-icon button-icon-left button-ujarak wow fadeInUp" href="combos"><span class="icon mdi mdi-play"></span>Todas as Promoções</a>
      </div>
    </div>
  </div>
</section>






<?php include_once("rodape.php") ?>
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<!-- Javascript-->
<script src="js/core.min.js"></script>
<script src="js/script.js"></script>
<!-- coded by Ragnar-->
</body>
</html>




 <!--MODAL PARA MOSTRAR A DESCRIÇÃO DO PRODUTO -->

            <div class="modal fade" id="modal-desc" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 id="texto-descricao" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                 
                    <span id="texto-descricao-longa"></span>

                  </div>
                  
               </div>
             </div>
           </div>


<script>
function setaDadosModal(descricao, descricaoLonga) {
    $("#texto-descricao").text(descricao);
    $("#texto-descricao-longa").text(descricaoLonga);
}
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="js/mascaras.js"></script>



<?php include_once("modal-carrinho.php") ?>


