<?php
// Lista de eventos disponibles
$eventos = ['Ceremonia de Apertura', 'Atletismo', 'Natación', 'Ciclismo', 'Ceremonia de Clausura'];
$selectedEventos = [];
$message = '';

// Manejo del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedEventos = $_POST['eventos'] ?? []; // Recuperar eventos seleccionados
    
    // Validación: al menos un evento debe estar seleccionado
    if (!empty($selectedEventos)) {
        $message = 'Gracias por inscribirte en los siguientes eventos: ' . htmlspecialchars(implode(', ', $selectedEventos));
    } else {
        $message = 'Por favor, selecciona al menos un evento.';
    }
}
?>

<?php include 'includes/header.php'; ?>

<!-- Mensaje de confirmación o error -->
<p><?= $message ?></p>

<!-- Formulario para seleccionar eventos -->
<form action="voluntarios.php" method="POST">
  <p>Selecciona los eventos en los que deseas participar:</p>
  <?php foreach ($eventos as $evento) { ?>
      <label>
          <input type="checkbox" name="eventos[]" 
                 value="<?= htmlspecialchars($evento) ?>"
                 <?= in_array($evento, $selectedEventos) ? 'checked' : '' ?>>
          <?= htmlspecialchars($evento) ?>
      </label>
      <br>
  <?php } ?>
  <br>
  <input type="submit" value="Guardar">
</form>

<?php include 'includes/footer.php'; ?>
