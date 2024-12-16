<?php
// Lista inicial de canciones con reproducciones
$canciones_con_reproducciones = [
    "Blinding Lights - The Weeknd" => 1500,
    "Estoy enfermo - Pignoise" => 1200,
    "Levitating - Dua Lipa" => 1800,
    "One more night - Maroon 5" => 1600,
    "Feel Good Inc. - Gorillaz" => 1700
];

// 1. Generar Reproducciones Aleatorias
foreach ($canciones_con_reproducciones as $cancion => $reproducciones) {
    $canciones_con_reproducciones[$cancion] = mt_rand(1000, 2000); // Genera reproducciones entre 1000 y 2000
}
$original = $canciones_con_reproducciones;

// 2. Ordenar la Lista por Nombre de Canción en Orden Ascendente
$canciones_por_nombre_asc = $canciones_con_reproducciones;
ksort($canciones_por_nombre_asc);

// 3. Ordenar la Lista por Nombre de Canción en Orden Descendente
$canciones_por_nombre_desc = $canciones_con_reproducciones;
krsort($canciones_por_nombre_desc);

// 4. Ordenar la Lista por Número de Reproducciones en Orden Ascendente
$canciones_por_reproducciones_asc = $canciones_con_reproducciones;
asort($canciones_por_reproducciones_asc);

// 5. Ordenar la Lista por Número de Reproducciones en Orden Descendente
$canciones_por_reproducciones_desc = $canciones_con_reproducciones;
arsort($canciones_por_reproducciones_desc);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Lista de Reproducción</title>
</head>
<body>
    <h1>Gestión de Lista de Reproducción</h1>

    <h2>Lista Original con Reproducciones Aleatorias</h2>
    <ul>
        <?php foreach ($original as $cancion => $reproducciones): ?>
            <li><b><?= $cancion; ?></b>: <?= $reproducciones; ?> reproducciones</li>
        <?php endforeach; ?>
    </ul>

    <h2>Ordenar por Nombre de Canción (Ascendente)</h2>
    <ul>
        <?php foreach ($canciones_por_nombre_asc as $cancion => $reproducciones): ?>
            <li><b><?= $cancion; ?></b>: <?= $reproducciones; ?> reproducciones</li>
        <?php endforeach; ?>
    </ul>

    <h2>Ordenar por Nombre de Canción (Descendente)</h2>
    <ul>
        <?php foreach ($canciones_por_nombre_desc as $cancion => $reproducciones): ?>
            <li><b><?= $cancion; ?></b>: <?= $reproducciones; ?> reproducciones</li>
        <?php endforeach; ?>
    </ul>

    <h2>Ordenar por Número de Reproducciones (Ascendente)</h2>
    <ul>
        <?php foreach ($canciones_por_reproducciones_asc as $cancion => $reproducciones): ?>
            <li><b><?= $cancion; ?></b>: <?= $reproducciones; ?> reproducciones</li>
        <?php endforeach; ?>
    </ul>

    <h2>Ordenar por Número de Reproducciones (Descendente)</h2>
    <ul>
        <?php foreach ($canciones_por_reproducciones_desc as $cancion => $reproducciones): ?>
            <li><b><?= $cancion; ?></b>: <?= $reproducciones; ?> reproducciones</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
