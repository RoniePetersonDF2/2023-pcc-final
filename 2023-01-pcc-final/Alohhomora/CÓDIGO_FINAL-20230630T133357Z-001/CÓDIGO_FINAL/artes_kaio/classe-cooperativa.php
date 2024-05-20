<?php

class Cooperativa{

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
    //busca os dados e coloca na lista de cadastrados
    public function buscarDadosCoop()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM cooperativa ORDER BY nome_empresa");
        $res = $cmd->fetchALL(PDO::FETCH_ASSOC);
        return $res;
    }

    //cadastrar cooperativa
    public function cadastrarCooperativa($nome_empresa, $nome_fantasia,$cnpj, $natureza, $telefone_coop, $endereco_coop, $email_coop)
    {
        //verificar se já exixste  o email cadastrado
        $cmd = $this->pdo->prepare("SELECT idcoop from cooperativa WHERE email_coop = :em");
        $cmd->bindValue(":em", $email_coop);
        $cmd->execute();
        if($cmd->rowCount() > 0) //email já existe
        {
            return false;
        }
            else //não foi encontrado cadastro com esse email
            {
               $cmd = $this->pdo->prepare("INSERT INTO cooperativa (nome_empresa, nome_fantasia, cnpj, natureza, telefone_coop, endereco_coop, email_coop) VALUES
               (:nome, :nome_f, :cnpj, :na, :te , :en, :em)"); 
               $cmd->bindValue(":nome", $nome_empresa);
               $cmd->bindValue(":nome_f", $nome_fantasia);
               $cmd->bindValue(":cnpj", $cnpj);
               $cmd->bindValue(":na", $natureza);
               $cmd->bindValue(":te", $telefone_coop);
               $cmd->bindValue(":en", $endereco_coop);
               $cmd->bindValue(":em", $email_coop);
               $cmd->execute();
               return true;
            }
        }
        

    public function excluirCooperativa($id_excoop)//excluir cooperativa, artesao e pagamento relacionados ao id cooperativa
    {
        $cmd = $this->pdo->prepare("DELETE FROM arte WHERE idcoop = :id_excoop");
        $cmd->bindvalue(":id_excoop",$id_excoop);
        $cmd->execute();

        $cmd = $this->pdo->prepare("DELETE FROM chat WHERE idcoop = :id_excoop");
        $cmd->bindvalue(":id_excoop",$id_excoop);
        $cmd->execute();

        $cmd = $this->pdo->prepare("DELETE FROM pagamento WHERE idcoop = :id_excoop");
        $cmd->bindvalue(":id_excoop",$id_excoop);
        $cmd->execute();

        $cmd = $this->pdo->prepare("DELETE FROM artesao WHERE idcoop = :id_excoop");
        $cmd->bindvalue(":id_excoop",$id_excoop);
        $cmd->execute();

        $cmd = $this->pdo->prepare("DELETE FROM cooperativa WHERE idcoop = :id_excoop");
        $cmd->bindvalue(":id_excoop",$id_excoop);
        $cmd->execute();
    }

        

    //buscar dados de uma empresa especifica
    public function buscarDadosCooperativa($id_coop)
    {
    // $ress = arrey(); //previnir caso venha vazio
    $cmd = $this->pdo->prepare("SELECT * FROM cooperativa WHERE idcoop = :id_coop");
    $cmd->bindValue(":id_coop",$id_coop);
    $cmd->execute();   
    $ress = $cmd->fetch(PDO::FETCH_ASSOC);
    return $ress;
    }



    //atualizar dados no banco
    public function atualizarDadosCoop($idcoop, $nome_empresa, $nome_fantasia,$cnpj, $natureza, $telefone_coop, $endereco_coop, $email_coop)
    {
        // //antes de atualizar verificar se email ja está cadastrado
        // $cmd = $this->pdo->prepare("SELECT idartesao from artesao WHERE email_artesao = :em");
        // $cmd->bindValue(":em", $email_artesao);
        // $cmd->execute();
        // if($cmd->rowCount() > 0) //email já existe
        // {
        //     return false;
        // }
        //     else //não foi encontrado cadastro com esse email
        //     {

                $cmd = $this->pdo->prepare("UPDATE cooperativa SET nome_empresa = :nome, nome_fantasia = :nome_f, cnpj = :cnpj, natureza = :na,
                telefone_coop = :te, endereco_coop = :en, email_coop = :em WHERE idcoop = :idcoop"); 
               $cmd->bindValue(":nome", $nome_empresa);
               $cmd->bindValue(":nome_f", $nome_fantasia);
               $cmd->bindValue(":cnpj", $cnpj);
               $cmd->bindValue(":na", $natureza);
               $cmd->bindValue(":te", $telefone_coop);
               $cmd->bindValue(":en", $endereco_coop);
               $cmd->bindValue(":em", $email_coop);
               $cmd->bindValue(":idcoop", $idcoop);
               $cmd->execute();
                // return true;
            // }
    }
  



// -----------------------PÁGINA FORM ARTESAO (ADM e NORMAL)---------------------------------


    //busca o id e o nome nome fantazia (Jà marca o campo inserindo a chave estrangeira de coop no artesão)
    public function buscarDadosCooperativa2($id_coop)
    {
    // $ress = arrey(); //previnir caso venha vazio
    $cmd = $this->pdo->prepare("SELECT * FROM cooperativa WHERE idcoop = :id_coop");
    $cmd->bindValue(":id_coop",$id_coop);
    $cmd->execute();   
    $ress = $cmd->fetch(PDO::FETCH_ASSOC);
    return $ress;
    }

// -----------------------PÁGINA EDIT COOPERATIVA---------------------------------

//atualizar nome fantasia na tabela artesao
public function atualizarDadosChave($idcoop, $nome_coop)
{
             $cmd = $this->pdo->prepare("UPDATE artesao SET nome_coop = :fk WHERE idcoop = :id");
             $cmd->bindValue(":fk", $nome_coop);
             $cmd->bindValue(":id", $idcoop);
             $cmd->execute();
}



}
?>