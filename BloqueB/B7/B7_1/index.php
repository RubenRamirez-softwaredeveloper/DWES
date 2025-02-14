<?php 
$message = '';                                                            // Initialize
$uploadDir = 'uploads/';                                                  // Directory to save files

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                               // If form sent
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) { // If no errors
        $fileTmpPath = $_FILES['image']['tmp_name'];                      // Temp file path
        $fileName = basename($_FILES['image']['name']);                   // Original file name
        $fileSize = $_FILES['image']['size'];                             // File size
        $fileType = mime_content_type($fileTmpPath);                      // File MIME type

        // Allowed file types
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];



        // Validate file type
        if (in_array($fileType, $allowedTypes)) {
            // Ensure directory exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
                
                // if directory not created

                

            }

            // Move file to upload directory
            $destination = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $destination)) {
                $message  = '<b>Upload successful!</b><br>';               // Success message
                $message .= '<b>File:</b> ' . $fileName . '<br>';          // File name
                $message .= '<b>Size:</b> ' . $fileSize . ' bytes<br>';    // File size
                $message .= '<b>Type:</b> ' . $fileType;                   // File type
            } else {
                $message = 'Error moving the file to the destination directory.';
            }
        } else {
            $message = 'Invalid file type. Only JPG, PNG, and GIF are allowed.';
        }
    } else {                                                               // Error in upload
        $message = 'The file could not be uploaded. Error: ' . $_FILES['image']['error'];

        
    }
}
?>
<?php include 'includes/header.php' ?>

<!-- Display upload messages -->
<div><?= $message ?></div>

<form method="POST" action="index.php" enctype="multipart/form-data">
  <label for="image"><b>Upload file:</b></label>
  <input type="file" name="image" accept="image/*" id="image" required><br>
  <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php' ?>
