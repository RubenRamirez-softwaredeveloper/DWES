<?php
// Lista inicial de canciones
$listaCanciones = [
    "Blinding Lights - The Weeknd",
    "Estoy enfermo - Pignoise",
    "Levitating - Dua Lipa",
    "One more night - Maroon 5",
    "Feel Good Inc. - Gorillaz"
];

// Tareas

// 1. Agregar Canciones
// Agregar al inicio
array_unshift($listaCanciones, "Bohemian Rhapsody - Queen");
// Agregar al final
array_push($listaCanciones, "Smells Like Teen Spirit - Nirvana");

// 2. Eliminar Canciones
// Eliminar del inicio
$cancionEliminadaInicio = array_shift($listaCanciones);
// Eliminar del final
$cancionEliminadaFinal = array_pop($listaCanciones);

// 3. Buscar una Canción en la Lista
$buscarCancion = "Levitating - Dua Lipa";
$posicion = array_search($buscarCancion, $listaCanciones);

// 4. Verificar si una Canción Está en la Lista
$cancionExistente = "Feel Good Inc. - Gorillaz";
$estaEnLista = in_array($cancionExistente, $listaCanciones);

// 5. Contar el Número de Canciones
$totalCanciones = count($listaCanciones);

// 6. Seleccionar Canciones Aleatorias
$cancionesAleatorias = array_rand($listaCanciones, 2); // Selecciona 2 índices aleatorios

// 7. Mostrar la Lista de Reproducción
$listaComoCadena = implode(", ", $listaCanciones);

// 8. Dividir la Cadena en Canciones
$nuevaLista = explode(", ", $listaComoCadena);

// 9. Eliminar Duplicados
$listaSinDuplicados = array_unique($listaCanciones);

// 10. Fusionar Listas
$otraLista = ["Take On Me - A-Ha", "Billie Jean - Michael Jackson"];
$listaFusionada = array_merge($listaCanciones, $otraLista);
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

    <h2>Lista Original</h2>
    <ul>
        <?php foreach ($listaCanciones as $cancion): ?>
            <li><?= $cancion; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Canciones Eliminadas</h2>
    <p><b>Inicio:</b> <?= $cancionEliminadaInicio; ?></p>
    <p><b>Final:</b> <?= $cancionEliminadaFinal; ?></p>

    <h2>Resultado de Búsqueda</h2>
    <p><?= $buscarCancion; ?> está en la posición <?= $posicion !== false ? $posicion + 1 : "No encontrada"; ?>.</p>

    <h2>Verificar Canción</h2>
    <p><?= $cancionExistente; ?> <?= $estaEnLista ? "sí está" : "no está"; ?> en la lista.</p>

    <h2>Total de Canciones</h2>
    <p>La lista contiene <?= $totalCanciones; ?> canciones.</p>

    <h2>Canciones Aleatorias</h2>
    <ul>
        <?php foreach ($cancionesAleatorias as $index): ?>
            <li><?= $listaCanciones[$index]; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Lista de Reproducción Como Cadena</h2>
    <p><?= $listaComoCadena; ?></p>

    <h2>Lista Dividida Desde la Cadena</h2>
    <ul>
        <?php foreach ($nuevaLista as $cancion): ?>
            <li><?= $cancion; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Lista Sin Duplicados</h2>
    <ul>
        <?php foreach ($listaSinDuplicados as $cancion): ?>
            <li><?= $cancion; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Lista Fusionada</h2>
    <ul>
        <?php foreach ($listaFusionada as $cancion): ?>
            <li><?= $cancion; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
