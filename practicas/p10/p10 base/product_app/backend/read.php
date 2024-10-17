<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL DATO DE BÚSQUEDA
    if( isset($_POST['busqueda']) ) {
        $search = $_POST['busqueda'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y SE VALIDA SI HUBO RESULTADOS
        $query = "SELECT * FROM productos WHERE nombre LIKE '%{$busqueda}%' OR marca LIKE '%{$busqueda}%' OR detalles LIKE '%{$busqueda}%'";
        
        if ( $result = $conexion->query($query) ) {
            // SE OBTIENEN TODOS LOS RESULTADOS
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                $product = array();
                foreach($row as $key => $value) {
                    $product[$key] = utf8_encode($value);
                }
                $data[] = $product;
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($conexion));
        }
        $conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
