
<?php 

require_once("../../conexao.php");
$pagina = 'pedidos';


$id = $_POST['id'];


$res = $pdo->query("SELECT * from vendas where id = '$id'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$cpf = @$dados[0]['cliente'];


$res = $pdo->query("SELECT * from clientes where cpf = '$cpf'");
  $dados = $res->fetchAll(PDO::FETCH_ASSOC);
  $nome = @$dados[0]['nome'];
  $telefone = @$dados[0]['telefone'];
  $email = @$dados[0]['email'];
  $rua = @$dados[0]['rua'];
  $numero = @$dados[0]['numero'];
  $bairro = @$dados[0]['bairro'];
  $cidade = @$dados[0]['cidade'];
  $estado = @$dados[0]['estado'];
  $cep = @$dados[0]['cep'];

  

echo '



<div class="row">
              <div class="col-md-4">
               <div class="form-group">
                <label class="text-dark" for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control form-control-sm" disabled value="'.$nome .'">
              </div>
            </div>

            <div class="col-md-4">
             <div class="form-group">
              <label class="text-dark" for="exampleInputEmail1">CPF</label>
              <input type="text" class="form-control form-control-sm" disabled value="'.$cpf .'">

            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="text-dark" for="exampleInputEmail1">Telefone</label>
             <input type="text" class="form-control form-control-sm" disabled value="'.$telefone .'">

            </div>

          </div>

         

      
         <div class="col-md-3">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Email</label>
             <input type="text" class="form-control form-control-sm" disabled value="'.$email .'">

          </div>

        </div>


         

        <div class="col-md-4">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Rua</label>
           <input type="text" class="form-control form-control-sm" disabled value="'.$rua .'">

          </div>

        </div>


          <div class="col-md-2">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Número</label>
            <input type="text" class="form-control form-control-sm" disabled value="'.$numero .'">

          </div>

        </div>

          <div class="col-md-3">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Bairro</label>
            
            <input type="text" class="form-control form-control-sm" disabled value="'.$bairro .'">

          </div>

        </div>

         <div class="col-md-4">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Cidade</label>
            <input type="text" class="form-control form-control-sm" disabled value="'.$cidade .'">

          </div>

        </div>


          <div class="col-md-2">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Estado</label>
           
            <input type="text" class="form-control form-control-sm" disabled value="'.$estado .'">

          </div>

        </div>


         <div class="col-md-3">
           <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">CEP</label>
            <input type="text" class="form-control form-control-sm" disabled value="'.$cep .'">

          </div>

        </div>



      </div>




';
           


?>



