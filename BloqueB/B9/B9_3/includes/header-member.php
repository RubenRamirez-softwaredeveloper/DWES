<?php
session_start();
$logged_in = isset($_SESSION['user_id']); // Verifica si el usuario ha iniciado sesión
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Chapter 9 Examples</title>
    <link href="css/styles.css" rel="stylesheet">
  </head>
  <body>
    <div class="page">
      <header>
        <a href="index.php"><img src="img/logo.png" alt="Mountain Art Supplies" height="90"></a>
      </header>
      <nav>
        <a href="home.php">Home</a>
        <a href="products.php">Products</a>
        <a href="account.php">My Account</a>
        <?= $logged_in ? '<a href="logout.php">Log Out</a>' : '<a href="login.php">Log In</a>'; ?>
      </nav>
      <section>
        <h1>Bienvenido a Mountain Art Supplies</h1>
        <p>Descubre los mejores suministros de arte para tus proyectos creativos.</p>
      </section>
    </div>
  </body>
</html>
