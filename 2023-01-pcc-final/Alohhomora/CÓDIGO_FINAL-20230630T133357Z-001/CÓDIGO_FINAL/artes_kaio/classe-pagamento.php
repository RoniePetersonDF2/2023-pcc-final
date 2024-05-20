<?php

class Pagamento{

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

    //cadastrar pagamento
    public function cadastrarPagamento($nome_pgto, $data_pgto, $pacote, $idartesao, $idcoop)
    {
        // //verificar se já exixste  o email cadastrado
        // $cmd = $this->pdo->prepare("SELECT idcoop from cooperativa WHERE email_coop = :em");
        // $cmd->bindValue(":em", $email_coop);
        // $cmd->execute();
        // if($cmd->rowCount() > 0) //email já existe
        // {
        //     return false;
        // }
        //     else //não foi encontrado cadastro com esse email
        //     {
               $cmd = $this->pdo->prepare("INSERT INTO pagamento (nome_pgto, data_pgto, pacote, idartesao, idcoop) VALUES
               (:nome, :dt, :pa, :ia, :ic)"); 
               $cmd->bindValue(":nome", $nome_pgto);
               $cmd->bindValue(":dt", $data_pgto);
               $cmd->bindValue(":pa", $pacote);
               $cmd->bindValue(":ia", $idartesao);
               $cmd->bindValue(":ic", $idcoop);
               $cmd->execute();
            //    return true;
            // }
        }
    
    public function excluirPagamento()
    {
        //essa função está ligada ao "Excluir Artesão" no arquivo "classe-artesao"
    }


// -------------------------------PÁGINA PAGAMENTO(ATUALIZA TIPO OFF PARA TIPO USE)-------------------------------
 //atualizar dados no banco
 public function atualizarUser($idartesao, $perfil)
 {
             $cmd = $this->pdo->prepare("UPDATE artesao SET perfil = :pe WHERE idartesao = :idartesao");
             $cmd->bindValue(":pe", $perfil);
             $cmd->bindValue(":idartesao", $idartesao);
             $cmd->execute();
 }


}
?>


