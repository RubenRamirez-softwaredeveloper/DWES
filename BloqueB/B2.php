<?php
// Definir el contenido simulado de un artículo web
$articulo = "El desarrollo de software es clave en la industria moderna. Las tecnologías actuales ofrecen herramientas avanzadas para gestionar procesos, mejorar la productividad y fomentar la innovación. Aprender a programar es una habilidad esencial en el mundo de hoy.";

// Palabra objetivo para detección
$palabraObjetivo = "programar";

// Detectar la primera y última aparición de la palabra objetivo
$primeraAparicion = strpos($articulo, $palabraObjetivo);
$ultimaAparicion = strrpos($articulo, $palabraObjetivo);

// Palabras clave a comprobar
$palabrasClave = ["innovación", "tecnologías", "clave", "robots"]; 
$palabrasClaveEncontradas = [];
foreach ($palabrasClave as $palabra) {
    if (stripos($articulo, $palabra) !== false) {
        $palabrasClaveEncontradas[] = $palabra;
    }
}

// Extraer partes del texto basadas en subcadenas específicas
$inicioExtraccion = strpos($articulo, "tecnologías");
$finExtraccion = strpos($articulo, "productividad");
$parteExtraida = $inicioExtraccion !== false && $finExtraccion !== false
    ? substr($articulo, $inicioExtraccion, $finExtraccion - $inicioExtraccion)
    : "No se pudo extraer esa parte del texto.";

// Comprobar si el texto comienza o termina con ciertas palabras
$comienzaCon = str_starts_with($articulo, "El desarrollo") ? "Sí" : "No";
$terminaCon = str_ends_with($articulo, "hoy.") ? "Sí" : "No";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Artículo Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>Análisis del Artículo Web</h1>
    <p><b>Contenido del artículo:</b> <?= $articulo; ?></p>
    <h2>Detección de Subcadenas</h2>
    <p><b>Primera aparición de la palabra "<?= $palabraObjetivo; ?>":</b> 
        <?= $primeraAparicion !== false ? "Posición $primeraAparicion" : "No encontrada"; ?>
    </p>
    <p><b>Última aparición de la palabra "<?= $palabraObjetivo; ?>":</b> 
        <?= $ultimaAparicion !== false ? "Posición $ultimaAparicion" : "No encontrada"; ?>
    </p>
    <h2>Palabras clave encontradas</h2>
    <p>
        <?= !empty($palabrasClaveEncontradas) 
            ? implode(', ', $palabrasClaveEncontradas) 
            : "No se encontraron palabras clave."; ?>
    </p>
    <h2>Extracción de texto</h2>
    <p><b>Texto extraído entre "tecnologías" y "productividad":</b> <?= $parteExtraida; ?></p>
    <h2>Comprobación de inicio y fin del texto</h2>
    <p><b>¿Comienza con "El desarrollo"?:</b> <?= $comienzaCon; ?></p>
    <p><b>¿Termina con "hoy."?:</b> <?= $terminaCon; ?></p>
</body>
</html>
