<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre'
    );
    if (!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
    
        // Asegúrate de que la decodificación del JSON fue exitosa
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['exito' => false, 'mensaje' => 'Error en el formato del JSON recibido']);
            exit;
        }
    
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
        $result = $conexion->query($sql);
        
        if ($result->num_rows == 0) {
            $conexion->set_charset("utf8");
            $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
            
            if ($conexion->query($sql)) {
                // Inserción exitosa
                echo json_encode(['exito' => true, 'mensaje' => 'Producto agregado correctamente']);
            } else {
                // Error en la inserción
                echo json_encode(['exito' => false, 'mensaje' => 'Error al agregar el producto: ' . mysqli_error($conexion)]);
            }
        } else {
            // Producto ya existe
            echo json_encode(['exito' => false, 'mensaje' => 'Ya existe un producto con ese nombre']);
        }
    
        $result->free();
        // Cierra la conexión
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>