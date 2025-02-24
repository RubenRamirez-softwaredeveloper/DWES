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

// Vaciar carrito
if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
    header('Location: cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Carrito de Compras - Mountain Art Supplies</title>
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
        <h1>Carrito de Compras</h1>
        <?php if (!empty($_SESSION['cart'])): ?>
            <table border="1">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
                <?php
                $totalCarrito = 0;
                foreach ($_SESSION['cart'] as $id => $cantidad):
                    if (!isset($products[$id])) continue;
                    $producto = $products[$id];
                    $totalProducto = $producto['precio'] * $cantidad;
                    $totalCarrito += $totalProducto;
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                        <td><?php echo $cantidad; ?></td>
                        <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                        <td>$<?php echo number_format($totalProducto, 2); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Total:</strong></td>
                    <td><strong>$<?php echo number_format($totalCarrito, 2); ?></strong></td>
                </tr>
            </table>
            <a href="checkout.php">Finalizar Compra</a>
            <a href="cart.php?clear=1">Vaciar Carrito</a>
        <?php else: ?>
            <p>El carrito está vacío.</p>
        <?php endif; ?>
      </section>
    </div>
  </body>
</html>
