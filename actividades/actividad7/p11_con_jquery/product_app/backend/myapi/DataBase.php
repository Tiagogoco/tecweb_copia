<?php
namespace TECWEB\MYAPI;

abstract class DataBase {
    protected $conexion;

    // Constructor que establece la conexión con la base de datos
    public function __construct($db, $user, $pass, $host = 'localhost') {
        $this->conexion = @mysqli_connect($host, $user, $pass, $db);

        if (!$this->conexion) {
            die('Error de conexión: ' . mysqli_connect_error());
        }
    }

    // Destructor que cierra la conexión al final de la ejecución
    public function __destruct() {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }
    }
}
?>
