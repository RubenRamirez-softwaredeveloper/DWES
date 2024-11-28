<?php 
function calcular_Area($dimension1, $dimension2 = null, $figura = "cuadrado"){
    switch($figura){
        case "cuadrado":
            $area = $dimension1 * $dimension2;
            echo "El area del cuadrado es {$dimension1} * {$dimension2} = {$area}";
            break;
        case "triangulo":
            // base * altura / 2
            $area = $dimension1 * $dimension2 / 2;
            echo "El area de un triangulo es {$dimension1} * {$dimension2} dividido por 2 es igual a: {$area}";
            break;
    }
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
    <?php
    calcular_Area(5, 2, "triangulo");
    ?>
</body>
</html>