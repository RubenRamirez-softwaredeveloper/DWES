<?php
$ajedrecistas = ["Bobby Fischer", "Garry Kasparov", "Anatoly Karpov", "Vishy Anand"];

function generar_lista_html(array $lista, string $tipo_lista){
    switch($tipo_lista){
        case "ul":
            echo "<ul>";
            foreach ($lista as $nombre_ajedrecista){
                echo "<li>{$nombre_ajedrecista}</li>";
            }
            break;
            echo "</ul>";
        case "ol":
            echo "<ol>";
            foreach ($lista as $nombre_ajedrecista){
                echo "<li>{$nombre_ajedrecista}</li>";
            }
            echo "</ol>";
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
    generar_lista_html($ajedrecistas, "ol");
    generar_lista_html($ajedrecistas, "ul");
    ?>
</body>
</html>