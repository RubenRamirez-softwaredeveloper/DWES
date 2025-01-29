<?php
$moved         = false;                                        // Initialize
$message       = '';                                           // Initialize
$error         = '';                                           // Initialize
$upload_path   = 'uploads/';                                   // Upload path
$thumb_path    = 'uploads/thumbs/';                            // Thumbnail path
$max_size      = 5242880;                                      // Max file size
$allowed_types = ['image/jpeg', 'image/png', 'image/gif',];    // Allowed file types
$allowed_exts  = ['jpeg', 'jpg', 'png', 'gif',];               // Allowed file extensions

// Ensure the 'uploads/' and 'uploads/thumbs/' directories exist
if (!file_exists($upload_path)) {
    mkdir($upload_path, 0777, true);
}
if (!file_exists($thumb_path)) {
    mkdir($thumb_path, 0777, true);
}

function create_filename($filename, $upload_path) {
    $basename   = pathinfo($filename, PATHINFO_FILENAME);      // Get basename
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);     // Get extension
    $basename   = preg_replace('/[^A-z0-9]/', '-', $basename); // Clean basename
    $i          = 0;                                           // Counter
    $filename   = $basename . '.' . $extension;                // Add extension to clean basename
    while (file_exists($upload_path . $filename)) {            // If file exists
        $i        = $i + 1;                                    // Update counter 
        $filename = $basename . $i . '.' . $extension;         // New filepath
    }
    return $filename;                                          // Return filename
}

function resize_image_gd($orig_path, $new_path, $max_width, $max_height) {
    $image_data  = getimagesize($orig_path);                   // Get image data
    $orig_width  = $image_data[0];                             // Image width
    $orig_height = $image_data[1];                             // Image height
    $media_type  = $image_data['mime'];                        // Media type
    $new_width   = $max_width;                                 // Maximum new width
    $new_height  = $max_height;                                // Maximum new height
    $orig_ratio  = $orig_width / $orig_height;                 // Original image ratio

    // Calculate new size
    if ($orig_width > $orig_height) {                          // If landscape
        $new_height = $new_width / $orig_ratio;                // Set height using ratio
    } else {                                                   // Otherwise
        $new_width  = $new_height * $orig_ratio;               // Set width using ratio
    }
    
    switch($media_type) {                                      // Check the media type
        case 'image/gif':  $orig = imagecreatefromgif($orig_path);  break;
        case 'image/jpeg': $orig = imagecreatefromjpeg($orig_path); break;
        case 'image/png':  $orig = imagecreatefrompng($orig_path);  break;
        default: return false;                                 // Unsupported type
    }

    $new = imagecreatetruecolor($new_width, $new_height);      // Create a blank image

    // Retain transparency for PNG and GIF
    if ($media_type === 'image/png' || $media_type === 'image/gif') {
        imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
        imagealphablending($new, false);
        imagesavealpha($new, true);
    }

    imagecopyresampled($new, $orig, 0, 0, 0, 0, $new_width, $new_height,
        $orig_width, $orig_height);                            // Copy orig to new image

    // Save image
    switch($media_type) {
        case 'image/gif':  return imagegif($new, $new_path);
        case 'image/jpeg': return imagejpeg($new, $new_path);
        case 'image/png':  return imagepng($new, $new_path);
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {                    // If form submitted
    $error = ($_FILES['image']['error'] === 1) ? 'too big ' : '';  // Check size error

    if ($_FILES['image']['error'] == 0) {                          // If no upload errors
        $error  .= ($_FILES['image']['size'] <= $max_size) ? '' : 'too big '; // Check size
        $type   = mime_content_type($_FILES['image']['tmp_name']);        
        $error .= in_array($type, $allowed_types) ? '' : 'wrong type ';
        $ext    = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $allowed_exts) ? '' : 'wrong file extension ';

        if (!$error) {
            $filename    = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $thumbpath   = $thumb_path . $filename;            // Save thumbnail to correct path
            $moved       = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            $resized     = resize_image_gd($destination, $thumbpath, 200, 200);
        }
    }
    if ($moved === true && $resized === true) {                // If it moved and resized
        $message = '<img src="' . $thumbpath . '">';           // Show thumbnail
    } else {                                                   // Otherwise
        $message = '<b>Could not upload file</b> ' . $error;   // Show errors
    }
}
?>
<?php include 'includes/header.php' ?>
<?= $message ?>
<form method="POST" action="index.php" enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
    <input type="file" name="image" accept="image/*" id="image"><br>
    <input type="submit" value="upload">
</form>
<?php include 'includes/footer.php' ?>
