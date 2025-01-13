<?php
// Configuración de validación
$settings['flags'] = FILTER_FLAG_IPV4 | FILTER_FLAG_NO_RES_RANGE | FILTER_FLAG_NO_PRIV_RANGE;
$settings['options']['default'] = '0.0.0.0';

// Validar la entrada del usuario
$ip_address = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP, $settings);

?>
<?php include 'includes/header.php'; ?>

<h1>Validación de Dirección IP</h1>
<p>Ingresa una dirección IPv4 válida. No se permiten rangos reservados (por ejemplo, redes privadas o loopback).</p>

<!-- Formulario -->
<form action="validate-ip.php" method="POST">
  Dirección IP: <input type="text" name="ip" value="<?= htmlspecialchars($ip_address) ?>">
  <input type="submit" value="Validar">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
  <h2>Resultado:</h2>
  <p>Dirección IP ingresada: <strong><?= htmlspecialchars($ip_address) ?></strong></p>
  <?php if ($ip_address === '0.0.0.0'): ?>
    <p><strong>Nota:</strong> La dirección IP ingresada no es válida o está en un rango reservado.</p>
  <?php else: ?>
    <p>La dirección IP es válida y no está en un rango reservado.</p>
  <?php endif; ?>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
