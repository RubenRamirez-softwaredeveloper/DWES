<?php
$products = [
    'Chocolates' => 25,
    'Mints'      => 10,
    'Toffee'     => 5,
    'Fudge'      => 0,
];

function get_stock_message($stock)
{
    if ($stock == 10) {
        return 'Exactly 10 items in stock';
    }
    if ($stock > 0 && $stock < 10) {
        return 'Low stock';
    }
    if ($stock > 10) {
        return 'In stock';
    }
    return 'Out of stock';
}
?>

<!DOCTYPE html>
<html> 
  <head>
    <title>Stock Messages</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Stock Messages</h2>
    <table>
      <thead>
        <tr>
          <th>Product</th>
          <th>Stock</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product => $stock): ?>
          <tr>
            <td><?= $product ?></td>
            <td><?= $stock ?></td>
            <td><?= get_stock_message($stock) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
