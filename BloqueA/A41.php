<?php
function write_logo()
{
    echo '<img src="img/logo.png" alt="Logo">';
}
function write_copyright_notice()
{
    $nombre = ' - The Candy Store';
    $year = date('Y');
    $message = '&copy; ' . $year . $nombre; // Como el ejercicio no indica que utilice una variable, pues se la concateno
    return $message;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Basic Functions</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <header>
      <h1><?php write_logo() ?> The Candy Store</h1>
    </header>
    <article>
      
      <h2>Welcome to the Candy Store</h2>
    </article>
    <footer>
      <?php write_logo() ?>
      <?php echo write_copyright_notice() ?>
      
    </footer>
  </body>
</html>