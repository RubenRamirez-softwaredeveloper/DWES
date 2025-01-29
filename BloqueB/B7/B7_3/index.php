<?php
$moved         = false;                                      // Initialize
$message       = '';                                         // Initialize
$error         = '';                                         // Initialize

// Actualiza la ruta para que coincida con el acceso web y el sistema de archivos.
$upload_path   = 'C:\\xampp\\htdocs\\DWES\\BloqueB\\B7\\B7_3\\var\\www\\images\\'; 
$web_path      = '/DWES/BloqueB/B7/B7_3/var/www/images/';            // Acceso vía navegador

$max_size      = 5242880;                                    // Max file size (5MB)
$allowed_types = ['image/jpeg', 'image/png'];                // Allowed MIME types
$allowed_exts  = ['jpeg', 'jpg', 'png'];                     // Allowed file extensions

// Function to sanitize and create unique filenames
function create_filename($filename, $upload_path) {
    $basename   = pathinfo($filename, PATHINFO_FILENAME);    // Get base name
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);   // Get file extension
    $basename   = preg_replace('/[^A-Za-z0-9]/', '-', $basename); // Clean base name
    $filename   = $basename . '.' . $extension;              // Cleaned filename
    $counter    = 0;                                         // Initialize counter

    // Check for existing files and increment counter
    while (file_exists($upload_path . $filename)) {
        $counter++;
        $filename = $basename . '-' . $counter . '.' . $extension; // Append counter
    }
    return $filename;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {                 // If form submitted
    if ($_FILES['image']['error'] === 0) {                   // If no upload errors
        $temp_file = $_FILES['image']['tmp_name'];           // Temp file path
        $file_size = $_FILES['image']['size'];               // File size
        $type      = mime_content_type($temp_file);          // MIME type
        $ext       = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)); // File extension

        // Perform validations
        if ($file_size > $max_size) {
            $error .= 'File size exceeds 5MB. ';
        }
        if (!in_array($type, $allowed_types)) {
            $error .= 'Invalid file type. Only PNG and JPEG are allowed. ';
        }
        if (!in_array($ext, $allowed_exts)) {
            $error .= 'Invalid file extension. ';
        }

        // If no errors, move the uploaded file
        if (!$error) {
            // Ensure the destination directory exists
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, true); // Create directory
            }

            // Create unique file name
            $filename    = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $moved       = move_uploaded_file($temp_file, $destination);
        }
    } else {
        $error = 'File upload error. Please try again. ';
    }

    // Display messages
    if ($moved === true) {                                   // If successful
        $message = 'Upload successful:<br>';
        $message .= '<img src="' . $web_path . $filename . '" alt="Profile Image" style="max-width: 200px; margin-top: 10px;">';
    } else {                                                 // If errors
        $message = '<b>Error uploading file:</b> ' . $error;
    }
}
?>
<?php include 'includes/header.php' ?>

<!-- Display success or error messages -->
<div><?= $message ?></div>

<!-- Upload form -->
<form method="POST" action="index.php" enctype="multipart/form-data">
    <label for="image"><b>Upload Profile Image:</b></label>
    <input type="file" name="image" id="image" accept="image/png, image/jpeg" required><br>
    <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php' ?>
