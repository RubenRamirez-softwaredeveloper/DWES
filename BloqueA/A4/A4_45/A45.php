<?php
// Precios en USD de diferentes productos
$us_prices = [
    'Chocolates' => 4,
    'Mints'      => 2,
    'Toffee'     => 3,
    'Fudge'      => 5,
];

// Tipos de cambio
$rates = [
    'uk'  => 0.81,   // Libra Esterlina
    'eu'  => 0.93,   // Euro
    'jp'  => 113.21, // Yen Japonés
    'aud' => 1.30,   // Dólar Australiano
    'cad' => 1.25,   // Dólar Canadiense
];

// Función para calcular precios en varias monedas
function calculate_prices($usd, $exchange_rates)
{
    $prices = [];
    foreach ($exchange_rates as $currency => $rate) {
        $prices[$currency] = $usd * $rate;
    }
    return $prices;
}

// Función para formatear los precios con dos decimales y el símbolo de la moneda
function format_price($amount, $currency)
{
    $symbols = [
        'uk'  => '&pound;', // Libra Esterlina
        'eu'  => '&euro;',  // Euro
        'jp'  => '&yen;',   // Yen Japonés
        'aud' => 'AUD $',   // Dólar Australiano
        'cad' => 'CAD $',   // Dólar Canadiense
    ];
    return $symbols[$currency] . number_format($amount, 2);
}

// Calcular precios globales para todos los productos
$global_prices = [];
foreach ($us_prices as $product => $price) {
    $global_prices[$product] = calculate_prices($price, $rates);
}
?>

<!DOCTYPE html>
<html> 
  <head>
    <title>Prices in Multiple Currencies</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Product Prices in Different Currencies</h2>
    <table>
      <thead>
        <tr>
          <th>Product</th>
          <th>US ($)</th>
          <th>UK (&pound;)</th>
          <th>EU (&euro;)</th>
          <th>JP (&yen;)</th>
          <th>AUD (AUD $)</th>
          <th>CAD (CAD $)</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($global_prices as $product => $prices): ?>
          <tr>
            <td><?= $product ?></td>
            <td>$<?= number_format($us_prices[$product], 2) ?></td>
            <td><?= format_price($prices['uk'], 'uk') ?></td>
            <td><?= format_price($prices['eu'], 'eu') ?></td>
            <td><?= format_price($prices['jp'], 'jp') ?></td>
            <td><?= format_price($prices['aud'], 'aud') ?></td>
            <td><?= format_price($prices['cad'], 'cad') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
