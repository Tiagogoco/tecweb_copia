<?php
namespace TECWEB\MYAPI;

// Incluir el archivo de la clase DataBase
require_once __DIR__ . '/DataBase.php';

class Products extends DataBase {
    public $data = [];  // Para almacenar datos y mensajes de las operaciones

    // Método para agregar un producto a la base de datos
    public function add(Products $Product): void {
      
    }

    // Método para editar un producto existente en la base de datos
    public function editProduct(Products $Product): void {

    }

    // Método para eliminar (lógicamente) un producto de la base de datos utilizando un string (id)
    public function delete(string $id): void {

    }
}
?>
