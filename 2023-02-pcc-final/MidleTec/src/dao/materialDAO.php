<?php
require_once('DAOconexao.php');


class MaterialDAO
{

    private $dbh;

    public function __construct()
    {
        $this->dbh = Conexao::getConexao();
    }

    public function deletematerial($idusuario, $idmaterial)
    {

        if (($_SESSION['perfil'] == '1') || ($_SESSION['perfil'] == '3') ) {
            $dbh = Conexao::getConexao();
            $query = "DELETE from midletech.material where idmaterial = :idmaterial;";
            // 
            $stmt = $this->dbh->prepare($query);
           # $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':idmaterial', $idmaterial);
            $stmt->execute();

            $result = (int) $stmt->rowCount();
            $this->dbh = null;

            return $result;
        } else {
            $dbh = Conexao::getConexao();
            $query = "DELETE from midletech.material where proprietario = :idusuario and idmaterial = :idmaterial;";
            // 
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':idmaterial', $idmaterial);
            $stmt->execute();

            $result = (int) $stmt->rowCount();
            $this->dbh = null;

            return $result;
        }

    }

    public function updatematerial($idmaterial, $titulo, $descricao, $assunto, $idusuario)
    {
        if (($_SESSION['perfil'] == '1') || ($_SESSION['perfil'] == '3') ) {
            $query = "UPDATE midletech.material SET titulo = :titulo, descricao = :descricao, assunto = :assunto WHERE idmaterial = :idmaterial;";

            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idmaterial', $idmaterial);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':assunto', $assunto);

    
            $result = $stmt->execute();
            $this->dbh = null;
    
            return $result;
        }else{
        $query = "UPDATE midletech.material SET titulo = :titulo, descricao = :descricao, assunto = :assunto WHERE idmaterial = :idmaterial and proprietario = :idusuario;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idmaterial', $idmaterial);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':assunto', $assunto);
        $stmt->bindParam(':idusuario', $idusuario);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
        }

    }
    public function updatemensagem($idforum, $idusuario, $mensagem)
    {
        if ($_SESSION['perfil'] == '1') {
            $query = "UPDATE midletech.foruns_msg SET mensagem = :mensagem WHERE idforuns_msg = :idforum;";

            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':mensagem', $mensagem);
            $stmt->bindParam(':idforum', $idforum);



            $result = $stmt->execute();
            $this->dbh = null;

            return $result;
        } else {

            $query = "UPDATE midletech.foruns_msg SET mensagem = :mensagem WHERE idforuns_msg = :idforum and idusuario = :idusuario;";

            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':mensagem', $mensagem);
            $stmt->bindParam(':idforum', $idforum);
            $stmt->bindParam(':idusuario', $idusuario);


            $result = $stmt->execute();
            $this->dbh = null;

            return $result;
        }
    }
    public function deletemensagem($idusuario, $idforummsg)
    {
        if(($_SESSION['perfil']=='1')||($_SESSION['perfil']=='3')){
            
        $dbh = Conexao::getConexao();
        $query = "DELETE from midletech.foruns_msg where idforuns_msg = :idforummsg;";
        // 
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idforummsg', $idforummsg);
        $stmt->execute();

        $result = (int) $stmt->rowCount();
        $this->dbh = null;

        return $result;
        }else{

        $dbh = Conexao::getConexao();
        $query = "DELETE from midletech.foruns_msg where idusuario = :idusuario and idforuns_msg = :idforummsg;";
        // 
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idusuario', $idusuario);
        $stmt->bindParam(':idforummsg', $idforummsg);
        $stmt->execute();

        $result = (int) $stmt->rowCount();
        $this->dbh = null;

        return $result;
        }
    }
    public function getAllMaterial()
    {
        $query = "SELECT `material`.*, `usuarios`.nome, `usuarios`.email
        FROM `material` 
        INNER JOIN usuarios ON material.proprietario = `usuarios`.idusuario
        ORDER BY `material`.titulo;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;

        return $rows;
    }
    public function getMaterial($id){
        $query = "SELECT * from midletech.material where material.idmaterial = :id";

        $stmt = $this->dbh->prepare($query);
        $stmt-> bindParam(":id",$id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;

        return $row;
    
    }

    public function getForum($id){
        $query = "SELECT * from midletech.foruns where foruns.idforum = :id";

        $stmt = $this->dbh->prepare($query);
        $stmt-> bindParam(":id",$id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;

        return $row;
    

    }

    public function getAllForuns(){
        $query = "SELECT `foruns`.*,  `usuarios`.nome, `usuarios`.email from midletech.foruns        INNER JOIN usuarios ON foruns.proprietario = `usuarios`.idusuario
        ORDER BY `foruns`.titulo;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;

        return $rows;
    
    }

}
