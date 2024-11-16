<?php
$name = 'Rubén';                                  // Nombre del socio
$greeting = 'Hello';                             // Saludo inicial
if ($name) {                                     // Si $name tiene un valor
    $greeting = 'Bienvenido de nuevo, ' . $name; // Saludo personalizado
}

$monthly_fee = 50;                               // Cuota mensual en dólares
for ($months = 1; $months <= 12; $months++) {
    $subtotal   = $monthly_fee * $months;                   // Subtotal para esa cantidad de meses
    $discount   = ($subtotal / 100) * ($months * 5);        // Descuento en función de los meses
    $totals[$months] = $subtotal - $discount;               // Precio total con descuento
}
?>

<?php require 'includes/club.php'; ?> 
  <p><?= $greeting ?></p>
  <h2>Descuentos en cuotas de membresía</h2>
  <table>
    <tr>
      <th>Meses</th>
      <th>Precio</th>
    </tr>
    <?php foreach ($totals as $months => $price) { ?>
    <tr>
      <td>
        <?= $months ?>
        mes<?= ($months === 1) ? '' : 'es'; ?>
      </td>
      <td>
        $<?= number_format($price, 2) ?>
      </td>
    </tr>
    <?php } ?>
  </table>
<?php include 'includes/footer.php'; ?>
