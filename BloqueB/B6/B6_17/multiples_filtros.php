<?php
// Definir arrays para el usuario, errores y datos procesados
$usuario = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
];
$error = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
];
$datos = [];

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Configurar filtros
    $filtros = [
        'nombre' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/[A-z]{3,}/']
        ],
        'edad' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 18, 'max_range' => 65]
        ],
        'correo' => FILTER_VALIDATE_EMAIL,
        'telefono' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/[0-9]{9}/']
        ],
        'sms' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/[A-z]{1,50}/']
        ],
    ];

    // Validar las entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    // Evaluar los resultados de validación
    $error['nombre'] = $usuario['nombre'] ? '' : 'ERROR: Debe escribir un nombre válido (mínimo 3 caracteres).';
    $error['edad'] = $usuario['edad'] ? '' : 'ERROR: La edad debe estar entre 18 y 65 años.';
    $error['correo'] = $usuario['correo'] ? '' : 'ERROR: El correo debe ser válido.';
    $error['telefono'] = $usuario['telefono'] ? '' : 'ERROR: El teléfono debe tener 9 dígitos.';
    $error['sms'] = $usuario['sms'] ? '' : 'ERROR: El mensaje debe tener entre 1 y 50 caracteres.';

    // Mostrar mensaje de éxito o errores
    $invalid = implode($error);
    $sms = $invalid ? 'Corrige los errores que se muestran en pantalla.' : '¡Gracias! Los datos son correctos.';

    // Sanear datos
    if (!$invalid) {
        $datos['nombre'] = filter_var($usuario['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $datos['edad'] = filter_var($usuario['edad'], FILTER_SANITIZE_NUMBER_INT);
        $datos['correo'] = filter_var($usuario['correo'], FILTER_SANITIZE_EMAIL);
        $datos['telefono'] = filter_var($usuario['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $datos['sms'] = filter_var($usuario['sms'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // Aquí se enviarían los datos a la base de datos
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .error {
            font-size: 12px;
            color: red;
            display: block;
            margin: -10px 0 10px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .result {
            margin: 20px auto;
            max-width: 600px;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
        }
        .result.success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .result.error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>
    <h1>Formulario de contacto</h1>
    <form action="multiples_filtros.php" method="POST">
        <!-- Nombre -->
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>">
        <span class="error"><?= $error['nombre'] ?></span>

        <!-- Edad -->
        <label>Edad:</label>
        <input type="text" name="edad" value="<?= htmlspecialchars($usuario['edad']) ?>">
        <span class="error"><?= $error['edad'] ?></span>

        <!-- Correo -->
        <label>Correo:</label>
        <input type="text" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>">
        <span class="error"><?= $error['correo'] ?></span>

        <!-- Teléfono -->
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>">
        <span class="error"><?= $error['telefono'] ?></span>

        <!-- Mensaje -->
        <label>Mensaje:</label>
        <input type="text" name="sms" value="<?= htmlspecialchars($usuario['sms']) ?>">
        <span class="error"><?= $error['sms'] ?></span>

        <input type="submit" value="Guardar">
    </form>

    <!-- Mostrar resultados -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <div class="result <?= $invalid ? 'error' : 'success' ?>">
            <h3><?= htmlspecialchars($sms) ?></h3>
        </div>
    <?php } ?>
</body>
</html>
