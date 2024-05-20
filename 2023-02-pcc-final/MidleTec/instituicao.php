<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/boot.css">
<link rel="stylesheet" href="css/cadastrocss.css">
    <title>cadastro instituicao</title>
</head>

<body>
    <?php include 'nav.html'; ?>
    <h1>Cadastro instituição</h1>

    <fieldset>
        <legend>Dados da instituição</legend>

        <form action="instituicaoADD.php" method="post" class="text_center">
            <label for="nome">Nome*</label>
            <input type="text" name="nome" placeholder="Informe o Nome da Instituição" required>
            <br>
            <label for="nick">Sigla</label>
            <input type="text" name="nick" placeholder="Informe a Sigla" class="text_center">
            <br>
            <label for="cep">CEP*</label>
            <input type="number" name="cep" placeholder="Informe o CEP" required>
            <br>
            <label for="estado">Estado*</label>
            <input type="text" name="estado" placeholder="Informe o Estado" required maxlength="50">
            <br>
            <label for="cidade">Cidade*</label>
            <input type="text" name="cidade" placeholder="Informe a Ciadade" required maxlength="50">
            <br>
            <label for="quadra">Quadra*</label>
            <input type="text" name="quadra" placeholder="Informe a Quadra" required maxlength="50">
            <br>
            <label for="numero">Numero</label>
            <input type="number" placeholder="Informe o Numero" name="numero">
            <br>
            <label for="complemento">Complemento</label>
            <input type="text" name="complemento" placeholder="Informe um Complemento" maxlength="255">
            <br>
            <!-- <label for="ddd">DDD*</label> -->
            <label for="telefone">Telefone*</label>
            <input type="tel" name="ddd" required placeholder="DDD" class="ddd" minlength="2" maxlength="2">
            
            <input type="tel" name="telefone" placeholder="Informe o Telefone" required minlength="8" maxlength="9">
            <br>
            <label for="email">E-mail*</label>
            <input type="email" name="email" placeholder="Informe o E-mail">
            <br>
            <label for="horarioabertura">Horario de abertura</label>
            <input type="time" name="horarioabertura">
            <br>
            <label for="horariofechamento">Horario de fechamento</label>
            <input type="time" name="horariofechamento">
            <br>
            <button value="submit">Enviar</button>

        </form>
    </fieldset>
</body>

</html>