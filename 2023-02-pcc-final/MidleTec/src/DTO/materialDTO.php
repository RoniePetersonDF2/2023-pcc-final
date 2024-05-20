<?php
class MaterialDTO
{
    private $artigo;

    private $video;


    function setArtigo($artigo)
    {
        $this->artigo = $artigo;
    }

    function getArtigo()
    {
        return $this->artigo;
    }



    function setVideo($video)
    {

        $this->video = $video;

    }

    function getVideo(){
        return $this->video;
    }
    

}