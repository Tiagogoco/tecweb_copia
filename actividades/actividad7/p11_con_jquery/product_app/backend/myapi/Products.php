<?php
namespace TECWEB\MYAPI;

use TECWEB\MYAPI\DataBase;
require_once __DIR__ . '/DataBase.php';

class Products extends DataBase {
    private $data;

    public function __construct($db, $user = 'root', $pass = 'Capitan23') {
        $this->data = array();
        parent::__construct($db, $user, $pass);
    }

    public function add($jsonOBJ) {
        $this->data = [
            'status' => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        ];

        // Conexión a la base de datos
        $conexion = $this->getConnection();
        
        // Comprobar si ya existe un producto con el mismo nombre
        $nombre = $jsonOBJ->nombre;
        $sql = "SELECT * FROM productos WHERE nombre = '$nombre' AND eliminado = 0";
        $result = $conexion->query($sql);

        if ($result->num_rows == 0) {
            // Preparar e insertar el nuevo producto
            $marca = $jsonOBJ->marca;
            $modelo = $jsonOBJ->modelo;
            $precio = $jsonOBJ->precio;
            $detalles = $jsonOBJ->detalles;
            $unidades = $jsonOBJ->unidades;
            $imagen = $jsonOBJ->imagen;

            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                    VALUES ('$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen', 0)";
            
            if ($conexion->query($sql)) {
                $this->data['status'] = "success";
                $this->data['message'] = "Producto agregado";
            } else {
                $this->data['message'] = "ERROR: No se ejecutó $sql. " . $conexion->error;
            }
        }

        $result->free();
        $conexion->close();

        // Retornar el resultado en formato JSON
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }

    public function delete($id) {
        $this->data = [
            'status' => 'error',
            'message' => 'La consulta falló'
        ];

        // Conexión a la base de datos
        $conexion = $this->getConnection();

        // Actualizar el producto para marcarlo como eliminado
        $sql = "UPDATE productos SET eliminado = 1 WHERE id = $id";
        
        if ($conexion->query($sql)) {
            $this->data['status'] = "success";
            $this->data['message'] = "Producto eliminado";
        } else {
            $this->data['message'] = "ERROR: No se ejecutó $sql. " . $conexion->error;
        }

        $conexion->close();

        // Retornar el resultado en formato JSON
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }

    public function edit($jsonOBJ) {
        $this->data = [
            'status' => 'error',
            'message' => 'La consulta falló'
        ];

        // Conexión a la base de datos
        $conexion = $this->getConnection();

        // Construir la consulta SQL para actualizar el producto
        $sql =  "UPDATE productos SET 
                    nombre = '{$jsonOBJ->nombre}', 
                    marca = '{$jsonOBJ->marca}', 
                    modelo = '{$jsonOBJ->modelo}', 
                    precio = {$jsonOBJ->precio}, 
                    detalles = '{$jsonOBJ->detalles}', 
                    unidades = {$jsonOBJ->unidades}, 
                    imagen = '{$jsonOBJ->imagen}' 
                WHERE id = {$jsonOBJ->id}";

        $conexion->set_charset("utf8");

        // Ejecutar la consulta
        if ($conexion->query($sql)) {
            $this->data['status'] = "success";
            $this->data['message'] = "Producto actualizado";
        } else {
            $this->data['message'] = "ERROR: No se ejecutó $sql. " . $conexion->error;
        }

        $conexion->close();

        // Retornar el resultado en formato JSON
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }

}
?>
