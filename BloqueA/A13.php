<?php
$username = 'Rubén';
$greeting = 'Hola, ' . $username . '.';

$offer = [
    'producto' => 'cuadernos',
    'cantidad' => 3,
    'precio' => 6,
    'descuento' => 4,
];

$usual_price = $offer['cantidad'] * $offer['precio'];
$offer_price = $offer['cantidad'] * $offer['descuento'];
$saving = $usual_price - $offer_price;

// Nueva variable para IVA
$iva = 0.21; // 21% de IVA
$offer_price_with_iva = $offer_price + ($offer_price * $iva);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta de la Librería</title>
</head>
<body>
    <h1>Librería Ramírez</h1>
    <h2>Oferta de cuadernos</h2>
    <p><?= $greeting ?></p>
    <p class="sticker">Ahorra $<?= $saving ?></p>
    <p>Compra <?= $offer['cantidad'] ?> <?= $offer['producto'] ?> por $<?= $offer_price ?></p>
    <p>Precio con IVA: $<?= number_format($offer_price_with_iva, 2) ?></p>
    <p>(Precio habitual $<?= $usual_price ?>)</p>
</body>
</html>
