<?php
// Mostrar errores de PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si se ha enviado el formulario con el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar a la base de datos
    @$link = new mysqli('localhost', 'root', 'Capitan23', 'marketzone');

    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error);
    }

    // Verificar si se recibe el 'id' del producto por URL
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);  // Asegurarse de que el ID es un entero

        // Recibir los datos del formulario
        $nombre = $link->real_escape_string($_POST['nombre']);
        $marca = $link->real_escape_string($_POST['marca']);
        $modelo = $link->real_escape_string($_POST['modelo']);
        $precio = floatval($_POST['precio']);
        $detalles = $link->real_escape_string($_POST['detalles']);
        $unidades = intval($_POST['unidades']);
        $imagenes = $link->real_escape_string($_POST['imagenes']);

        // Consulta SQL para actualizar el producto
        $sql = "UPDATE productos 
                SET nombre = '$nombre', 
                    marca = '$marca', 
                    modelo = '$modelo', 
                    precio = $precio, 
                    detalles = '$detalles', 
                    unidades = $unidades, 
                    imagenes = '$imagenes' 
                WHERE id = $id";

        // Ejecutar la consulta
        if ($link->query($sql)) {
            echo "Producto actualizado correctamente.";
            echo "<p><a href='http://localhost/tecweb_copia/practicas/p09/get_producto_xhtml_v2.php'>Ver productos en XHTML</a></p>";
            echo "<p><a href='http://localhost/tecweb_copia/practicas/p09/get_productos_vigentes.php'>Ver productos vigentes</a></p>";
        }    
         else {
            echo "Error al actualizar el producto: " . $link->error;
        }
    } else {
        die("ID del producto no proporcionado.");
    }

    // Cerrar la conexión
    $link->close();
} else {
    die("Acceso no permitido.");
}
?>
