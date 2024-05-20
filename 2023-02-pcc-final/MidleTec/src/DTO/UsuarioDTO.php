<?php
class UsuarioDTO
{
private $imagem;
private $docmatricula;


function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    function getImagem()
    {
        return $this->imagem;
    }
    function setdocmatricula($docmatricula)
    {
        $this->docmatricula = $docmatricula;
    }

    function getdocmatricula()
    {
        return $this->docmatricula;
    }


}