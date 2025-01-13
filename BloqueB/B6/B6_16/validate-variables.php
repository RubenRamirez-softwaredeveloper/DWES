<?php
// Inicializar variables
$form = ['email' => '', 'age' => '', 'terms' => 0];
$data = [];
$errors = []; // Arreglo para mensajes de error

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si se envía el formulario
    // Definir los filtros para la validación
    $filters = [
        'email' => FILTER_VALIDATE_EMAIL, // Validar email
        'age' => [
            'filter' => FILTER_VALIDATE_INT, // Validar entero
            'options' => [
                'min_range' => 18, // Edad mínima
                'max_range' => 65  // Edad máxima
            ]
        ],
        'terms' => FILTER_VALIDATE_BOOLEAN // Validar checkbox como booleano
    ];

    // Capturar los valores enviados por el formulario
    $form = filter_input_array(INPUT_POST, [
        'email' => FILTER_DEFAULT,
        'age' => FILTER_DEFAULT,
        'terms' => FILTER_DEFAULT
    ]);

    // Aplicar los filtros de validación
    $data = filter_var_array($form, $filters);

    // Generar mensajes de error en caso de valores inválidos
    if (!$data['email']) {
        $errors['email'] = 'Por favor, ingresa un correo electrónico válido.';
    }
    if (!$data['age']) {
        $errors['age'] = 'La edad debe estar entre 18 y 65 años.';
    }
    if (!$data['terms']) {
        $errors['terms'] = 'Debes aceptar los términos y condiciones.';
    }

    // Mensaje de éxito si no hay errores
    if (empty($errors)) {
        $message = '¡Formulario enviado correctamente! Gracias por registrarte.';
    } else {
        $message = 'Por favor, corrige los errores indicados.';
    }
}
?>
<?php include 'includes/header.php'; ?>

<!-- Mostrar mensaje general -->
<h1>Validación de Formulario</h1>
<p><?= $message ?? '' ?></p>

<!-- Formulario HTML -->
<form action="validate-variables.php" method="POST">
  <!-- Campo Email -->
  Email: 
  <input type="text" name="email" value="<?= htmlspecialchars($form['email'] ?? '') ?>">
  <span class="error"><?= $errors['email'] ?? '' ?></span><br>

  <!-- Campo Edad -->
  Edad:  
  <input type="text" name="age" value="<?= htmlspecialchars($form['age'] ?? '') ?>">
  <span class="error"><?= $errors['age'] ?? '' ?></span><br>

  <!-- Checkbox de Términos -->
  <input type="checkbox" name="terms" value="1" <?= !empty($form['terms']) ? 'checked' : '' ?>>
  Acepto los términos y condiciones
  <span class="error"><?= $errors['terms'] ?? '' ?></span><br>

  <!-- Botón de envío -->
  <input type="submit" value="Guardar">
</form>

<!-- Depuración: Mostrar datos y resultados -->
<pre><?php var_dump($data); ?></pre>

<?php include 'includes/footer.php'; ?>
