<?php

class Artesao{

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
    public function buscarDados()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM artesao ORDER BY nome_artesao");
        $res = $cmd->fetchALL(PDO::FETCH_ASSOC);
        return $res;
    }

    //cadastrar artesao
    public function cadastrarArtesao($nome_artesao, $cpf, /*$tipo_arte,*/ $email_artesao, $senha, $telefone_artesao, $endereco_artesao,$idcoop, $nome_coop)
    {
        //verificar se já exixste  o email cadastrado
        $cmd = $this->pdo->prepare("SELECT idartesao from artesao WHERE email_artesao = :em");
        $cmd->bindValue(":em", $email_artesao);
        $cmd->execute();
        if($cmd->rowCount() > 0) //email já existe
        {
            return false;
        }
            else //não foi encontrado cadastro com esse email
            {
               $cmd = $this->pdo->prepare("INSERT INTO artesao (nome_artesao, cpf, /*tipo_arte,*/ email_artesao, senha, telefone_artesao, endereco_artesao, idcoop, nome_coop) VALUES
               (:nome, :cpf, /*:ti,*/ :em, :se, :te , :en, :ic, :fk)"); 
               $cmd->bindValue(":nome", $nome_artesao);
               $cmd->bindValue(":cpf", $cpf);
               //$cmd->bindValue(":ti", $tipo_arte);
               $cmd->bindValue(":em", $email_artesao);
               $cmd->bindValue(":se", md5($senha));
               $cmd->bindValue(":te", $telefone_artesao);
               $cmd->bindValue(":en", $endereco_artesao);
               $cmd->bindValue(":ic", $idcoop);
               $cmd->bindValue(":fk", $nome_coop);
               $cmd->execute();
               return true;
            }
        }

    public function excluirArtesao($id_ats)//excluir artesao e pagamento relacionados ao id artesao
    {
        $cmd = $this->pdo->prepare("DELETE FROM arte WHERE idartesao = :id_ats");
        $cmd->bindvalue(":id_ats",$id_ats);
        $cmd->execute();

        $cmd = $this->pdo->prepare("DELETE FROM chat WHERE idartesao = :id_ats");
        $cmd->bindvalue(":id_ats",$id_ats);
        $cmd->execute();

        $cmd = $this->pdo->prepare("DELETE FROM pagamento WHERE idartesao = :id_ats");
        $cmd->bindvalue(":id_ats",$id_ats);
        $cmd->execute();

        $cmd = $this->pdo->prepare("DELETE FROM artesao WHERE idartesao = :id_ats");
        $cmd->bindvalue(":id_ats",$id_ats);
        $cmd->execute();
    }

    //buscar dados de uma pessoa especifica
    public function buscarDadosArtesao($id_artesao)
    {
    // $ress = arrey(); //previnir caso venha vazio
    $cmd = $this->pdo->prepare("SELECT * FROM artesao WHERE idartesao = :id_artesao");
    $cmd->bindValue(":id_artesao",$id_artesao);
    $cmd->execute();   
    $ress = $cmd->fetch(PDO::FETCH_ASSOC);
    return $ress;
    
    }


    //buscar dados de uma pessoa especifica
    //busca apena o primeiro dados da lista (quero a solução do problema)
    // public function buscarDadosArtesao() 
    // {
    //     $ress = array();
    //     $cmd = $this->pdo->query("SELECT * FROM artesao WHERE idartesao");
    //     //$cmd->execute();
    //     $ress = $cmd->fetch(PDO::FETCH_ASSOC);
    //     return $ress;
    // }



    //atualizar dados no banco
    public function atualizarDados($idartesao, $nome_artesao, $cpf, $email_artesao, $senha, $telefone_artesao, $endereco_artesao, $idcoop/*, $nome_coop*/)
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
                $cmd = $this->pdo->prepare("UPDATE artesao SET nome_artesao = :nome, cpf = :cpf, email_artesao = :em,
                        senha = :se, telefone_artesao = :te, endereco_artesao = :en, idcoop = :ic/*, nome_coop = :fk*/ WHERE idartesao = :idartesao");
                $cmd->bindValue(":nome", $nome_artesao);
                $cmd->bindValue(":cpf", $cpf);
                $cmd->bindValue(":em", $email_artesao);
                $cmd->bindValue(":se", md5($senha));
                $cmd->bindValue(":te", $telefone_artesao);
                $cmd->bindValue(":en", $endereco_artesao);
                $cmd->bindValue(":idartesao", $idartesao);
                $cmd->bindValue(":ic", $idcoop);
                // $cmd->bindValue(":fk", $nome_coop);
                $cmd->execute();
                // return true;
            // }
    }

    //atualizar dados no banco sem senha
    public function atualizarDadosSemSenha($idartesao, $nome_artesao, $cpf, $email_artesao, $telefone_artesao, $endereco_artesao, $idcoop/*, $nome_coop*/)
    {
                $cmd = $this->pdo->prepare("UPDATE artesao SET nome_artesao = :nome, cpf = :cpf, email_artesao = :em, telefone_artesao = :te, endereco_artesao = :en, idcoop = :ic/*, nome_coop = :fk*/ WHERE idartesao = :idartesao");
                $cmd->bindValue(":nome", $nome_artesao);
                $cmd->bindValue(":cpf", $cpf);
                $cmd->bindValue(":em", $email_artesao);
                $cmd->bindValue(":te", $telefone_artesao);
                $cmd->bindValue(":en", $endereco_artesao);
                $cmd->bindValue(":idartesao", $idartesao);
                $cmd->bindValue(":ic", $idcoop);
                $cmd->execute();
                
    }
    
    //atualizar dados no banco
    // public function atualizarDados($idartesao, $nome_artesao, $cpf, $email_artesao, $senha, $telefone_artesao, $endereco_artesao)
    // {
    //     // //antes de atualizar verificar se email ja está cadastrado
    //     // $cmd = $this->pdo->prepare("SELECT idartesao from artesao WHERE email_artesao = :em");
    //     // $cmd->bindValue(":em", $email_artesao);
    //     // $cmd->execute();
    //     // if($cmd->rowCount() > 0) //email já existe
    //     // {
    //     //     return false;
    //     // }
    //     //     else //não foi encontrado cadastro com esse email
    //     //     {
    //             $cmd = $this->pdo->query("UPDATE artesao SET nome_artesao = 'nome_artesao', cpf = 'cpf', email_artesao = 'email_artesao',
    //                     senha = 'senha', telefone_artesao = 'telefone_artesao', endereco_artesao = 'endereco_artesao' WHERE idartesao = 'idartesao'");
                
    //         // }
    // }

    //busca o id artesao e id coop para o pagamento
    public function buscarDadosArtesao2($id_ar)
    {
    // $ress = arrey(); //previnir caso venha vazio
    $cmd = $this->pdo->prepare("SELECT * FROM artesao WHERE cpf = :id_ar");
    $cmd->bindValue(":id_ar",$id_ar);
    $cmd->execute();   
    $ress = $cmd->fetch(PDO::FETCH_ASSOC);
    return $ress;
    }


// -----------------PÁGINA LISTA(USER) E ESQUECEU SENHA e EDIT-SENHA-----------------

    //busca dados do artesao para a PÁGINA LISTA(USER) e ESQUECEU SENHA
    public function buscarDadosArtesao3($email)
    {
    // $ress = arrey(); //previnir caso venha vazio
    $cmd = $this->pdo->prepare("SELECT * FROM artesao WHERE email_artesao = :email");
    $cmd->bindValue(":email",$email);
    $cmd->execute();   
    $resDados = $cmd->fetch(PDO::FETCH_ASSOC);
    return $resDados;
    }

    //Atualizar Senha artesao PÁGINA EDIT-SENHA
    public function atualizarSenha($idartesao, $cpf, $email_artesao, $senha, $telefone_artesao)
    {
        $cmd = $this->pdo->prepare("UPDATE artesao SET cpf = :cpf, email_artesao = :em,
                        senha = :se, telefone_artesao = :te WHERE idartesao = :idartesao");
        $cmd->bindValue(":cpf", $cpf);
        $cmd->bindValue(":em", $email_artesao);
        $cmd->bindValue(":se", md5($senha));
        $cmd->bindValue(":te", $telefone_artesao);
        $cmd->bindValue(":idartesao", $idartesao);
        $cmd->execute();
    }


    //busca os dados e coloca na lista PÁGINA LISTA USER
    public function buscarDadosUser($email)
    {
        // $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM artesao WHERE email_artesao = :em");
        $cmd->bindValue(":em", $email);
        $cmd->execute();
        $dados = $cmd->fetchALL(PDO::FETCH_ASSOC);
        return $dados;
    }

// ------------------------------------FORM ADM---------------------------------------

    //cadastrar artesao
    public function cadastrarArtesaoAdm($nome_artesao, $cpf, /*$tipo_arte,*/ $email_artesao, $senha, $telefone_artesao, $endereco_artesao,  $perfil, $idcoop, $nome_coop)
    {
        //verificar se já exixste  o email cadastrado
    $cmd = $this->pdo->prepare("SELECT idartesao from artesao WHERE email_artesao = :em");
    $cmd->bindValue(":em", $email_artesao);
    $cmd->execute();
    if($cmd->rowCount() > 0) //email já existe
    {
        return false;
    }
        else //não foi encontrado cadastro com esse email
        {
           $cmd = $this->pdo->prepare("INSERT INTO artesao (nome_artesao, cpf, /*tipo_arte,*/ email_artesao, senha, telefone_artesao, endereco_artesao, perfil, idcoop, nome_coop) VALUES
           (:nome, :cpf, /*:ti,*/ :em, :se, :te , :en, :pe, :ic, :fk)"); 
           $cmd->bindValue(":nome", $nome_artesao);
           $cmd->bindValue(":cpf", $cpf);
           //$cmd->bindValue(":ti", $tipo_arte);
           $cmd->bindValue(":em", $email_artesao);
           $cmd->bindValue(":se", md5($senha));
           $cmd->bindValue(":te", $telefone_artesao);
           $cmd->bindValue(":en", $endereco_artesao);
           $cmd->bindValue(":pe", $perfil);
           $cmd->bindValue(":ic", $idcoop);
           $cmd->bindValue(":fk", $nome_coop);
           $cmd->execute();
           return true;
        }
    }


//-------------------------------Atualizar dados PÁGINA ADM---------------------------------------


    public function atualizarDadosAdm($idartesao, $nome_artesao, $cpf, $email_artesao, $senha, $telefone_artesao, $endereco_artesao, $perfil, $idcoop)
    {
                $cmd = $this->pdo->prepare("UPDATE artesao SET nome_artesao = :nome, cpf = :cpf, email_artesao = :em,
                        senha = :se, telefone_artesao = :te, endereco_artesao = :en, perfil = :pe, idcoop = :ic WHERE idartesao = :idartesao");
                $cmd->bindValue(":nome", $nome_artesao);
                $cmd->bindValue(":cpf", $cpf);
                $cmd->bindValue(":em", $email_artesao);
                $cmd->bindValue(":se", md5($senha));
                $cmd->bindValue(":te", $telefone_artesao);
                $cmd->bindValue(":en", $endereco_artesao);
                $cmd->bindValue(":pe", $perfil);
                $cmd->bindValue(":idartesao", $idartesao);
                $cmd->bindValue(":ic", $idcoop);
                $cmd->execute();
    }

     //atualizar dados no banco sem senha
    public function atualizarDadosSemSenhaAdm($idartesao, $nome_artesao, $cpf, $email_artesao, $telefone_artesao, $endereco_artesao, $perfil, $idcoop/*, $nome_coop*/)
    {
                $cmd = $this->pdo->prepare("UPDATE artesao SET nome_artesao = :nome, cpf = :cpf, email_artesao = :em, telefone_artesao = :te, endereco_artesao = :en, perfil = :pe, idcoop = :ic/*, nome_coop = :fk*/ WHERE idartesao = :idartesao");
                $cmd->bindValue(":nome", $nome_artesao);
                $cmd->bindValue(":cpf", $cpf);
                $cmd->bindValue(":em", $email_artesao);
                $cmd->bindValue(":te", $telefone_artesao);
                $cmd->bindValue(":en", $endereco_artesao);
                $cmd->bindValue(":idartesao", $idartesao);
                $cmd->bindValue(":pe", $perfil);
                $cmd->bindValue(":ic", $idcoop);
                $cmd->execute();
    }



}
?>