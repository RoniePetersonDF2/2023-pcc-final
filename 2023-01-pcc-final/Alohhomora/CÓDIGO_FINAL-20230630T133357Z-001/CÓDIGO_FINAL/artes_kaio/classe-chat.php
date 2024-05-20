<?php

class Chat{

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
        
    //busca os dados e coloca na lista mensagens
    public function buscarMensagens($idcoop)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM chat WHERE idcoop = :idcoop");
        $cmd->bindValue(":idcoop", $idcoop);
        $cmd->execute();
        $res = $cmd->fetchALL(PDO::FETCH_ASSOC);
        return $res;
    }


    public function buscarCoops() {
        
            $cmd = $this->pdo->prepare("SELECT * FROM cooperativa");
            $cmd->execute();
            $coops = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $coops;
    }



    //cadastrar mensagem
    public function cadastrarMensagem($idcoop, $idartesao, $email_artesao, $nome_artesao, $mensagem)
    {
            {
               $cmd = $this->pdo->prepare("INSERT INTO chat (idcoop, idartesao, email_artesao, nome_artesao, mensagem) VALUES
               (:id, :ida, :em, :na, :mn)"); 
               
               $cmd->bindValue(":id", $idcoop);
               $cmd->bindValue(":ida", $idartesao);
               $cmd->bindValue(":em", $email_artesao);
               $cmd->bindValue(":na", $nome_artesao);
               $cmd->bindValue(":mn", $mensagem);
               $cmd->execute();
               return true;
            }
    }

    public function buscarDadosArtesao3($email) //busca os dados para o chatCoop.php
    {
    $cmd = $this->pdo->prepare("SELECT * FROM artesao WHERE email_artesao = :email");
    $cmd->bindValue(":email",$email);
    $cmd->execute();   
    $resDados = $cmd->fetch(PDO::FETCH_ASSOC);
    return $resDados;
    }

    public function excluirChat($email)//exclui chat relacionados ao email do artesao
    {
    $cmd = $this->pdo->prepare("DELETE FROM chat WHERE email_artesao = :email");
        $cmd->bindvalue(":email",$email);
        $cmd->execute();    
    }

//-------------------------------Atualizar dados PÁGINA ADM---------------------------------------


    public function atualizarDadosChat($idartesao, $idcoop, $nome_artesao, $email_artesao )
    {
                $cmd = $this->pdo->prepare("UPDATE chat SET idcoop = :ic, nome_artesao = :nome, email_artesao = :em WHERE idartesao = :idartesao");
                $cmd->bindValue(":ic", $idcoop);
                $cmd->bindValue(":nome", $nome_artesao);
                $cmd->bindValue(":em", $email_artesao);
                $cmd->bindValue(":idartesao", $idartesao);
                $cmd->execute();
    }

}
?>