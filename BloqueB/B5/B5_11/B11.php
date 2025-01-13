<?php
// Definir una constante para la red social
define('SOCIAL_NETWORK_NAME', 'MyMiniSocial');

// Lista inicial de intereses predefinidos
$intereses = [
    "Cine",
    "Lectura",
    "Tecnología",
    "Futbol",
    "Música",
];

// Función para agregar un nuevo interés simulado por el usuario
function agregar_interes($nuevo_interes, &$intereses) {
    array_push($intereses, $nuevo_interes); // Agregar al final
}

// Modificar un interés existente
function modificar_interes($indice, $nuevo_valor, &$intereses) {
    if (isset($intereses[$indice])) {
        $intereses[$indice] = $nuevo_valor; // Modificar el interés en el índice proporcionado
    }
}

// Numerar aleatoriamente los intereses
function numerar_intereses(&$intereses) {
    $numerados = [];
    foreach ($intereses as $interes) {
        $numerados[] = [ 'id' => rand(1000, 9999), 'interes' => $interes ];
    }
    usort($numerados, function($a, $b) {
        return $a['id'] - $b['id']; // Ordenar ascendentemente por el id
    });
    return $numerados;
}

// Mostrar los intereses en una cadena separada por comas
function mostrar_intereses($intereses) {
    return implode(', ', $intereses);
}

// Simular entrada de usuario (por ejemplo, agregando un interés)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_interes = $_POST['nuevo_interes'] ?? '';  // Recibir un nuevo interés del formulario
    if (!empty($nuevo_interes)) {
        agregar_interes($nuevo_interes, $intereses);
        // Redirigir a la página de agradecimiento
        header('Location: gracias.php');
        exit(); // Terminar el script después de la redirección
    }
}

// Numerar e Imprimir la lista de intereses numerada aleatoriamente
$intereses_numerados = numerar_intereses($intereses);
?>

<!-- Simulación de la página principal -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intereses de Usuario - <?= SOCIAL_NETWORK_NAME ?></title>
</head>
<body>
    <h1>Bienvenido a <?= SOCIAL_NETWORK_NAME ?> - Gestión de Intereses</h1>

    <h2>Lista de Intereses</h2>
    <p>Estos son los intereses actuales:</p>
    <ul>
        <?php foreach ($intereses_numerados as $item) { ?>
            <li><b><?= $item['id'] ?>:</b> <?= $item['interes'] ?></li>
        <?php } ?>
    </ul>

    <h2>Agregar un nuevo interés</h2>
    <form method="POST">
        <input type="text" name="nuevo_interes" placeholder="Tu nuevo interés" required>
        <button type="submit">Agregar</button>
    </form>

    <p><a href="gracias.php">Página de Agradecimiento</a></p>
</body>
</html>
