<?php
$user = [
    'email'      => '',
    'age'        => '',
    'newsletter' => '',
];

$errors = [
    'email'      => '',
    'age'        => '',
    'newsletter' => '',
];

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Definir filtros de validación
    $validation_filters = [
        'email' => [
            'filter' => FILTER_VALIDATE_EMAIL
        ],
        'age' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => [
                'min_range' => 18,
                'max_range' => 100
            ]
        ],
        'newsletter' => FILTER_VALIDATE_BOOLEAN
    ];

    // Validar datos
    $user = filter_input_array(INPUT_POST, $validation_filters);

    // Crear mensajes de error
    $errors['email'] = $user['email'] ? '' : 'Por favor, ingresa un correo electrónico válido.';
    $errors['age'] = $user['age'] ? '' : 'La edad debe ser entre 18 y 100 años.';
    $errors['newsletter'] = $user['newsletter'] ? '' : 'Debes aceptar recibir boletines.';

    // Comprobar errores
    if (array_filter($errors)) {
        $message = 'Por favor, corrige los siguientes errores.';
    } else {
        $message = 'Registro exitoso. Gracias por registrarte.';
        // Sanitizar los datos
        $user['email'] = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
        $user['age'] = filter_var($user['age'], FILTER_SANITIZE_NUMBER_INT);
        // Aquí podrías procesar los datos, como almacenarlos en una base de datos
    }
}
?>

<?php include 'includes/header.php'; ?>

<!-- Mostrar mensaje al usuario -->
<p><?= htmlspecialchars($message) ?></p>

<!-- Formulario de registro -->
<form action="registro_evento_filtros.php" method="POST">
  <!-- Correo electrónico -->
  <label for="email">Correo electrónico:</label>
  <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
  <span class="error"><?= htmlspecialchars($errors['email']) ?></span><br><br>

  <!-- Edad -->
  <label for="age">Edad:</label>
  <input type="number" id="age" name="age" min="18" max="100" value="<?= htmlspecialchars($user['age']) ?>">
  <span class="error"><?= htmlspecialchars($errors['age']) ?></span><br><br>

  <!-- Newsletter -->
  <label>
    <input type="checkbox" name="newsletter" value="true" <?= $user['newsletter'] ? 'checked' : '' ?>>
    Deseo recibir boletines
  </label>
  <span class="error"><?= htmlspecialchars($errors['newsletter']) ?></span><br><br>

  <input type="submit" value="Registrar">
</form>

<?php include 'includes/footer.php'; ?>
