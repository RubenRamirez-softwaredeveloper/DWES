<?php
session_start();
include 'includes/header-member.php';

$mensaje = "";

// Verificar si el carrito no está vacío
if (empty($_SESSION['cart'])) {
    $mensaje = "Tu carrito está vacío. Por favor, agrega productos antes de proceder.";
} else if (isset($_POST['checkout'])) {
    unset($_SESSION['cart']);
    $mensaje = "¡Compra realizada con éxito! Gracias por su compra.";
}
?>

<h1>Finalizar Compra</h1>

<?php if (!empty($mensaje)): ?>
    <p><?php echo htmlspecialchars($mensaje); ?></p>
<?php else: ?>
    <p>¿Está seguro de que desea finalizar su compra?</p>
    <h2>Artículos en tu carrito:</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?php echo htmlspecialchars($item['nombre']); ?> - <?php echo htmlspecialchars($item['precio']); ?> €</li>
        <?php endforeach; ?>
    </ul>
    <form method="post">
        <button type="submit" name="checkout">Confirmar Compra</button>
    </form>
<?php endif; ?>

<a href="products.php">Seguir Comprando</a>
<a href="cart.php">Volver al Carrito</a>

<?php include 'includes/footer.php'; ?>
