<?php
// Funcion para limpiar la entrada de datos
function sanear_entrada($data) {
    // Elimina espacios en blanco al principio y al final
    return htmlspecialchars(stripslashes(trim($data)));
}

// Funcion para validar la imagen
function validate_image($image) {
    $tipos_permitidos = ['image/jpeg', 'image/png'];
    $tamano_maximo = 5 * 1024 * 1024; // 5 MB de tamaño maximo

    if (!in_array($image['type'], $tipos_permitidos)) {
        return "ERROR: Formato de imagen no permitido.";
    }

    if ($image['size'] > $tamano_maximo) {
        return "ERROR: El tamaño de la imagen es mayor que el límite de 5 MB.";
    }

    return null;
}

// Funcion para redimensionar la imagen con gd
function resize_image_gd($file, $salida, $max_ancho, $max_altura) {
    // Uso la funcion list para obtener el ancho y alto de la imagen
    list($ancho, $altura, $tipo) = getimagesize($file);
    $ratio = $ancho / $altura;

    if ($ancho > $max_ancho || $altura > $max_altura) {
        // Si la imagen es mas ancha que alta o igual, se ajusta el ancho, sino se ajusta el alto.
        if ($ratio > 1) { 
            $nuevo_ancho = $max_ancho;
            $nuevo_alto = $max_ancho / $ratio;
        } else {
            $nuevo_alto = $max_altura;
            $nuevo_ancho = $max_altura * $ratio;
        }
    } else {
        $nuevo_ancho = $ancho;
        $nuevo_alto = $altura;
    }

    // Crear imagen con el tipo correcto JPEG o PNG
    $origen = ($tipo == IMAGETYPE_JPEG) ? imagecreatefromjpeg($file) : imagecreatefrompng($file);
    $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

    // Redimensionar la imagen
    imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $altura);

    // Guardar la imagen en el archivo de salida
    if ($tipo == IMAGETYPE_JPEG) {
        imagejpeg($destino, $salida);
    } else {
        imagepng($destino, $salida);
    }

    // Liberar memoria
    imagedestroy($origen);
    imagedestroy($destino);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre1 = sanear_entrada($_POST['nombre1']);
    $descripcion1 = sanear_entrada($_POST['descripcion1']);
    $precio1 = sanear_entrada($_POST['precio1']);
    $nombre2 = sanear_entrada($_POST['nombre2']);
    $descripcion2 = sanear_entrada($_POST['descripcion2']);
    $precio2 = sanear_entrada($_POST['precio2']);
    $nombre3 = sanear_entrada($_POST['nombre3']);
    $descripcion3 = sanear_entrada($_POST['descripcion3']);
    $precio3 = sanear_entrada($_POST['precio3']);
    $bebida = sanear_entrada($_POST['bebida']);

    $error = [];
    $images = ['plato1' => $_FILES['image1'], 'plato2' => $_FILES['image2'], 'postre' => $_FILES['image3']];
    $directorio_imagen = [];

    // Por cada imagen, validarla y subirla
    foreach ($images as $valor => $image) {
        $error = validate_image($image);
        if ($error) {
            $errors[] = $error;
        } else {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $imagenes = "imagenes/$valor.$ext";
            $miniaturas = "imagenes/miniaturas/$valor.$ext";

            // Subir la imagen y redimensionarla
            if (move_uploaded_file($image['tmp_name'], $imagenes)) {
                resize_image_gd($imagenes, $miniaturas, 300, 300);
                $directorio_imagen[$valor] = $miniaturas;
            } else {
                $errors[] = "Error al subir la imagen - $valor.";
            }
        }
    }

    // Mostrar los datos del menu
    if (empty($errors)) {
        echo "<h1>MENU RESTAURANTE</h1>";
        echo "<h2>Primer plato</h2>";
        echo "<p>Nombre: $nombre1</p>";
        echo "<p>Descripción: $descripcion1</p>";
        echo "<p>Precio: $precio1</p>";
        echo "<img src='{$directorio_imagen['plato1']}' width='300'><br>";

        echo "<h2>Segundo plato</h2>";
        echo "<p>Nombre: $nombre2</p>";
        echo "<p>Descripción: $descripcion2</p>";
        echo "<p>Precio: $precio2</p>";
        echo "<img src='{$directorio_imagen['plato2']}' width='300'><br>";

        echo "<h2>Postre</h2>";
        echo "<p>Nombre: $nombre3</p>";
        echo "<p>Descripción: $descripcion3</p>";
        echo "<p>Precio: $precio3</p>";
        echo "<img src='{$directorio_imagen['postre']}' width='300'><br>";

        echo "<p>Bebida incluida: $bebida</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

<form method="POST" action="examenFORM_RRC.php" enctype="multipart/form-data">
    <h1>Primer plato</h1>
    <label for="nombre1"><b>Nombre del plato:</b></label>
    <input type="text" name="nombre1" id="nombre1" required><br>
    <label for="descripcion1"><b>Descripción del plato:</b></label>
    <input type="text" name="descripcion1" id="descripcion1" required><br>
    <label for="precio1"><b>Precio del plato:</b></label>
    <input type="text" name="precio1" id="precio1" required><br>
    <label for="image1"><b>Subir imagen de producto:</b></label>
    <input type="file" name="image1" id="image1" required><br>

    <h1>Segundo plato</h1>
    <label for="nombre2"><b>Nombre del plato:</b></label>
    <input type="text" name="nombre2" id="nombre2" required><br>
    <label for="descripcion2"><b>Descripción del plato:</b></label>
    <input type="text" name="descripcion2" id="descripcion2" required><br>
    <label for="precio2"><b>Precio del plato:</b></label>
    <input type="text" name="precio2" id="precio2" required><br>
    <label for="image2"><b>Subir imagen de producto:</b></label>
    <input type="file" name="image2" id="image2" required><br>

    <h1>Postre</h1>
    <label for="nombre3"><b>Nombre del plato:</b></label>
    <input type="text" name="nombre3" id="nombre3" required><br>
    <label for="descripcion3"><b>Descripción del plato:</b></label>
    <input type="text" name="descripcion3" id="descripcion3" required><br>
    <label for="precio3"><b>Precio del plato:</b></label>
    <input type="text" name="precio3" id="precio3" required><br>
    <label for="image3"><b>Subir imagen de producto:</b></label>
    <input type="file" name="image3" id="image3" required><br>

    <label for="bebida"><b>Bebida incluida:</b></label>
    <select name="bebida" id="bebida" required>
        <option value="Sí">(Sí)</option>
        <option value="No">(No)</option>
    </select><br>

    <input type="submit" value="Enviar">
</form>