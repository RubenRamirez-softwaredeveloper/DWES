<?php
$tax_rate = 0.5; // Tipo impositivo
$global_discount = 0.1; // Descuento global (10%)

function calculate_running_total($price, $quantity) 
{
    global $tax_rate;         // Usa la variable global para el impuesto
    global $global_discount;  // Usa la variable global para el descuento
    static $running_total = 0; // Variable estática para el total acumulado

    // Calcular el total inicial (precio por cantidad)
    $total = $price * $quantity;

    // Aplicar el descuento global
    $total_discounted = $total - ($total * $global_discount);

    // Calcular el impuesto sobre el total con descuento
    $tax = $total_discounted * $tax_rate;

    // Actualizar el total acumulado
    $running_total = $running_total + $total_discounted + $tax;

    return $running_total;
}
?>
<!DOCTYPE html>
<html> 
  <head>
    <title>Global and Static Variables</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <table>
      <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Running total</th>
      </tr>
      <tr>
        <td>Mints:</td><td>$2</td><td>5</td> 
        <td>$<?= calculate_running_total(2, 5) ?></td>
      </tr>
      <tr>
        <td>Toffee:</td><td>$3</td><td>5</td> 
        <td>$<?= calculate_running_total(3, 5) ?></td>
      </tr>
      <tr>
        <td>Fudge:</td><td>$5</td><td>4</td> 
        <td>$<?= calculate_running_total(5, 4) ?></td>
      </tr>
      <tr>
        <td>Chicles:</td><td>$7</td><td>4</td> 
        <td>$<?= calculate_running_total(7, 4) ?></td>
      </tr>
    </table>
  </body>
</html>
