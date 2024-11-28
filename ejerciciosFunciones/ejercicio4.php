<?php 
function generar_contraseña_aleatoria(int $longitud = 8): string {
    static $contraseña_contador = 0;
    $contraseña_contador++;

    $caracteres = 'ABCDEFGHIJKLMNOPQRSTVWXYZabcdefghijklmnopqrstvwxyz1234567890';
    $contrasenya = "";
    $indice_max = strlen($caracteres) - 1;

    for ($i = 0; $i < $longitud; $i++) {
        $random_index = rand(0, $indice_max);
        $contrasenya .= $caracteres[$random_index];
    }

    echo "Contraseña generadas: {\n";

    return $contrasenya;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= generar_contraseña_aleatoria() ?>
    <br>
    <?= generar_contraseña_aleatoria(10) ?>
    <br>
    <?= generar_contraseña_aleatoria(12) ?>
    <br>
    <?= generar_contraseña_aleatoria(15) ?> 
    <br>
    <?= generar_contraseña_aleatoria(17) ?> 
</body>
</html>