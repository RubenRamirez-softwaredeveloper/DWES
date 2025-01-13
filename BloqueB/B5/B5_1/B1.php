<?php
// Simulación de una entrada de blog
$texto = "La gestion de contenidos es fundamental en un blog moderno. Es importante procesar el texto correctamente para garantizar una presentacion profesional.";

// Funciones básicas de análisis
$textoEnMayusculas = strtoupper($texto);
$textoCapitalizado = ucwords($texto);
$longitudTexto = strlen($texto);
$longitudTextoSinEspacios = strlen(str_replace(' ', '', $texto));
$cantidadPalabras = str_word_count($texto);

// Calcular la frecuencia de cada palabra
$palabras = str_word_count(strtolower($texto), 1); // Convertir a minúsculas para evitar duplicados en distintas capitalizaciones
$frecuenciaPalabras = array_count_values($palabras);

// Palabras clave a marcar
$palabrasClave = ['importante', 'procesar', 'contenidos'];
$textoConResaltado = $texto;

// Marcar palabras clave con HTML
foreach ($palabrasClave as $palabraClave) {
    $textoConResaltado = str_ireplace($palabraClave, "<mark>$palabraClave</mark>", $textoConResaltado);
}

// Generar un resumen del texto (primeras 50 palabras)
$resumenTexto = implode(' ', array_slice($palabras, 0, 50));

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Entrada de Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        mark {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Análisis de la Entrada de Blog</h1>
    <p><b>Texto original:</b> <?= $texto; ?></p>
    <p><b>Texto en mayúsculas:</b> <?= $textoEnMayusculas; ?></p>
    <p><b>Texto con palabras capitalizadas:</b> <?= $textoCapitalizado; ?></p>
    <p><b>Longitud del texto (caracteres):</b> <?= $longitudTexto; ?></p>
    <p><b>Longitud del texto (caracteres sin espacios):</b> <?= $longitudTextoSinEspacios; ?></p>
    <p><b>Cantidad de palabras:</b> <?= $cantidadPalabras; ?></p>
    <p><b>Texto con palabras clave resaltadas:</b> <?= $textoConResaltado; ?></p>
    <p><b>Resumen del texto (primeras 50 palabras):</b> <?= $resumenTexto; ?></p>
    <h2>Frecuencia de palabras</h2>
    <ul>
        <?php foreach ($frecuenciaPalabras as $palabra => $frecuencia): ?>
            <li><b><?= $palabra; ?>:</b> <?= $frecuencia; ?> vez/veces</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
