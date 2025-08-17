<?php
class Prestamo {
    public Libro $libro;
    public Usuario $usuario;
    public string $fechaPrestamo;
    public ?string $fechaDevolucion;

    public function __construct(Libro $libro, Usuario $usuario) {
        $this->libro = $libro;
        $this->usuario = $usuario;
        $this->fechaPrestamo = date("Y-m-d");
        $this->fechaDevolucion = null;

        if (!$libro->prestar()) {
            throw new Exception("El libro ya está prestado.");
        }
    }

    public function devolver() {
        $this->libro->devolver();
        $this->fechaDevolucion = date("Y-m-d");
    }
}
