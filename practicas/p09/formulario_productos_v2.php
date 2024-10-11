<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Productos</title>
</head>
<body>
    <h2>Editar el Producto</h2>

    <?php
    // Conectar a la base de datos
    @$link = new mysqli('localhost', 'root', 'Capitan23', 'marketzone');

    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
    }

    // Verificar si se recibe el 'id' del producto por URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consultar los detalles del producto
        $query = "SELECT * FROM productos WHERE id = $id";
        $result = $link->query($query);

        if ($result->num_rows > 0) {
            // Obtener los datos del producto
            $producto = $result->fetch_assoc();
        } else {
            die("Producto no encontrado.");
        }
    } else {
        die("ID del producto no proporcionado.");
    }

    // Cerrar la conexión
    $link->close();
    ?>

    <fieldset>
        <form action="" method="post">
            <!-- Los campos se rellenan con los valores del producto obtenido -->
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required><br><br>

            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="<?= htmlspecialchars($producto['marca']) ?>" required><br><br>

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="<?= htmlspecialchars($producto['modelo']) ?>" required><br><br>

            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" value="<?= htmlspecialchars($producto['precio']) ?>" step="0.01" required><br><br>

            <label for="detalles">Detalles</label><br>
            <textarea name="detalles" id="detalles" required><?= htmlspecialchars($producto['detalles']) ?></textarea><br><br>

            <label for="unidades">Unidades</label>
            <input type="number" name="unidades" id="unidades" value="<?= htmlspecialchars($producto['unidades']) ?>" required><br><br>

            <label for="imagenes">Imagen</label>
            <input type="text" name="imagenes" id="imagenes" value="<?= htmlspecialchars($producto['imagen']) ?>"><br><br>

            <input type="submit" name="submit" value="Enviar">
        </form>
    </fieldset>

</body>
</html>
