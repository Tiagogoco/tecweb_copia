<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$xmlFile = 'serviciovodN.xml';

// Verificar que el archivo XML existe
if (!file_exists($xmlFile)) {
    die("El archivo XML no existe en la ruta especificada: $xmlFile");
}

// Cargar el archivo XML
$xml = new DOMDocument();
$xml->load($xmlFile);

// Agregar un nodo de prueba
$perfil = $xml->createElement('perfil');
$perfil->setAttribute('usuario', 'PruebaUsuario');
$perfil->setAttribute('idioma', 'PruebaIdioma');

$perfiles = $xml->getElementsByTagName('perfiles')->item(0);
$perfiles->appendChild($perfil);

// Guardar el archivo actualizado
if ($xml->save($xmlFile)) {
    echo "Archivo XML actualizado correctamente.";
} else {
    die("No se pudo guardar el archivo XML.");
}
?>
