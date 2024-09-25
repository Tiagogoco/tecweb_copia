<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Parque Vehicular</title>
</head>
<body>
    <h1>Consulta de Parque Vehicular</h1>
    <form action="" method="post">
        <label for="matricula">Buscar por Matrícula:</label>
        <input type="text" id="matricula" name="matricula" placeholder="Ejemplo: ABC1234">
        <button type="submit" name="buscar">Buscar</button>
        <br><br>
        <button type="submit" name="todos">Mostrar Todos los Autos Registrados</button>
    </form>

    <?php
    // Definición del arreglo de parque vehicular
    $parque = [
        'ABC1234' => [
            'auto' => [
                'marca' => 'Toyota',
                'modelo' => 2020,
                'tipo' => 'sedan'
            ],
            'propietario' => [
                'nombre' => 'Juan Pérez',
                'ciudad' => 'Ciudad de México',
                'direccion' => 'Av. Reforma 123'
            ]
        ],
        // ... (otros vehículos)
        'QRS0123' => [
            'auto' => [
                'marca' => 'Jeep',
                'modelo' => 2020,
                'tipo' => 'camioneta'
            ],
            'propietario' => [
                'nombre' => 'Ricardo Gutiérrez',
                'ciudad' => 'Hermosillo',
                'direccion' => 'Av. Reforma 1212'
            ]
        ]
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['buscar'])) {
            $matricula = $_POST['matricula'];
            if (isset($parque[$matricula])) {
                $vehiculo = $parque[$matricula];
                echo "<h2>Información del Vehículo - Matrícula: $matricula</h2>";
                echo "<p><strong>Marca:</strong> " . $vehiculo['auto']['marca'] . "</p>";
                echo "<p><strong>Modelo:</strong> " . $vehiculo['auto']['modelo'] . "</p>";
                echo "<p><strong>Tipo:</strong> " . $vehiculo['auto']['tipo'] . "</p>";
                echo "<p><strong>Propietario:</strong> " . $vehiculo['propietario']['nombre'] . "</p>";
                echo "<p><strong>Ciudad:</strong> " . $vehiculo['propietario']['ciudad'] . "</p>";
                echo "<p><strong>Dirección:</strong> " . $vehiculo['propietario']['direccion'] . "</p>";
            } else {
                echo "<p>No se encontró un vehículo con la matrícula: $matricula.</p>";
            }
        } elseif (isset($_POST['todos'])) {
            // Mostrar todos los vehículos
            echo "<h2>Todos los Vehículos Registrados</h2>";
            foreach ($parque as $matricula => $vehiculo) {
                echo "<h3>Matrícula: $matricula</h3>";
                echo "<p><strong>Marca:</strong> " . $vehiculo['auto']['marca'] . "</p>";
                echo "<p><strong>Modelo:</strong> " . $vehiculo['auto']['modelo'] . "</p>";
                echo "<p><strong>Tipo:</strong> " . $vehiculo['auto']['tipo'] . "</p>";
                echo "<p><strong>Propietario:</strong> " . $vehiculo['propietario']['nombre'] . "</p>";
                echo "<p><strong>Ciudad:</strong> " . $vehiculo['propietario']['ciudad'] . "</p>";
                echo "<p><strong>Dirección:</strong> " . $vehiculo['propietario']['direccion'] . "</p>";
                echo "<hr>";
            }
        }
    }
    ?>
</body>
</html>
