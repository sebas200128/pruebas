<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Básico en PHP xD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            border-radius: 5px;
        }

        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <h2>Aprende PHP: Procesar un Formulario</h2>

    <div class="form-container">
        <!-- El atributo action indica a qué archivo se envían los datos. 
             Si es el mismo archivo, se puede dejar vacío o poner su nombre. 
             method="POST" envía los datos de forma oculta en la petición. -->
        <form action="formulario.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required placeholder="Ingresa tu nombre">

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required placeholder="Ingresa tu edad">

            <button type="submit">Enviar</button>
        </form>
    </div>

    <?php
    // Verificamos si el formulario ha sido enviado por el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Recogemos los datos enviados por el formulario usando la superglobal $_POST.
        // htmlspecialchars() se usa como medida básica de seguridad para convertir
        // caracteres especiales en entidades HTML y evitar inyección de código (XSS).
        $nombre = htmlspecialchars($_POST['nombre']);

        // Convertimos la edad a un número entero por seguridad y consistencia
        $edad = (int)$_POST['edad'];

        echo "<div class='resultado'>";
        echo "<h3>Datos Recibidos:</h3>";

        // Estructura de control if/else para mostrar un mensaje dinámico
        if ($edad >= 18) {
            echo "<p>Hola <strong>" . $nombre . "</strong>, tienes " . $edad . " años. Eres <strong>mayor de edad</strong>.</p>";
        } else {
            echo "<p>Hola <strong>" . $nombre . "</strong>, tienes " . $edad . " años. Eres <strong>menor de edad</strong>.</p>";
        }

        echo "</div>";
    }
    ?>

</body>

</html>