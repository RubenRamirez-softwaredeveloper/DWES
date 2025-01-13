<?php
// Array de productos con descripción
$products = [
    'PC Razer' => [
        'descripcion' => 'Potente PC Razer con refrigeración líquida',
        'precio' => '1500 €',
        'stock' => 'Disponible'
    ],
    'HP Laptop' => [
        'descripcion' => 'Perfecto para trabajo de oficina',
        'precio' => '900 €',
        'stock' => 'Disponible'
    ],
    'Mouse Razer DeathAdder' => [
        'descripcion' => 'Mouse Razer con batería de carga',
        'precio' => '75 €',
        'stock' => 'Agotado'
    ],
    'Teclado Mecánico Corsair' => [
        'descripcion' => 'Teclado retroiluminado con switches Cherry MX',
        'precio' => '120 €',
        'stock' => 'Disponible'
    ],
];

// Obtener el producto desde la consulta
$productKey = $_GET['product'] ?? null;

// Verificar si el producto existe
if ($productKey && isset($products[$productKey])) {
    $product = $products[$productKey];
} else {
    // Producto no encontrado
    $product = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
</head>
<body>
    <?php if ($product): ?>
        <h1><?= htmlspecialchars($productKey) ?></h1>
        <p><strong>Descripción:</strong> <?= htmlspecialchars($product['descripcion']) ?></p>
        <p><strong>Precio:</strong> <?= htmlspecialchars($product['precio']) ?></p>
        <p><strong>Disponibilidad:</strong> <?= htmlspecialchars($product['stock']) ?></p>
        <a href="index.php">Volver a la lista de productos</a>
    <?php else: ?>
        <h1>Producto no encontrado</h1>
        <p>El producto que buscas no existe. <a href="index.php">Volver a la lista de productos</a></p>
    <?php endif; ?>
</body>
</html>
