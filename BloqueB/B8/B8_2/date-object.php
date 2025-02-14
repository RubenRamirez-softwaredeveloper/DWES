<?php
// Verificar si se ha enviado una fecha por el usuario
if (isset($_POST['fecha'])) {
    $fechaIngresada = $_POST['fecha'];

    // Convertir la fecha en un objeto DateTime
    $evento = date_create_from_format('d/m/Y H:i:s', $fechaIngresada);

    // Verificar si la conversión fue exitosa
    if (!$evento) {
        die('Error al procesar la fecha. Verifique el formato de entrada.');
    }

    // Obtener el timestamp UNIX
    $timestamp = $evento->getTimestamp();

    // Formatear la fecha en los distintos formatos requeridos
    $fechaISO = $evento->format('Y-m-d H:i:s');
    $fechaLegible = $evento->format('j') . ' de ' . $evento->format('F') . ' de ' . $evento->format('Y') . ', ' . $evento->format('Hi');
} else {
    $fechaISO = $timestamp = $fechaLegible = '';
}
?>

<?php include 'includes/header.php'; ?>

<form method="post">
    <label for="fecha">Ingrese la fecha (d/m/Y H:i:s):</label>
    <input type="text" id="fecha" name="fecha" required>
    <button type="submit">Enviar</button>
</form>

<?php if (!empty($fechaISO)): ?>
    <p><b>Evento programado:</b></p>
    <p><b>Formato ISO:</b> <?= $fechaISO ?></p>
    <p><b>Timestamp UNIX:</b> <?= $timestamp ?></p>
    <p><b>Formato legible:</b> <?= $fechaLegible ?></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
