<?php
// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = htmlspecialchars($_POST["name"]);
    setcookie("username", $name, 0); // La cookie se eliminará al cerrar el navegador
    header("Location: welcome.php"); // Redirigir para reflejar la cookie
    exit();
}

// Verificar si la cookie existe
$name = $_COOKIE["username"] ?? null;
?>

<?php include 'includes/header.php'; ?>

<h1>Welcome</h1>

<?php if ($name): ?>
    <p>Bienvenido de nuevo, <?= htmlspecialchars($name) ?>.</p>
    <p><a href="welcome.php?logout=1">Cerrar sesión</a></p>
<?php else: ?>
    <form method="post" action="welcome.php">
        <label for="name">Introduce tu nombre:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Guardar</button>
    </form>
<?php endif; ?>

<?php
// Opción para borrar la cookie y cerrar sesión
if (isset($_GET['logout'])) {
    setcookie("username", "", time() - 3600);
    header("Location: welcome.php");
    exit();
}
?>

<?php include 'includes/footer.php'; ?>
