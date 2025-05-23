<?php



namespace Alura\Mvc\Entity;

class Video{
    public function __construct(public readonly string $url,public readonly string $titulo)
    {
        $this -> url = $url;
        $this-> titulo = $titulo;
    }
}