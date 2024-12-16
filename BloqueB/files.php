<?php
$path = 'img/nologo.png'; // Cambiado a "pattern.png" si existe el archivo si pongo otro que no exista pues no saldrá con el nologo.png
?>
<?php include 'includes/header.php'; ?>

<?php if (file_exists($path)) { ?>
  <b>Name:</b>      <?= pathinfo($path, PATHINFO_BASENAME) ?><br>
  <b>Size:</b>      <?= filesize($path) ?> bytes<br>
  <b>Mime type:</b> <?= mime_content_type($path) ?><br>
  <b>Folder:</b>    <?= pathinfo($path, PATHINFO_DIRNAME) ?><br>
<?php } else { ?>
  <p>There is no such file.</p>
<?php } ?>

<?php include 'includes/footer.php'; ?>
