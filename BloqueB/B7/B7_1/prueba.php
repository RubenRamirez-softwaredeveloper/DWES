<?php
$message = '';                                                            

if($_SERVER['REQUEST_METHOD'] == 'POST') {

}
?>

<div><?= $message ?></div>

<form method="POST" action="prueba.php" enctype="multipart/form-data">
  <label for="image"><b>Subir archivo:</b></label>
  <input type="file" name="image" accept="image/*" id="image" required><br>
  <input type="submit" value="Upload">
</form>