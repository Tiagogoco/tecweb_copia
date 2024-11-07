<?php
// Incluir el archivo de la clase Products, ajustando la ruta según la estructura de carpetas
include_once __DIR__ . '/myapi/Products.php';

// Verificamos si se ha recibido el parámetro de búsqueda
if (isset($_GET['search'])) {
    // Instanciamos el objeto de la clase Products
    $product = new TECWEB\MYAPI\Products();

    // Llamamos al método search() y pasamos el parámetro de búsqueda
    $product->search($_GET['search']);
} else {
    // Si no se recibe el parámetro de búsqueda, mostramos un mensaje de error
    echo json_encode(
        array('status' => 'error', 'message' => 'No se recibió el parámetro de búsqueda'),
        JSON_PRETTY_PRINT
    );
}
?>
