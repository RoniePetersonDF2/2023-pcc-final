<?php

require_once 'DAOconexao.php';
#session_start();


class AlunoDAO
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = Conexao::getConexao();
    }


    public function getUsuarios($idusuario)
    {
        $query = "SELECT idusuario, nome, imagem, email, matricula, telefone, instituicao, docmatricula, perfil, status, dtnasc 
        FROM midletech.usuarios 
        WHERE idusuario = :idusuario;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idusuario', $idusuario);

        $stmt->execute();

        $row1 = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;

        return $row1;
    }
    public function login($email, $senha)
    {
        $dbh = Conexao::getConexao();
        $query = "SELECT * FROM usuarios WHERE `email` = :email and `senha` = :senha;";

        $statement = $dbh->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":senha", $senha);
        $statement->execute();

        $return = $statement->fetch(PDO::FETCH_ASSOC);
        return $return;

    }
    public function updatenome(int $idusuario, string $nome): int
    {

        $query = "UPDATE midletech.usuarios SET 
            nome = :nome where idusuario = '$idusuario' ;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome', $nome);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updatematricula(int $idusuario, string $matricula): int
    {
        $query = "UPDATE midletech.usuarios SET 
            matricula = :matricula where idusuario = '$idusuario' ;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':matricula', $matricula);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updateemail(int $idusuario, string $email): int
    {
        $query = "UPDATE midletech.usuarios SET 
            email = :email where idusuario = '$idusuario' ;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':email', $email);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updatetelefone(int $idusuario, string $telefone): int
    {
        $query = "UPDATE midletech.usuarios SET 
            telefone = :telefone where idusuario = '$idusuario' ;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':telefone', $telefone);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }

    public function updateimagem($idusuario, $img_upload_path_banco)
    {
        $query = "UPDATE midletech.usuarios SET 
            imagem = :img_upload_path_banco where idusuario = '$idusuario' ;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':img_upload_path_banco', $img_upload_path_banco);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updateinstituicao($idusuario, $instituicao)
    {
        $query = "UPDATE midletech.usuarios SET 
            instituicao = :instituicao where idusuario = :idusuario;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':instituicao', $instituicao);
        $stmt->bindParam(':idusuario', $idusuario);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updatesenha($idusuario, $pass)
    {
        $query = "UPDATE midletech.usuarios SET 
            senha = :pass where idusuario = :idusuario;";
        // 
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':idusuario', $idusuario);
        // $stmt->bindParam(':senha', $semha);

        $result = $stmt->execute();
        $this->dbh = null;


        return $result;
    }
    public function deleteusuario($idusuario, $senha)
    {
        $dbh = Conexao::getConexao();
        $query = "DELETE from midletech.usuarios where idusuario = :idusuario and senha = :senha;";
        // 
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idusuario', $idusuario);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $result = (int) $stmt->rowCount();
        $this->dbh = null;

        return $result;
    }
    public function updatedtnasc($idusuario, $dtnasc)
    {
        $query = "UPDATE midletech.usuarios SET 
        dtnasc = :dtnasc where idusuario = '$idusuario' ;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':dtnasc', $dtnasc);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;

    }

    public function updateforum($idforum, $titulo, $descricao, $categoria, $idusuario)
    {

        if ($_SESSION['perfil'] == 'ADM') {
            $query = "UPDATE midletech.foruns SET titulo = :titulo, descricao = :descricao, categoria = :categoria WHERE idforum = :idforum;";

            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idforum', $idforum);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':categoria', $categoria);


            $result = $stmt->execute();
            $this->dbh = null;

            return $result;
        } else {
            $query = "UPDATE midletech.foruns SET titulo = :titulo, descricao = :descricao, categoria = :categoria WHERE idforum = :idforum and proprietario = :idusuario;";

            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idforum', $idforum);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':idusuario', $idusuario);

            $result = $stmt->execute();
            $this->dbh = null;

            return $result;
        }
    }

    public function deleteforuns($idforum, $idusuario)
    {
        $dbh = Conexao::getConexao();
        $query = "DELETE from midletech.foruns where proprietario = :idusuario and idforum = :idforum;";
        // 
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idusuario', $idusuario);
        $stmt->bindParam(':idforum', $idforum);
        $stmt->execute();

        $result = $stmt->rowCount();
        $this->dbh = null;

        return $result;
    }
    public function getAll()
    {
        $query = "SELECT 
            `usuarios`.idusuario, `usuarios`.email, `usuarios`.matricula, `usuarios`.telefone, `usuarios`.docmatricula, `usuarios`.instituicao, `usuarios`.nome, `usuarios`.status, `usuarios`.datacadastro,
            perfis.idperfil as perfil, perfis.nome as perfil, perfis.sigla
            FROM `usuarios` 
            INNER JOIN perfis ON perfis.idperfil = `usuarios`.perfil
            ORDER BY `usuarios`.nome;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;

        return $rows;
    }
    public function getById(int $id)
    {
        $query = "SELECT 
        `usuarios`.idusuario, `usuarios`.email, `usuarios`.matricula, `usuarios`.telefone, `usuarios`.docmatricula, `usuarios`.instituicao, `usuarios`.nome, `usuarios`.status, `usuarios`.datacadastro, `usuarios`.perfil as userperfil,
            perfis.idperfil as perfil, perfis.nome as perfil, perfis.sigla
            FROM `usuarios` 
            INNER JOIN perfis ON perfis.idperfil = `usuarios`.perfil
           WHERE `usuarios`.idusuario = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;

        return $row;
    }
 public function admupdate($nome, $id, $email, $status, $perfil, $matricula, $telefone, $instituicao)
 {
    if(empty($instituicao)){
        $query = "UPDATE midletech.usuarios SET nome = :nome, email = :email, status = :status, perfil = :perfil, matricula = :matricula, telefone = :telefone, instituicao = null WHERE idusuario = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':perfil', $perfil);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':telefone', $telefone);
        // $stmt->bindParam(':instituicao', $instituicao);
    
        $result = $stmt->execute();
        $this->dbh = null;
    
        return $result;     
    }else{
    $query = "UPDATE midletech.usuarios SET nome = :nome, email = :email, status = :status, perfil = :perfil, matricula = :matricula, telefone = :telefone, instituicao = :instituicao WHERE idusuario = :id;";

    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':perfil', $perfil);
    $stmt->bindParam(':matricula', $matricula);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':instituicao', $instituicao);

    $result = $stmt->execute();
    $this->dbh = null;

    return $result;
    }
 }
 public function getAvaliacao(int $idinstituicao)
 {
     $query = "SELECT midletech.avaliacoes.*,
     `usuarios`.idusuario, `usuarios`.nome, `usuarios`.imagem
         FROM midletech.avaliacoes 
         INNER JOIN midletech.usuarios ON avaliacoes.idusuario = `usuarios`.idusuario
        WHERE `avaliacoes`.idinstituicao = :id;";

     $stmt = $this->dbh->prepare($query);
     $stmt->bindParam(':id', $idinstituicao);
     $stmt->execute();

     $row = $stmt->fetch(PDO::FETCH_BOTH);
     $this->dbh = null;

     return $row;
 }
 public function deleteusuarioADM($id)
 {
  

    
     $dbh = Conexao::getConexao();
     $query = "DELETE from midletech.usuarios where idusuario = :id;";
     // 
     $stmt = $this->dbh->prepare($query);
     $stmt->bindParam(':id', $id);

     $stmt->execute();

     $result = (int) $stmt->rowCount();
     $this->dbh = null;

     return $result;

}
public function updatestatus($id, $status)
{
    $query = "UPDATE midletech.usuarios SET 
    usuarios.status = :status where idusuario = :id;";

    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    $result = $stmt->execute();
    $this->dbh = null;

    return $result;

}
public function updatedoc($idusuario, $img_upload_path_banco)
{
    $query = "UPDATE midletech.usuarios SET 
        docmatricula = :img_upload_path_banco where idusuario = '$idusuario' ;";

    $stmt = $this->dbh->prepare($query);
    $stmt->bindParam(':img_upload_path_banco', $img_upload_path_banco);

    $result = $stmt->execute();
    $this->dbh = null;

    return $result;
}
}