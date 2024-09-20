<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Bienvenida</title>
</head>
<body>
    <form action="" method="post">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>
        
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option default="true" value="nobi">Selecciona</option>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select>
        
        <input type="submit" value="Enviar">
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];

        // Mostrar el resultado
        echo "<div>";
        if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
            echo "Bienvenida, usted está en el rango de edad permitido.";
        } else {
            echo "Lo siento, usted no está en la demografía permitida.";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
