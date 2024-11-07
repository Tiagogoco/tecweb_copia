<?php
namespace TECWEB\MYAPI;

include_once __DIR__ . '/DataBase.php';

class Products extends DataBase {
    public function __construct($db, $user='root', $pass='Capitan23') {
        $this->data=array();
        parent::__construct($db, $user,$pass);
    }
    // SEARCH
    public function search(string $search): void {
        $data = array();

        $sql = "SELECT * FROM productos 
                WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' 
                OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') 
                AND eliminado = 0";
        
        if ($result = $this->conexion->query($sql)) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!empty($rows)) {
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $data[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }

        $this->conexion->close();

        echo $this->getData($data);
    }

    // GETDATA
    public function getData(array $data): string {
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    // ADD
    public function add(Products $product): void {
        $data = array(
            'status' => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );

        $sql = "SELECT * FROM productos WHERE nombre = '{$product->nombre}' AND eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result->num_rows == 0) {
            $this->conexion->set_charset("utf8");
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                    VALUES ('{$product->nombre}', '{$product->marca}', '{$product->modelo}', {$product->precio}, 
                            '{$product->detalles}', {$product->unidades}, '{$product->imagen}', 0)";
            if ($this->conexion->query($sql)) {
                $data['status'] = "success";
                $data['message'] = "Producto agregado";
            } else {
                $data['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($this->conexion);
            }
        }

        $result->free();
        $this->conexion->close();

        echo $this->getData($data);
    }

    // LIST
    public function list(): void {
        $data = array();

        $sql = "SELECT * FROM productos WHERE eliminado = 0";
        
        if ($result = $this->conexion->query($sql)) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!empty($rows)) {
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $data[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }

        $this->conexion->close();

        // Devolvemos los datos en formato JSON
        echo $this->getData($data);
    }
}
?>
