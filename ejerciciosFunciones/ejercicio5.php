<?php
/**
 * Genera una lista de DNIs aleatorios.
 *
 * @param int $cantidad Número de DNIs a generar.
 * @return array Lista de DNIs generados.
 */
function generarDNIs($cantidad) {
    // Array de letras válidas para el DNI
    $letrasDNI = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

    // Array para almacenar los DNIs generados
    $dnisGenerados = [];

    // Bucle para generar DNIs
    for ($i = 0; $i < $cantidad; $i++) {
        // Generar un número aleatorio de 8 dígitos (10000000 a 99999999)
        $numeroDNI = rand(10000000, 99999999);

        // Calcular la letra correspondiente usando el módulo 23
        $indiceLetra = $numeroDNI % 23;
        $letra = $letrasDNI[$indiceLetra];

        // Formar el DNI completo
        $dniCompleto = $numeroDNI . $letra;

        $dnisGenerados[] = $dniCompleto;
    }

    return $dnisGenerados;
}

// Llamar a la función para generar DNIs
$cantidad = 10; // Cambia este valor si quieres otra cantidad
$dnis = generarDNIs($cantidad);

// Mostrar los DNIs generados

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de DNIs generados</h1>
    <?php foreach ($dnis as $dni) { ?>
         
        <p><?= $dni ?></p>
    <?php } ?>
</body>
</html>
