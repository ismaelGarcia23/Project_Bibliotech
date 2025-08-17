<?php

class Libro{
    public string $titulo;
    public Autor $autor;
    public bool $disponible;

    public function __construct($titulo, Autor $autor)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->disponible = true;
    }

    public function prestar(){
        if($this->disponible){
            $this->disponible = false;
            
            return true;
        }

    }
    public function devolver(){
        $this->disponible = true;
    }
}