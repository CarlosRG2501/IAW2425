<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .formulario {
            display: flex;
            flex-direction: column;
            margin: 1rem;
        }
        button { padding: 0.3rem; }
        textarea { resize: none; }
        .error { color: red; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <?php
    $errores = [];
    $resultado = "";

    // Validar si el formulario fue enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre = trim($_POST['nombre'] ?? '');
        $apellido1 = trim($_POST['apellido1'] ?? '');
        $apellido2 = trim($_POST['apellido2'] ?? '');
        $dni = trim($_POST['dni'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';
        $telefono = trim($_POST['telefono'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $tratamientoDatos = isset($_POST['tratamientoDatos']);

        // Validar campos obligatorios
        if (empty($nombre)) $errores[] = "El nombre es obligatorio.";
        if (empty($apellido1)) $errores[] = "El primer apellido es obligatorio.";
        if (empty($apellido2)) $errores[] = "El segundo apellido es obligatorio.";
        if (empty($dni)) $errores[] = "El DNI es obligatorio.";
        if (empty($correo)) $errores[] = "El correo es obligatorio.";
        if (empty($password)) $errores[] = "La contraseña es obligatoria.";
        if (!$tratamientoDatos) $errores[] = "Debes aceptar el tratamiento de datos.";

        // Validar formato del DNI
        function validarDNI($dni) {
            $letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
            if (preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
                $numero = substr($dni, 0, 8);
                $letra = substr($dni, -1);
                return $letras[$numero % 23] === $letra;
            }
            return false;
        }
        if (!validarDNI($dni)) $errores[] = "El DNI no es válido.";

        // Validar correo
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El correo no tiene un formato válido.";
        }

        // Validar contraseñas
        if ($password !== $password2) {
            $errores[] = "Las contraseñas no coinciden.";
        }

        // Mostrar resultados o errores
        if (empty($errores)) {
            $resultado = "<h2>Formulario enviado correctamente</h2>
            <p>Nombre: $nombre</p>
            <p>Primer Apellido: $apellido1</p>
            <p>Segundo Apellido: $apellido2</p>
            <p>DNI: $dni</p>
            <p>Correo: $correo</p>
            <p>Teléfono: $telefono</p>
            <p>Descripción: $descripcion</p>
            <p>Aceptaste la política de privacidad: " . ($tratamientoDatos ? "Sí" : "No") . "</p>";
        }
    }
    ?>

    <form action="" method="post">
        <div class="formulario">
            <label for="">*Nombre: </label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>" required>
        </div>
        <div class="formulario">
            <label for="">*Apellido 1: </label>
            <input type="text" name="apellido1" value="<?= htmlspecialchars($_POST['apellido1'] ?? '') ?>" required>
        </div>
        <div class="formulario">
            <label for="">*Apellido 2: </label>
            <input type="text" name="apellido2" value="<?= htmlspecialchars($_POST['apellido2'] ?? '') ?>" required>
        </div>
        <div class="formulario">
            <label for="">*DNI: </label>
            <input type="text" name="dni" value="<?= htmlspecialchars($_POST['dni'] ?? '') ?>" required>
        </div>
        <div class="formulario">
            <label for="">*Correo: </label>
            <input type="email" name="correo" value="<?= htmlspecialchars($_POST['correo'] ?? '') ?>" required>
        </div>
        <div class="formulario">
            <label for="">*Contraseña: </label>
            <input type="password" name="password" required>
        </div>
        <div class="formulario">
            <label for="">*Repetir contraseña: </label>
            <input type="password" name="password2" required>
        </div>
        <div class="formulario">
            <label for="">Teléfono: </label>
            <input type="text" name="telefono" value="<?= htmlspecialchars($_POST['telefono'] ?? '') ?>">
        </div>
        <div class="formulario">
            <label for="">Descripción: </label>
            <textarea name="descripcion"><?= htmlspecialchars($_POST['descripcion'] ?? '') ?></textarea>
        </div>
        <div class="formulario">
            <label for="">*Aceptar política de privacidad: </label>
            <input type="checkbox" name="tratamientoDatos" <?= isset($_POST['tratamientoDatos']) ? 'checked' : '' ?>>
        </div>
        <div class="formulario">
            <button type="submit">Enviar</button>
        </div>
    </form>

    <?php
    // Mostrar errores si los hay
    if (!empty($errores)) {
        echo "<h2>Se encontraron los siguientes errores:</h2>";
        foreach ($errores as $error) {
            echo "<p class='error'>- $error</p>";
        }
    }

    // Mostrar el resultado si no hay errores
    echo $resultado;
    ?>
</body>
</html>
