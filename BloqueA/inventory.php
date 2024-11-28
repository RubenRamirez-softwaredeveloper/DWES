<?php
declare(strict_types=1);

// Datos del inventario
$books = [
    'El Padrino' => ['price' => 15.00, 'stock' => 10],
    'El monje que vendió su ferrari' => ['price' => 20.00, 'stock' => 5],
    'Clean code' => ['price' => 10.00, 'stock' => 12],
    'El programador prágmatico' => ['price' => 25.00, 'stock' => 7],
];

// Tasa de impuesto que equivale al 12 %
$tax_rate = 12;

// Funciones
function get_total_stock(array $books): int
{
    $total_stock = 0;
    foreach ($books as $book) {
        $total_stock += $book['stock'];
    }
    return $total_stock;
}

function get_inventory_value(float $price, int $stock): float
{
    return $price * $stock;
}

function calculate_tax(float $total_value, float $tax_rate): float
{
    return $total_value * ($tax_rate / 100);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventarios - Librería</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>Gestión de Inventarios - Librería</h1>
    <h2>Detalles de Inventario</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Título del libro</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Valor total</th>
                <th>Impuesto a pagar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total_inventory_value = 0;
            foreach ($books as $title => $data) { 
                $book_value = get_inventory_value($data['price'], $data['stock']);
                $tax_due = calculate_tax($book_value, $tax_rate);
                $total_inventory_value += $book_value;
            ?>
            <tr>
                <td><?= $title ?></td>
                <td>$<?= number_format($data['price'], 2) ?></td>
                <td><?= $data['stock'] ?></td>
                <td>$<?= number_format($book_value, 2) ?></td>
                <td>$<?= number_format($tax_due, 2) ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Totales</h2>
    <p><strong>Total de libros en stock:</strong> <?= get_total_stock($books) ?></p>
    <p><strong>Valor total de inventario:</strong> $<?= number_format($total_inventory_value, 2) ?></p>
    <p><strong>Impuesto total a pagar:</strong> $<?= number_format(calculate_tax($total_inventory_value, $tax_rate), 2) ?></p>
</body>
</html>
