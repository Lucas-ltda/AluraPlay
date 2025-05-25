<?php

namespace Alura\MVC\Entity;

class Video{
    
    public readonly string $url; // propriedade publica que só pode ter seu valor atribuido uma vez " readonly"
    public readonly string $titulo;
    public readonly int $id;

    public function __construct(string $url,string $titulo) 
    {
        $this->setUrl($url);
        $this->setTitulo($titulo);
    }

    private function setUrl(string $url){

        if (filter_var($url,FILTER_VALIDATE_URL)=== false)  {
            throw new \InvalidArgumentException();
        }

        $this->url = $url;
    }

    public function setTitulo(string $titulo):void{
        $this->titulo = $titulo;
    }
    
    public function setId(int $id){
        $this->id = $id;
    }
}