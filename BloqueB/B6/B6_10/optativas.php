<?php
// Inicialización de variables
$selectedSubjects = [];
$message = '';
$subjects = ['Matemáticas', 'Física', 'Historia', 'Arte'];

// Manejo del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedSubjects = $_POST['subjects'] ?? []; // Recuperar asignaturas seleccionadas
    // Validar las asignaturas seleccionadas
    $valid = array_reduce(
        $selectedSubjects,
        fn($isValid, $subject) => $isValid && in_array($subject, $subjects),
        true
    );

    if ($valid && !empty($selectedSubjects)) {
        $message = 'Gracias por elegir: ' . htmlspecialchars(implode(', ', $selectedSubjects));
    } else {
        $message = 'ERROR: Por favor, selecciona al menos una asignatura válida.';
    }
}
?>

<?php include 'includes/header.php'; ?>

<!-- Mensaje al usuario -->
<p><?= $message ?></p>

<!-- Formulario para seleccionar asignatura -->
<form action="optativas.php" method="POST">
  <p>Selecciona una o más asignaturas:</p>
  <?php foreach ($subjects as $subject) { ?>
      <label>
          <input type="checkbox" name="subjects[]" 
                 value="<?= htmlspecialchars($subject) ?>"
                 <?= in_array($subject, $selectedSubjects) ? 'checked' : '' ?>>
          <?= htmlspecialchars($subject) ?>
      </label>
      <br>
  <?php } ?>
  <br>
  <input type="submit" value="Guardar">
</form>

<?php include 'includes/footer.php'; ?>


