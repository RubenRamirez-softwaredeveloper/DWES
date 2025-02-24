<?php
session_start();
$logged_in = isset($_SESSION['user_id']); // Verifica si el usuario ha iniciado sesión

// Definir productos disponibles
$products = [
    1 => ['nombre' => 'Pinceles Profesionales', 'precio' => 10.00],
    2 => ['nombre' => 'Acrílicos Premium', 'precio' => 15.50],
    3 => ['nombre' => 'Lienzo de Algodón', 'precio' => 20.75],
    4 => ['nombre' => 'Kit de Dibujo', 'precio' => 30.00],
];

// Agregar producto al carrito
if (isset($_GET['add'])) {
    $id = (int)$_GET['add'];
    if (isset($products[$id])) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    }
    header('Location: cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Productos - Mountain Art Supplies</title>
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
        <h1>Nuestros Productos</h1>
        <ul>
            <?php foreach ($products as $id => $product): ?>
                <li>
                    <strong><?php echo htmlspecialchars($product['nombre']); ?></strong> - $
                    <?php echo number_format($product['precio'], 2); ?>
                    <a href="products.php?add=<?php echo $id;  ?>">Añadir al carrito</a>
                </li>
            <?php endforeach; ?>
        </ul>
      </section>
    </div>
  </body>
</html>
