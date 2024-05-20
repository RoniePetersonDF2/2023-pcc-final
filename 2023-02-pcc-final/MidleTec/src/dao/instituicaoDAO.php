<?php
require_once('DAOconexao.php');

class InstituicaoDAO
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = Conexao::getConexao();
    }


    public function updatenoticia($idnoticia, $noticia, $idusuario, $titulo)
    {
        if (($_SESSION['perfil'] == '1') || ($_SESSION['perfil'] == '3') ) {
            $query = "UPDATE midletech.noticias SET titulo = :titulo, noticia = :noticia WHERE idnoticia = :idnoticia;";

            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idnoticia', $idnoticia);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':noticia', $noticia);
            $stmt->bindParam(':titulo', $titulo);


    
            $result = $stmt->execute();
            $this->dbh = null;
    
            return $result;
        }else{
        $query = "UPDATE midletech.noticias SET titulo = :titulo, noticia = :noticia WHERE idnoticia = :idnoticia and idusuario = :idusuario;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idnoticia', $idnoticia);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':noticia', $noticia);
        $stmt->bindParam(':idusuario', $idusuario);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
        }
    }

    public function deletenoticia($idusuario, $idnoticia)
    {

        if (($_SESSION['perfil'] == '1')) {
            $dbh = Conexao::getConexao();
            $query = "DELETE from midletech.noticias where idnoticia = :idnoticia;";
            // 
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':idnoticia', $idnoticia);
            $stmt->execute();

            $result = $stmt->rowCount();
            $this->dbh = null;

            return $result;
        } else {
            $dbh = Conexao::getConexao();
            $query = "DELETE from midletech.noticias where idnoticia = :idnoticia and idusuario = :idusuario;";
            // 
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':idnoticia', $idnoticia);
            #$stmt->execute();

            $result = $stmt->execute();
            $this->dbh = null;

            return $result;
        }

    }
    public function getInstituicao($idusuario)
    {
        $query = "SELECT * from midletech.instituicoes
        WHERE docente = :idusuario;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idusuario', $idusuario);

        $stmt->execute();

        $row1 = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;

        return $row1;
    }

    public function updatenome(int $idusuario, string $nome, $id): int
    {

        $query = "UPDATE midletech.instituicoes SET 
            nome = :nome where docente = '$idusuario' and idinstituicoes = :id ;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updateemail( $idusuario, string $email, $id)
    {
        $query = "UPDATE midletech.instituicoes SET 
            email = :email where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }

    public function updatefone(int $idusuario, string $telefone)
    {
        $query = "UPDATE midletech.instituicoes SET 
            telefone = :telefone where docente = '$idusuario';";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':telefone', $telefone);
        // $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updateimagem($idusuario, $img_upload_path_banco, $id)
    {
        $query = "UPDATE midletech.instituicoes SET 
            logo = :img_upload_path_banco where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':img_upload_path_banco', $img_upload_path_banco);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updatesigla(int $idusuario, string $sigla, $id): int
    {
        $query = "UPDATE midletech.instituicoes SET 
            sigla = :sigla where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':sigla', $sigla);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updatedescricao(int $idusuario, string $descricao, $id): int
    {
        $query = "UPDATE midletech.instituicoes SET 
            descricao = :descricao where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }

    public function updateendereco(int $idusuario, string $endereco, $id): int
    {
        $query = "UPDATE midletech.instituicoes SET 
            endereco = :endereco where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updatecidade(int $idusuario, string $cidade, $id): int
    {
        $query = "UPDATE midletech.instituicoes SET 
            cidade = :cidade where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updatefacebook(int $idusuario, string $facebook, $id): int
    {
        $query = "UPDATE midletech.instituicoes SET 
            facebook = :facebook where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':facebook', $facebook);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updateinstagram(int $idusuario, string $instagram, $id): int
    {
        $query = "UPDATE midletech.instituicoes SET 
            instagram = :instagram where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':instagram', $instagram);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updatecep(int $idusuario, string $cep, $id): int
    {
        $query = "UPDATE midletech.instituicoes SET 
            cep = :cep where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function updateslogan(int $idusuario, string $slogan, $id): int
    {
        $query = "UPDATE midletech.instituicoes SET 
            slogan = :slogan where docente = '$idusuario' and idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':slogan', $slogan);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }
    public function deleteinstituicao($idusuario, $id)
    {

        if (($_SESSION['perfil'] == '1')) {
            $dbh = Conexao::getConexao();
            $query = "DELETE from midletech.instituicoes where idinstituicoes = :id;";
            // 
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $result = $stmt->rowCount();
            $this->dbh = null;

            return $result;
        } else {
            $dbh = Conexao::getConexao();
            $query = "DELETE from midletech.instituicoes where idinstituicoes = :id and docente = :idusuario;";
            // 
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':id', $id);
            #$stmt->execute();

            $result = $stmt->execute();
            $this->dbh = null;

            return $result;
        }

    }
    public function getAllInstituicoes(){
        $query = "SELECT `instituicoes`.*,  `usuarios`.nome as username, `instituicoes`.nome as instname, `instituicoes`.email as instemail,  `usuarios`.email as useremail from midletech.instituicoes INNER JOIN midletech.usuarios ON instituicoes.docente = `usuarios`.idusuario
        ORDER BY `instituicoes`.nome;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;

        return $rows;
    
    }
    public function getInst($id){
        $query = "SELECT * from midletech.instituicoes where instituicoes.idinstituicoes = :id";

        $stmt = $this->dbh->prepare($query);
        $stmt-> bindParam(":id",$id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $this->dbh = null;

        return $row;
    

    }
    public function updateinstituicaoadm($nome, $slogan, $id, $descricao, $email, $sigla, $telefone, $cep, $endereco, $cidade, $facebook, $instagram)
    {
        $query = "UPDATE midletech.instituicoes SET 
           nome = :nome, email = :email, slogan = :slogan, sigla = :sigla, descricao = :descricao, telefone = :telefone, cep = :cep, endereco = :endereco, cidade = :cidade, facebook = :facebook, instagram = :instagram
           where idinstituicoes = :id;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':slogan', $slogan);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':slogan', $slogan);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sigla', $sigla);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':facebook', $facebook);
        $stmt->bindParam(':instagram', $instagram);
    
        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
    }

    }







