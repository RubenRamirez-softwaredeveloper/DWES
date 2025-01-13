<?php
// Array de productos
$products = [
    'PC Razer' => 'Potente PC Razer con refrigeración líquida',
    'HP Laptop' => 'Perfecto para trabajo de oficina',
    'Mouse Razer DeathAdder' => 'Mouse Razer con batería de carga',
    'Teclado Mecánico Corsair' => 'Teclado retroiluminado con switches Cherry MX',
];


?>
<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Productos</h1>
    <ul>
        <?php foreach ($products as $key => $value): ?>
            <!-- Enlace al archivo product.php con el producto como parámetro -->
            <li><a href="product.php?product=<?= urlencode($key) ?>"><?= htmlspecialchars($key) ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php include 'includes/footer.php' ?>
