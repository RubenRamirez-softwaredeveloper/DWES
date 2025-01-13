<?php
$form = [
    'email' => '',
    'age' => '',
    'url' => '',
    'terms' => ''
]; // Inicializa los datos del formulario

$errors = []; // Inicializa los errores

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si se envió el formulario
    // Filtros para validar cada campo
    $filters = [
        'email' => FILTER_VALIDATE_EMAIL,
        'age' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 18, 'max_range' => 65]
        ],
        'url' => FILTER_VALIDATE_URL,
        'terms' => FILTER_VALIDATE_BOOLEAN
    ];

    // Valida los datos de entrada
    $form = filter_input_array(INPUT_POST, $filters);

    // Comprueba los errores de validación
    if (!$form['email']) {
        $errors['email'] = 'Por favor, introduce un correo electrónico válido.';
    }
    if (!$form['age']) {
        $errors['age'] = 'La edad debe estar entre 18 y 65 años.';
    }
    if (!$form['url']) {
        $errors['url'] = 'Por favor, introduce una URL válida.';
    }
    if (!$form['terms']) {
        $errors['terms'] = 'Debes aceptar los términos y condiciones.';
    }

    if (empty($errors)) {
        $message = 'Formulario enviado correctamente.';
    } else {
        $message = 'Por favor corrige los errores.';
    }
}
?>

<?php include 'includes/header.php'; ?>

<h1>Formulario de Registro</h1>
<p><?= $message ?? '' ?></p>

<form action="validate-multiple-inputs.php" method="POST">
  Email: <input type="text" name="email" value="<?= htmlspecialchars($form['email'] ?? '') ?>">
  <span class="error"><?= $errors['email'] ?? '' ?></span><br>

  Edad: <input type="text" name="age" value="<?= htmlspecialchars($form['age'] ?? '') ?>">
  <span class="error"><?= $errors['age'] ?? '' ?></span><br>

  URL del sitio web: <input type="text" name="url" value="<?= htmlspecialchars($form['url'] ?? '') ?>">
  <span class="error"><?= $errors['url'] ?? '' ?></span><br>

  <input type="checkbox" name="terms" value="1" <?= !empty($form['terms']) ? 'checked' : '' ?>>
  Acepto los términos y condiciones
  <span class="error"><?= $errors['terms'] ?? '' ?></span><br>

  <input type="submit" value="Enviar">
</form>

<pre><?php var_dump($form); ?></pre>

<?php include 'includes/footer.php'; ?>
