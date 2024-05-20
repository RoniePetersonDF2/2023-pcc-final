<?php

class perfilDAO{  
    
    private $dbh;

    public function __construct()
    {
        $this->dbh = Conexao::getConexao();
    }


    public function getAll()
    {
        $query = "SELECT * FROM perfis;";

        $stmt = $this->dbh->query($query);
        $rows = $stmt->fetchAll();
        $this->dbh = null;

        return $rows;
    }

}