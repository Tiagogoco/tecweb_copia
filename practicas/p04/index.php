<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
<p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>
  
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    
    <?php
        // AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con $ y guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con $ y guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dólar ($).</li>';
        echo '<li>$myvar es válida porque inicia con $ y una letra.</li>';
        echo '<li>$var7 es válida porque inicia con $ y una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con $ y guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>

    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>

    <?php
        echo '<h4>Respuesta:</h4>';
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;
        echo '<p>a. Ahora muestra el contenido de cada variable: </p>';
        print $a. '<br />';
        print $b. '<br />';
        print $c. '<br />';

        echo '<p>b. Agrega al código actual las siguientes asignaciones: </p>';
        echo ' $a = "PHP server"; $b = &$a; <br />';
        echo '<br />';
        $a = "PHP server";
        $b = &$a;
        print $a. '<br />';
        print $b. '<br />';
        print $c. '<br />';
        echo '<br /> en este bloque de asignaciones se cambia el valor de la variable "a" a "PHP server", <br /> 
        y se cambia el valor de la variable "b" al valor que tenga asignado la variable "a", que en este caso es "PHP server".';
    ?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación, <br />
       verificar la evolución del tipo de estas variables (imprime todos los componentes de los
       arreglo):
    </p>

    <?php
        echo '<h4>Respuesta:</h4>';
        $a = "PHP5";
        var_dump($a);
        echo '<br />';
        $z[] = &$a;
        var_dump($z);
        echo '<br />';
        $b = "5a version de PHP";
        var_dump($b);
        echo '<br />';
        $c = $b*10;
        var_dump($c);
        echo '<br />';
        $a .= $b;
        var_dump($a);
        echo '<br />';
        $b *= $c;
        var_dump($b);
        echo '<br />';
        $z[0] = "MySQL";
        var_dump($z);
        echo '<br />';
    ?>

    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior,<br /> pero ahora con la ayuda de
    a matriz $GLOBALS o del modificador global de PHP.</p>

    <?php
        echo '<h4>Respuesta:</h4>';
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";
        $c = $b * 10;
        $a .= $b;
        $b *= $c;
        $z[0] = "MySQL";
        var_dump($GLOBALS['a']);
        echo '<br />';
        var_dump($GLOBALS['z']);
        echo '<br />';
        var_dump($GLOBALS['b']);
        echo '<br />';
        var_dump($GLOBALS['c']);
        echo '<br />';
    ?>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <p>$a = “7 personas”; <br /> $b = (integer) $a; <br />$a = “9E3”; <br /> $c = (double) $a; <br /></p>

    <?php
        echo '<h4>Respuesta:</h4>';
        $a= "7 personas";
        $b = (integer) $a; 
        $a = "9E3";
        $c = (double)$a;
        echo $a .'<br />';
        echo $b .'<br />';
        echo $c .'<br />';
    ?>

    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f  <br /> </p> <p>usando la función var_dump(&lt;datos&gt;).</p>

    <p>Después investiga una función de PHP que permita transformar el valor booleano de <br /> $c y $e
    en uno que se pueda mostrar con un echo:</p>

    <p>$a = “0”;<br />
       $b = “TRUE”; <br />
       $c = FALSE; <br />
       $d = ($a OR $b); <br />
       $e = ($a AND $c); <br />
       $f = ($a XOR $b); <br />
    </p>

    <?php
        $a = "0";    
        var_dump($a);  
        echo '<br />';
        $b = "TRUE";    
        var_dump($b);
        echo '<br />';
        $c = FALSE;  
        var_dump($c);  
        echo '<br />'; 
        $d = ($a OR $b);  
        var_dump($d);
        echo '<br />';
        $e = ($a AND $c); 
        var_dump($e);
        echo '<br />';
        $f = ($a XOR $b); 
        var_dump($f);
        echo '<br />';
        echo "Valor booleano de c: " . var_export($c, true) . "<br />";
        echo "Valor booleano de e: " . var_export($e, true) . "<br />";
    ?>

    <h2>Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente: <br />
       a. La versión de Apache y PHP, <br />
       b. El nombre del sistema operativo (servidor), <br />
       c. El idioma del navegador (cliente). <br />
    </p>

    <?php
        // a. Versión de Apache y PHP
        echo "Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "<br />";
        echo "Versión de PHP: " . phpversion() . "<br />";

        // b. Nombre del sistema operativo (servidor)
        echo "Sistema operativo del servidor: " . PHP_OS . "<br />";

        // c. Idioma del navegador (cliente)
        echo "Idioma del navegador del cliente: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br />";
    ?>
<p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>
</body>
</html>
