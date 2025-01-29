<?php
$message = '';                             // Initialize
$moved   = false;                          // Initialize
$uploadDir = 'C:\\xampp\\htdocs\\DWES\\BloqueB\\B7\\B7_2\\var\\www\\images\\';           // Directory to save images

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form sent
    if ($_FILES['image']['error'] === 0) {  // No errors during upload
        $temp = $_FILES['image']['tmp_name'];         // Temporary file path
        $fileName = basename($_FILES['image']['name']); // Original file name
        
        // Ensure the destination directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
        }

        // Construct the full path for the uploaded file
        $path = $uploadDir . $fileName;

        // Attempt to move the uploaded file to the final destination
        $moved = move_uploaded_file($temp, $path);
    }

    if ($moved === true) { // If the file was successfully moved
        // Convert the server path to a URL path for displaying the image
        $urlPath = 'C:\\xampp\\htdocs\\DWES\\BloqueB\\B7\\B7_2\\var\\www\\images\\' . $fileName;
        $message = '<b>Upload successful!</b><br>';
        $message .= '<img src="' . $urlPath . '" alt="Uploaded Image" style="max-width: 200px; margin-top: 10px;">';
    } else { // If there was an error moving the file
        $message = 'The file could not be saved. Please try again.';
    }
}
?>
<?php include 'includes/header.php' ?>

<!-- Display the result message -->
<div><?= $message ?></div>

<!-- Upload form -->
<form method="POST" action="index.php" enctype="multipart/form-data">
  <label for="image"><b>Upload your profile image:</b></label>
  <input type="file" name="image" accept="image/*" id="image" required><br>
  <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php' ?>
