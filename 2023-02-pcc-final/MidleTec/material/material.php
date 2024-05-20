<?php 
require_once '../src/conexao.php';
$dbh = conexao::getConexao();

$query = "SELECT * FROM midletech.material;";

$statement = $dbh->query($query);

$material = $statement->rowCount();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
<h1>Ficha do Material</h1>
    <fieldset>
        <legend>Descriçao do Material</legend>
        <form action="materialAdd.php" method="POST" enctype="multipart/form-data">
            <label for="nome">Título</label>
            <input type="text" name="título" placeholder="Título" maxlength="150" required class="input_nome">
            
            <br>
            
            <label for="text">Descrição</label>
            <input type="text" name="descrição" minlength="6" maxlength="50" placeholder="Dê uma descrição breve sobre o material." required>
            
            <br>
            
            <label for="text">Tipo de Material</label>
            <input type="text" name="tipo" placeholder="Qual o tipo do material?" required>
            
            <br>
            
            <label for="autor">Autor do Material</label>
            <input type="text" name="autor" placeholder="Informe o Nome do Autor"  required>
         <!-- a matricula consiste em 9 numeros. não é possivel usar maxLength e minlength em input type="number".-->
            <br>
           
            <label for="assunto">Assunto</label>
            <input type="text" name="assunto" placeholder="Informe o Assunto" required >
            
            <br>

            
            <button type="submit">Enviar</button>
        </form>
    </fieldset>
</body>

</html>
</body>
</html>