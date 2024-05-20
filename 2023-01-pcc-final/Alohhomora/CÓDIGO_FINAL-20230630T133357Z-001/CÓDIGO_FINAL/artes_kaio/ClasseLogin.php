<?php

class ClasseLogin {
    private $pdoLogin;

    public function __construct($pdo) {
        $this->pdoLogin = $pdo;
    }

    public function realizarLogin($email, $senha) {
        $query = "SELECT idartesao, email_artesao, senha, perfil FROM artesao WHERE email_artesao = :email";
        $cmdLogin = $this->pdoLogin->prepare($query);
        $cmdLogin->bindValue(':email', $email);
        $cmdLogin->execute();

        $artesao = $cmdLogin->fetch(PDO::FETCH_ASSOC);

        if (!$artesao) {
            return "E-mail não cadastrado";
        }

        if (md5($senha) !== $artesao['senha']) {
            return "Senha incorreta";
        }


        return $artesao['perfil'];
        
    }
}

?>