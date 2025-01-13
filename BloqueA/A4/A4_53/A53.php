<?php
declare(strict_types = 1);
require_once 'classes/Product.php'; // Llamar a la clase Product.php que esta en la carpeta classes/Product.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$product = new Product(1, 'Laptop Razer', 10, 899.99);
?>
<?php include 'includes/header2.php'; ?>
<h2>Productos</h2>
<table>
  <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Stock</th> 
  </tr>
  <tr>
    <td><?= $product->name ?></td> 
    <td><?= $product->price ?></td> 
    <td><?= $product->stock ?></td>
  </tr>
</table>
<?php include 'includes/footer2.php'; ?>
</body>
</html>
