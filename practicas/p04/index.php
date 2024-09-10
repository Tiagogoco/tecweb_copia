<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>
    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>
    <?php
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;
        echo '<p>a. Ahora muestra el contenido de cada variable: </p>';
        print $a. '<br>';
        print $b. '<br>';
        print $c. '<br>';

        echo '<p>b. Agrega al código actual las siguientes asignaciones: </p>';
        echo ' $a = "PHP server"; $b = &$a; <br> ';
        echo '<br>';
        $a = "PHP server";
        $b = &$a;
        print $a. '<br>';
        print $b. '<br>';
        print $c. '<br>';
        echo '<br> en este bloque de asignaciones de cambia el valor de la variable "a" a "PHP server", <br> 
        y se cambia el valor de la variable "b" a el valor que que tenga asignado <br> la variable "a",  que en este caso es "PHP server" '
    ?>
    <h2>Ejercicio 3</h2>
    <p> Muestra el contenido de cada variable inmediatamente después de cada asignación, <br>
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo):
    </p>
    <?php
        $a = "PHP5";
        var_dump($a);
        echo '<br>';
        $z[] = &$a;
        var_dump($z);
        echo '<br>';
        $b = "5a version de PHP";
        var_dump($b);
        echo '<br>';
        $c = $b*10;
        var_dump($c);
        echo '<br>';
        $a .= $b;
        var_dump($a);
        echo '<br>';
        $b *= $c;
        var_dump($b);
        echo '<br>';
        $z[0] = "MySQL";
        var_dump($z);
        echo '<br>';
    ?>
</body>
</html>