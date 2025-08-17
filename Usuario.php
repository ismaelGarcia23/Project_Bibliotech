<?php

class Usuario{
    public string $nombre;
    public string $correo;

    public function __construct($nombre, $correo){
        $this->nombre = $nombre;
        $this->correo = $correo;
    }
}