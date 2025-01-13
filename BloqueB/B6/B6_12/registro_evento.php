<?php
declare(strict_types=1);
require 'includes/validate.php'; // Archivo con las funciones de validación

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
    // Recopilar datos del formulario
    $user['email']      = $_POST['email'] ?? '';
    $user['age']        = $_POST['age'] ?? '';
    $user['newsletter'] = isset($_POST['newsletter']) ? true : false;

    // Validar los campos
    $errors['email'] = is_email($user['email']) 
        ? '' 
        : 'Por favor, ingresa un correo electrónico válido.';
    
    $errors['age'] = is_number((int)$user['age'], 18, 100) 
        ? '' 
        : 'Debes tener entre 18 y 100 años para registrarte.';

    $errors['newsletter'] = $user['newsletter'] 
        ? '' 
        : 'Debes aceptar recibir nuestro boletín para registrarte.';

    // Verificar si hay errores
    if (array_filter($errors)) {
        $message = 'Por favor, corrige los siguientes errores.';
    } else {
        $message = 'Registro exitoso. Gracias por registrarte en el evento.';
        // Aquí puedes procesar los datos, como guardarlos en una base de datos
    }
}
?>

<?php include 'includes/header.php'; ?>

<!-- Mostrar mensaje al usuario -->
<p><?= $message ?></p>

<!-- Formulario de registro -->
<form action="registro_evento.php" method="POST">
  <!-- Correo electrónico -->
  <label for="email">Correo electrónico:</label>
  <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
  <span class="error"><?= $errors['email'] ?></span><br><br>

  <!-- Edad -->
  <label for="age">Edad:</label>
  <input type="number" id="age" name="age" min="18" max="100" value="<?= htmlspecialchars($user['age']) ?>">
  <span class="error"><?= $errors['age'] ?></span><br><br>

  <!-- Newsletter -->
  <label>
    <input type="checkbox" name="newsletter" value="true" <?= $user['newsletter'] ? 'checked' : '' ?>>
    Quiero recibir boletines
  </label>
  <span class="error"><?= $errors['newsletter'] ?></span><br><br>

  <input type="submit" value="Registrar">
</form>

<?php include 'includes/footer.php'; ?>
