<?php

class Autor{
    public string $nombre;
    public string $nacionalidad;

    public function __construct($nombre, $nacionalidad){
        $this->nombre = $nombre;
        $this->nacionalidad = $nacionalidad;
    }
   
}