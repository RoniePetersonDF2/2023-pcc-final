<style type="text/css">
	


/*--------------------
Checkout
---------------------*/


.order {
  width: 430px;
  height: 500px;
  padding: 0 30px;
  
  background-color: #FFF;
  
  
  -webkit-box-shadow: 0 15px 24px rgba(37,44,65,0.16);
     -moz-box-shadow: 0 15px 24px rgba(37,44,65,0.16);
          box-shadow: 0 15px 24px rgba(37,44,65,0.16);
}

ul.order-list {
  width: 100%;
  height: 400px;
  list-style: none;
  overflow-y: scroll;
  padding-right: 12px;
}

ul.order-list li {
  height: 80px;
  margin-left: -40px;
  overflow: hidden;
  border-bottom: 1px solid #e9ebf2;
}

ul.order-list li > img {
  width: 60px;
  height: 60px;
  float: left;
  margin-left:40px;
}

ul.order-list li > h4 {
  margin-top: 16px;
  line-height: 1;
  letter-spacing: 1px;
  text-align: right;
  
  -webkit-transition: all 0.3s;
     -moz-transition: all 0.3s;
      -ms-transition: all 0.3s;
       -o-transition: all 0.3s;
          transition: all 0.3s;
}

ul.order-list li:hover > h4 {
  margin-top: 8px;
}

ul.order-list li > h5 {
  margin-top: 0px;
  text-align: right;
  display: none;
  
  -webkit-transition: all 0.3s;
     -moz-transition: all 0.3s;
      -ms-transition: all 0.3s;
       -o-transition: all 0.3s;
          transition: all 0.3s;
}

ul.order-list li:hover > h5 {
  margin-top: 3px;
  display: block; 
}


</style>


<?php 

require_once("../../conexao.php");
$pagina = 'pedidos';


$id_venda = $_POST['id'];


echo '

<div class="order">
         

          <ul class="order-list mt-4">';


            $res = $pdo->query("SELECT * from carrinho where id_venda = '$id_venda' order by id asc");
            $dados = $res->fetchAll(PDO::FETCH_ASSOC);
            $linhas = count($dados);
            for ($i=0; $i < count($dados); $i++) { 
              foreach ($dados[$i] as $key => $value) {
              }

              $id_produto = $dados[$i]['id_produto']; 
              $quantidade = $dados[$i]['quantidade'];
              $id_carrinho = $dados[$i]['id'];


              $res_p = $pdo->query("SELECT * from produtos where id = '$id_produto' ");
              $dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
              $nome_produto = $dados_p[0]['nome'];  
              $valor = $dados_p[0]['valor'];
              $imagem = $dados_p[0]['imagem'];
              $total_item = $valor * $quantidade;
              $total_item = number_format( $total_item , 2, ',', '.');

             echo '

              <li><img src="../images/produtos/'.$imagem.'" width="30">
              <h4>'.$quantidade.' - ' .$nome_produto.'</h4><h5>'.$total_item .'</h5></li>';


             }

             echo ' 

          </ul>

         
        </div>

';


?>