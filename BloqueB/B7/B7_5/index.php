<?php
$moved         = false;                                        // Estado de subida
$message       = '';                                           // Mensaje de estado
$error         = '';                                           // Mensaje de error
$upload_path   = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR; // Carpeta de imágenes originales
$thumb_path    = $upload_path . 'thumbs' . DIRECTORY_SEPARATOR; // Carpeta de miniaturas
$max_size      = 5 * 1024 * 1024;                              // Tamaño máximo 5MB
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];     // Tipos permitidos
$allowed_exts  = ['jpeg', 'jpg', 'png', 'gif'];                // Extensiones permitidas

// Función para crear una miniatura de 200x200 píxeles con Imagick
function create_thumbnail($source, $thumbpath)
{
    $image = new Imagick($source);
    $image->thumbnailImage(200, 200, true);
    $image->writeImage($thumbpath);
    return true;
    
}

// Función para generar nombres de archivo únicos
function create_filename($filename, $upload_path)
{
    $basename   = pathinfo($filename, PATHINFO_FILENAME);
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);
    $basename   = preg_replace('/[^A-z0-9]/', '-', $basename);
    $filename   = $basename . '.' . $extension;
    $i          = 0;

    while (file_exists($upload_path . $filename)) {
        $i++;
        $filename = $basename . '-' . $i . '.' . $extension;
    }
    return $filename;
}



// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!file_exists($upload_path)) mkdir($upload_path, 0777, true); // Crear carpeta si no existe
    if (!file_exists($thumb_path)) mkdir($thumb_path, 0777, true);   // Crear carpeta de miniaturas

    if ($_FILES['image']['error'] === 0) { // Si no hay errores en la subida
        $error  .= ($_FILES['image']['size'] <= $max_size) ? '' : 'Archivo demasiado grande. ';
        $type   = mime_content_type($_FILES['image']['tmp_name']);
        $error .= in_array($type, $allowed_types) ? '' : 'Tipo de archivo no permitido. ';
        $ext    = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $allowed_exts) ? '' : 'Extensión no válida. ';

        if (!$error) {
            $filename    = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $thumbfile   = $thumb_path . 'thumb_' . $filename;
            $moved       = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            $resized     = create_thumbnail($destination, $thumbfile);
        }
    } else {
        $error = 'Error al subir la imagen.';
    }

    if ($moved && $resized) {
        $message = '✅ Imagen subida correctamente.<br>';
        $message .= '<b>Vista previa:</b><br><img src="uploads/thumbs/thumb_' . $filename . '" width="200">';
    } else {
        $message = '❌ No se pudo subir el archivo. ' . $error;
    }
}
?>

<?php include 'includes/header.php' ?>
<?= $message ?>
<form method="POST" action="B7_5.php" enctype="multipart/form-data">
    <label for="image"><b>Subir imagen de producto:</b></label>
    <input type="file" name="image" id="image" required><br>
    <input type="submit" value="Subir">
</form>
<?php include 'includes/footer.php' ?>