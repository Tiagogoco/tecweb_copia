<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Productos</title>
</head>
<body>
    <h2>Insertar Productos a la Base de Datos</h2>
    <fieldset>
        <form action="" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required><br><br>

            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" required><br><br>

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" required><br><br>

            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" step="0.01" required><br><br>

            <label for="detalles">Detalles</label><br>
            <textarea name="detalles" id="detalles" required></textarea><br><br>

            <label for="unidades">Unidades</label>
            <input type="number" name="unidades" id="unidades" required><br><br>

            <label for="imagenes">Imagen</label>
            <input type="text" name="imagenes" id="imagenes" required><br><br>

            <input type="submit" name="submit" value="Enviar">
        </form>
    </fieldset>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Conexión a la base de datos
        @$link = new mysqli('localhost', 'root', 'Capitan23', 'marketzone');

        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error);
        }

        // Capturar los datos del formulario
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = (float) $_POST['precio'];
        $detalles = $_POST['detalles'];
        $unidades = (int) $_POST['unidades'];
        $imagenes = $_POST['imagenes'];
        

        // Consulta para verificar si el producto ya existe
        $sql_check = "SELECT id FROM productos WHERE nombre = '$nombre' AND marca = '$marca' AND modelo = '$modelo'";
        $result_check = $link->query($sql_check);

        if ($result_check->num_rows > 0) {
            // Si ya existe un producto con los mismos valores
            echo "El producto ya existe en la base de datos. No se puede insertar duplicados.";
        } else {
            // Si no existe, insertar el nuevo producto
            $sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagenes, eliminado) 
                           VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagenes', 0)";

            if ($link->query($sql_insert) === TRUE) {
                echo "Producto $nombre, $marca, $modelo insertado correctamente.";
            } else {
                echo "Error: " . $link->error;
            }
        }

        // Cerrar la conexión
        $link->close();
    }
    ?>
</body>
</html>
