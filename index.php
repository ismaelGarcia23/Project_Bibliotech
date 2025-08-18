<?php
require_once "Autor.php";
require_once "Libro.php";
require_once "Usuario.php";
require_once "Prestamo.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Prestamo de Libros</title>
    <style>
        body {
    font-family: 'Segoe UI', Arial, sans-serif;
    background: #f4f6fb;
    margin: 0;
    padding: 0;
}
.container {
    background: #fff;
    max-width: 420px;
    margin: 40px auto;
    padding: 32px 28px 24px 28px;
    border-radius: 12px;
    box-shadow: 0 4px 18px rgba(0,0,0,0.09);
}
h2 {
    color: #2d3a4b;
    margin-bottom: 18px;
    text-align: center;
}
label {
    display: block;
    margin-bottom: 8px;
    color: #3a4a5d;
}
input[type="text"], input[type="email"] {
    width: 100%;
    padding: 8px 10px;
    margin-bottom: 16px;
    border: 1px solid #cfd8dc;
    border-radius: 5px;
    font-size: 1em;
}
button {
    background: #4f8cff;
    color: #fff;
    border: none;
    padding: 10px 0;
    width: 100%;
    border-radius: 5px;
    font-size: 1.1em;
    cursor: pointer;
    transition: background 0.2s;
}
button:hover {
    background: #2563eb;
}
.result {
    background: #e3f2fd;
    border-left: 4px solid #4f8cff;
    margin-top: 22px;
    padding: 16px 12px;
    border-radius: 6px;
    color: #1a237e;
    font-size: 1.05em;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Préstamo</h2>
        <form method="post">
            <label>Nombre del Autor:
                <input type="text" name="autor_nombre" required>
            </label>
            <label>Nacionalidad del Autor:
                <input type="text" name="autor_nacionalidad" required>
            </label>
            <label>Título del Libro:
                <input type="text" name="libro_titulo" required>
            </label>
            <label>Nombre del Usuario:
                <input type="text" name="usuario_nombre" required>
            </label>
            <label>Email del Usuario:
                <input type="email" name="usuario_email" required>
            </label>
            <button type="submit">Registrar Préstamo</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') { 
               
                $autor = new Autor($_POST["autor_nombre"], $_POST["autor_nacionalidad"]);
                $libro = new Libro($_POST["libro_titulo"], $autor);
                $usuario = new Usuario($_POST["usuario_nombre"], $_POST["usuario_email"]);

                echo '<div class="result">';
                echo "<b>Libro: </b> {$libro->titulo} - <b>Autor: <b/> {$libro->autor->nombre }<br>";
                $prestamo = new Prestamo($libro, $usuario);
                echo " <b>{$usuario->nombre}</b> prestó el libro el <b>{$prestamo->fechaPrestamo}</b><br>";
                $prestamo->devolver();
                echo "El libro fue devuelto el <b>{$prestamo->fechaDevolucion}</b>";
                echo '</div>';
            }
        ?>
    </div>
</body>
</html>