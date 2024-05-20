<?php
require_once('DAOconexao.php');

class AvaliacaoDAO
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = Conexao::getConexao();
    }

    public function updateavaliacao($idavaliacao, $rating, $comentario, $data, $idusuario)
    {
        if (($_SESSION['perfil'] == '1') || ($_SESSION['perfil'] == '3') ) {
            $query = "UPDATE midletech.avaliacoes SET avaliacao = :rating, comentario = :comentario, data = :data WHERE idavaliacao = :idavaliacao;";

            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idavaliacao', $idavaliacao);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':comentario', $comentario);
            $stmt->bindParam(':data', $data);

    
            $result = $stmt->execute();
            $this->dbh = null;
    
            return $result;
        }else{
        $query = "UPDATE midletech.avaliacoes SET avaliacao = :rating, comentario = :comentario, data = :data WHERE idavaliacao = :idavaliacao and idusuario = :idusuario;";

        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idavaliacao', $idavaliacao);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':idusuario', $idusuario);

        $result = $stmt->execute();
        $this->dbh = null;

        return $result;
        }
        

    }
    public function deleteavaliacao($idusuario, $idavaliacao)
    {

        if (($_SESSION['perfil'] == '1') || ($_SESSION['perfil'] == '3') ) {
            $dbh = Conexao::getConexao();
            $query = "DELETE from midletech.avaliacoes where idavaliacao = :idavaliacao;";
            // 
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':idavaliacao', $idavaliacao);
            $stmt->execute();

            $result = (int) $stmt->rowCount();
            $this->dbh = null;

            return $result;
        } else {
            $dbh = Conexao::getConexao();
            $query = "DELETE from midletech.avaliacoes where idusuario = :idusuario and idavaliacao = :idavaliacao;";
            // 
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':idusuario', $idusuario);
            $stmt->bindParam(':idavaliacao', $idavaliacao);
            $stmt->execute();

            $result = (int) $stmt->rowCount();
            $this->dbh = null;

            return $result;
        }

    }

}