<?php
$upload_success = false;
$message = '';
$error = '';
$upload_directory = __DIR__ . '/files/';
$max_file_size = 10485760; // 10MB
$valid_mime_types = ['application/pdf', 'text/plain', 'application/msword'];
$valid_extensions = ['pdf', 'txt', 'doc'];

function generate_filename($original_name, $directory) {
    $name = pathinfo($original_name, PATHINFO_FILENAME);
    $ext = pathinfo($original_name, PATHINFO_EXTENSION);
    $name = preg_replace('/[^A-Za-z0-9]/', '_', $name);
    $new_name = $name . '.' . $ext;
    $counter = 1;
    while (file_exists($directory . $new_name)) {
        $new_name = $name . '_' . $counter . '.' . $ext;
        $counter++;
    }
    return $new_name;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES['document']['error'] === 0) {
        $file_size = $_FILES['document']['size'];
        $mime_type = mime_content_type($_FILES['document']['tmp_name']);
        $extension = strtolower(pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION));

        if ($file_size > $max_file_size) {
            $error .= 'File too large. ';
        }
        if (!in_array($mime_type, $valid_mime_types)) {
            $error .= 'Invalid file type. ';
        }
        if (!in_array($extension, $valid_extensions)) {
            $error .= 'Invalid file extension. ';
        }

        if (!$error) {
            $new_filename = generate_filename($_FILES['document']['name'], $upload_directory);
            $destination = $upload_directory . $new_filename;
            $upload_success = move_uploaded_file($_FILES['document']['tmp_name'], $destination);
        }
    } else {
        $error = 'Error uploading file.';
    }
    $message = $upload_success ? 'File uploaded successfully: ' . $new_filename : 'Upload failed: ' . $error;
}
?>

<?php include 'header.php'; ?>
<?= $message ?>
<form method="POST" enctype="multipart/form-data">
    <label for="document">Upload a document:</label>
    <input type="file" name="document" id="document"><br>
    <input type="submit" value="Upload">
</form>
<?php include 'footer.php'; ?>
