<?php

//conexão

try{
    $pdo = new PDO("mysql:dbname=arte;host=localhost","root", "");
}
catch (PDOException $e) {
    echo "erro com o banco de dados:" .$e->getMessage() ;
}
catch (Exception $e) {
    echo "erro generico:" .$e->getMessage();;
}

/* BASE PDO -----------------------------------------------------------------------------------------------------------------------------
//considerando o nome do banco = arte. nome da tebela = artesao

//inserte
//(forma 1)
$res = $pdo-> prepare("INSET INTO artesao(nome, email, telefone, telefoneapp, tipo, cpf, endereco, senha)
VALUES (:nome, :email, :tel, :whap, :tipo, :cpf, :end, :senha)");

$res->bindValue(":nome", "xxx");
$res->bindValue(":email", "xxx@yyy.com");
$res->bindValue(":tel", "000000000");
$res->bindValue(":whap", "000000000");
$res->bindValue(": ", " ");
$res->bindValue(": ", " ");
$res->bindValue(": ", " ");
$res->bindValue(": ", " ");
$res->bindValue(": ", " ");
$res->bindValue(": ", " ");


//(forma2)
$res = $pdo-> prepare("INSET INTO artesao(nome, email, telefone, telefoneapp, tipo, cpf, endereco, senha)
VALUES ('xxx', 'xxx@yyy.com', '000000000', '000000000', 'zzz', '12345678910', 'xyxyxy', 'xyzxyz')");

//delete
//(forma 1)
$cmd = $pdo->prepare("DELETE FROM artesao WHERE email = :email");
$email = xxx@yyy.com;
$cmd-> $pdo->bindValue(":email", $email);
$cmd->execute();

//(forma2)
$cmd = $pdo->query("DELETE FROM artesao WHERE email = 'xxx@yyy.com'");

//update
//(forma 1)
$cmd = $pdo->prepare("UPDATE artesao SET email = :email WHERE nome = :nome ");
$cmd->bindValue(":email", "novoemail@gmail.com"):
$cmd->bindValue(":nome", "xxx");
$cmd->execute();

//(forma2)
$cmd = $pdo->query("UPDATE artesao SET email = 'novodonovoemail@gmail.com' WHERE nome = 'xxx' ");

//select

$cmd = $pdo-.prepare("SELECT * FROM artesao WHERE email = :email");
$cmd->bindValue("id", 4);
$cmd->execulte();
$resultado = $cmf->fetch(PDO::FETCH_ASSOC);

foreach ($resultado as $key => $value)
{
    echo $key.": ".$value."<br>";
}
*/

?>
