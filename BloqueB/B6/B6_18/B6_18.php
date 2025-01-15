<?php
// Definir arrays para el usuario, errores y datos procesados
$usuario = [
    'nombre' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => ''
];
$error = [
    'nombre' => '',
    'correo' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => ''
];
$datos = [];

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Configurar filtros
    $filtros = [
        'nombre' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Z\s]{2,50}$/']
        ],
        'correo' => FILTER_VALIDATE_EMAIL,
        'telefono' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{9,}$/']
        ],
        'evento' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^(Presencial|Online)$/']
        ],
        'terminos' => [
            'filter' => FILTER_VALIDATE_BOOLEAN,
            'flags' => FILTER_NULL_ON_FAILURE
        ]
    ];

    // Validar las entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    // Evaluar los resultados de validación
    $error['nombre'] = $usuario['nombre'] ? '' : 'ERROR: Nombre debe tener solo letras y entre 2 y 50 caracteres.';
    $error['correo'] = $usuario['correo'] ? '' : 'ERROR: Correo debe ser una dirección válida.';
    $error['telefono'] = $usuario['telefono'] ? '' : 'ERROR: El teléfono debe tener al menos 9 dígitos.';
    $error['evento'] = $usuario['evento'] ? '' : 'ERROR: Seleccione "Presencial" u "Online".';
    $error['terminos'] = $usuario['terminos'] ? '' : 'ERROR: Debe aceptar los términos y condiciones.';

    // Mostrar mensaje de éxito o errores
    $invalid = implode('', $error);
    $sms = $invalid ? 'Corrige los errores que se muestran en pantalla.' : 'Registro completado correctamente.';

    // Sanear datos
    if (!$invalid) {
        $datos['nombre'] = filter_var($usuario['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $datos['correo'] = filter_var($usuario['correo'], FILTER_SANITIZE_EMAIL);
        $datos['telefono'] = filter_var($usuario['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $datos['evento'] = $usuario['evento']; // No necesita sanitización porque está validado
        // Aquí se enviarían los datos a la base de datos
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Eventos</title>
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
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="checkbox"] {
            margin-right: 10px;
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
    <h1>Registro para Eventos</h1>
    <form action="" method="POST">
        <!-- Nombre -->
        <label>Nombre completo:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>">
        <span class="error"><?= $error['nombre'] ?></span>

        <!-- Correo -->
        <label>Correo electrónico:</label>
        <input type="text" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>">
        <span class="error"><?= $error['correo'] ?></span>

        <!-- Teléfono -->
        <label>Teléfono de contacto:</label>
        <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>">
        <span class="error"><?= $error['telefono'] ?></span>

        <!-- Tipo de evento -->
        <label>Tipo de evento:</label>
        <select name="evento">
            <option value="">Seleccione</option>
            <option value="Presencial" <?= $usuario['evento'] === 'Presencial' ? 'selected' : '' ?>>Presencial</option>
            <option value="Online" <?= $usuario['evento'] === 'Online' ? 'selected' : '' ?>>Online</option>
        </select>
        <span class="error"><?= $error['evento'] ?></span>

        <!-- Términos -->
        <label><input type="checkbox" name="terminos" <?= $usuario['terminos'] ? 'checked' : '' ?>> Acepto los términos y condiciones</label>
        <span class="error"><?= $error['terminos'] ?></span>

        <input type="submit" value="Registrar">
    </form>

    <!-- Mostrar resultados -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <div class="result <?= $invalid ? 'error' : 'success' ?>">
            <h3><?= htmlspecialchars($sms) ?></h3>
        </div>
    <?php } ?>
</body>
</html>