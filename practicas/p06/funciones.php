<?php
// ej2
function imprimirNumerosAleatorios() {
    $numeros = [];
    $iteraciones = 0;

    do {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $num3 = rand(1, 100);

        $numeros[] = [$num1, $num2, $num3];

        echo "Números generados: $num1, $num2, $num3<br>";

        $iteraciones++;

        $esImparParImpar = ($num1 % 2 != 0) && ($num2 % 2 == 0) && ($num3 % 2 != 0);

    } while (!$esImparParImpar);

    echo "Secuencia impar, par, impar encontrada: $num1, $num2, $num3<br>";

    $totalNumerosGenerados = $iteraciones * 3;
    echo "Número de iteraciones: $iteraciones<br>";
    echo "Cantidad de números generados: $totalNumerosGenerados<br>";
    
    echo "<br>Matriz de números generados:<br>";
    foreach ($numeros as $fila) {
        echo implode(", ", $fila) . "<br>";
    }
}
// imprimirNumerosAleatorios();

//ej3
function encontrarParMultiplo($n) {
    echo "Número dado: $n<br>";
    
    // Se sigue generando hasta encontrar un número par que sea múltiplo de $n
    while (true) {
        $a = rand(1, 100); // Generar un número aleatorio
        echo "Número generado: $a<br>";
        
        // Verificar si el número generado es par y múltiplo de $n
        if ($a % 1 == 0 && $a % $n == 0) {
            echo "El primer número entero que es múltiplo de $n es: $a<br>";
            break; // Romper el ciclo cuando se encuentre el número
        }
    }
}


function encontrarParDoWhile($x) {
    echo "Número dado: $x<br>";
    
    // Generar al menos un número antes de verificar la condición
    do {
        $y = rand(1, 200); // Generar un número aleatorio
        echo "Número generado aleatoriamente: $y<br>";
        
        // Verificar si el número generado es par y múltiplo de $x
        $parMultiplo = ($y % 1 == 0) && ($y % $x == 0);
        
    } while (!$parMultiplo); // Continuar hasta que se cumpla la condición
    
    echo "El primer número par que es múltiplo de $x es: $y<br>";
}

// encontrarParMultiplo(2);
// encontrarParDoWhile(4);

//e4

function generarTablaCaracteres() {
    $arreglo = [];
    
    // Llenar el arreglo con los caracteres ASCII del 97 al 122
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }

    // Imprimir la tabla en formato HTML
    echo "<table border='1'>";
    echo "<tr><th>Índice</th><th>Valor</th></tr>";

    foreach ($arreglo as $key => $value) {
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$value</td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Llamar a la función para mostrar la tabla
// generarTablaCaracteres();

?>


