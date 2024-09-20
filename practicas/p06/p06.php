<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <!-- <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    
    <form method="get">
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero" required>
        <button type="submit">Comprobar</button>
    </form>

    <?php
    include 'funciones.php'; 
    // if (isset($_GET['numero'])) {
    //     $num = $_GET['numero'];
    //     if ($num % 5 == 0 && $num % 7 == 0) {
    //         echo '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    //     } else {
    //         echo '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    //     }
    // }
    ?> -->

    <!-- <h2>Ejercicio 2: Generación de Números Aleatorios</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por: impar, par, impar.</p>

    <form action="" method="post">
        <button type="submit" name="generar">Generar Números</button>
    </form> -->

    <?php
    // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generar'])) {
    //     imprimirNumerosAleatorios();
    // }
    ?>

    <!-- <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, <br>
    pero que además sea múltiplo de un número dado.</p>
    
    <form action="" method="get">
        <label for="numero3">Ingresa un número:</label>
        <input type="number" name="numero3" id="numero3" required>
        <button type="submit" name="obtener">Obtener múltiplo</button>
    </form>
     -->
    <?php
        // if (isset($_GET['obtener']) && isset($_GET['numero3'])) {
        //     $numero = $_GET['numero3'];
        //     if (!empty($numero) && is_numeric($numero)) {
        //         echo "<h3>Resultado con ciclo while:</h3>";
        //         encontrarParMultiplo($numero);

        //         echo "<h3>Resultado con ciclo do-while:</h3>";
        //         encontrarParDoWhile($numero);
        //     } else {
        //         echo "<p>Por favor, ingresa un número válido.</p>";
        //     }
        // }
?>

    <h2>Ejercicio 4</h2>
    <p>
        Crear un arreglo cuyos índices van de 97 a 122 <br>y cuyos valores son las letras de la ‘a’
        a la ‘z’. <br>Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
        el valor en cada índice. Es decir: <br> [97] => a <br>
        [98] => b <br> 
        [99] => c <br> 
        ... <br> 
        [122] => z
    </p>
    
    <form action="" method="POST">
        <button type="submit" name="hacer">Examinar</button>
    </form>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hacer'])) {
        generarTablaCaracteres();
    }
    ?>

</body>
</html>
