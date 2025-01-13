<?php
declare(strict_types=1); // Activa el modo de tipos estrictos

$price    = '1'; // Cambiado a cadena
$quantity = 3;

// Función con tipos de unión para aceptar enteros y flotantes
function calculate_total(int|float $price, int $quantity): float
{
    return $price * $quantity;
}

$total = calculate_total((float)$price, $quantity); // Convertimos $price a float
?>
<!DOCTYPE html>
<html> 
  <head>
    <title>Type Declarations</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>Total $<?= number_format($total, 2) ?></p>
  </body>
</html>
