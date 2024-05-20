<?php

class Arte{

        private $pdo;
        public function __construct($dbname, $host, $user, $senha)
        {
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
            }
            catch (PDOException $e) {
                echo "erro com o banco de dados:" .$e->getMessage() ;
                exit();
            }

            catch (Exception $e) {
                echo "erro generico:" .$e->getMessage() ;
                exit();
            }
        }
        

    public function criarArte($nome_arte, $nome_img, $descricao_arte, $idartesao, $idcoop)
    {
        $cmd = $this->pdo->prepare("INSERT INTO arte (nome_arte, nome_img, descricao_arte, idartesao, idcoop) VALUES
            (:nome, :nome_img, :descricao, :idartesao, :idcoop)");
        $cmd->bindValue(":nome", $nome_arte);
        $cmd->bindValue(":nome_img", $nome_img);
        $cmd->bindValue(":descricao", $descricao_arte);
        $cmd->bindValue(":idartesao", $idartesao);
        $cmd->bindValue(":idcoop", $idcoop);
        $cmd->execute();
        return true;
    }
    
    public function buscarArtesArtesao($idartesao) { //para pegar os dados de contato e juntar com as artes

        $cmd = $this->pdo->prepare("SELECT * FROM arte WHERE idartesao = :idartesao");
        $cmd->bindValue(":idartesao", $idartesao);
        $cmd->execute();
        $artes = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $artes;
    }

    public function buscarArtes() {

        $cmd = $this->pdo->prepare("SELECT * FROM arte");
        $cmd->execute();
        $artes = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $artes;
    }

    public function buscarArtesCoop($idcoop) {

        $cmd = $this->pdo->prepare("SELECT * FROM arte WHERE idcoop = :idcoop");
        $cmd->bindValue(":idcoop", $idcoop);
        $cmd->execute();
        $artesCoop = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $artesCoop;
    }

    public function excluirArtes($ex_art) {
        $cmd = $this->pdo->prepare("DELETE FROM arte WHERE idarte = :ex_art");
        $cmd->bindvalue(":ex_art",$ex_art);
        $cmd->execute();
    }

    //buscar dados de uma imagem especifica
    public function buscarDadosArte($id_arte)
    {
    // $ress = arrey();
    $cmd = $this->pdo->prepare("SELECT * FROM arte WHERE idarte = :id_arte");
    $cmd->bindValue(":id_arte",$id_arte);
    $cmd->execute();   
    $ress = $cmd->fetch(PDO::FETCH_ASSOC);
    return $ress;
    
    }

    //atualizar dados da arte
    public function atualizarArte($idarte, $nome_img, $descricao_arte)
    {
                $cmd = $this->pdo->prepare("UPDATE arte SET nome_img = :nome, descricao_arte = :da WHERE idarte = :idarte");
                $cmd->bindValue(":nome", $nome_img);
                $cmd->bindValue(":da", $descricao_arte);
                $cmd->bindValue(":idarte", $idarte);
                $cmd->execute();
                
    }

}
?>