<?php
require_once "Autor.php";
require_once "Libro.php";
require_once "Usuario.php";
require_once "Prestamo.php";

$autor = new Autor("Gabriel García Márquez", "Colombiana");
$libro = new Libro("Cien Años de Soledad", $autor);
$usuario = new Usuario("Isma", "isma@mail.com");

echo "📚 Libro: {$libro->titulo} - Autor: {$libro->autor->nombre}\n";

// Crear un préstamo
$prestamo = new Prestamo($libro, $usuario);
echo "✅ {$usuario->nombre} prestó el libro el {$prestamo->fechaPrestamo}\n";

// Devolver el libro
$prestamo->devolver();
echo "🔄 El libro fue devuelto el {$prestamo->fechaDevolucion}\n";
