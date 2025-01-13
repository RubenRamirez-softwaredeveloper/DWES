<?php
// Tipos de hamburguesas y precios
$menu = [
    "Hamburguesa Clásica" => 5.50,
    "Hamburguesa con Queso" => 6.75,
    "Hamburguesa BBQ" => 7.25,
    "Hamburguesa Vegetariana" => 6.00
];

// Generar cantidad aleatoria de ventas entre 50 y 100
$numeroVentas = mt_rand(50, 100);

// Inicializar variables
$ventas = [];
$totalDia = 0;

// Procesar cada venta
for ($i = 0; $i < $numeroVentas; $i++) {
    // Escoger aleatoriamente un tipo de hamburguesa
    $hamburguesa = array_rand($menu);
    // Generar una cantidad aleatoria entre 1 y 5
    $cantidad = mt_rand(1, 5);
    // Calcular el total de la venta
    $precioUnitario = $menu[$hamburguesa];
    $totalVenta = round($cantidad * $precioUnitario, 2);

    // Guardar la información de la venta
    $ventas[] = [
        "hamburguesa" => $hamburguesa,
        "cantidad" => $cantidad,
        "precioUnitario" => $precioUnitario,
        "total" => $totalVenta
    ];

    // Sumar al total del día
    $totalDia += $totalVenta;
}

// Estadísticas del día
$raizCuadrada = sqrt($totalDia);
$potenciaDos = pow($totalDia, 2);
$totalRedondeadoArriba = ceil($totalDia);
$totalRedondeadoAbajo = floor($totalDia);
$totalFormateado = number_format($totalDia, 2);

// Presentar resultados
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas de la Hamburguesería</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Resumen de Ventas del Día</h1>
    <p><strong>Total de ventas:</strong> <?= $numeroVentas ?></p>
    <p><strong>Ingresos totales del día:</strong> $<?= $totalFormateado ?></p>
    <p><strong>Raíz cuadrada del total:</strong> <?= round($raizCuadrada, 2) ?></p>
    <p><strong>Total elevado al cuadrado:</strong> <?= number_format($potenciaDos, 2) ?></p>
    <p><strong>Total redondeado hacia arriba:</strong> $<?= $totalRedondeadoArriba ?></p>
    <p><strong>Total redondeado hacia abajo:</strong> $<?= $totalRedondeadoAbajo ?></p>

    <h2>Detalles de las Ventas</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tipo de Hamburguesa</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total de Venta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $index => $venta): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $venta['hamburguesa'] ?></td>
                    <td><?= $venta['cantidad'] ?></td>
                    <td>$<?= number_format($venta['precioUnitario'], 2) ?></td>
                    <td>$<?= number_format($venta['total'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
