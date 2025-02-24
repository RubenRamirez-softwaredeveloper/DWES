<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['language'])) {
    $language = $_POST['language'];
    setcookie('language', $language, time() + (30 * 24 * 60 * 60)); // 30 días
    header("Location: language-preferences.php");
    exit;
}

$language = $_COOKIE['language'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias de idioma</title>
</head>
<body>
    <?php if ($language): ?>
        <h1>
            <?php if ($language === 'es'): ?>
                ¡Bienvenido!
            <?php else: ?>
                Welcome!
            <?php endif; ?>
        </h1>
        <a href="language-preferences.php?reset=true">Cambiar idioma</a>
    <?php else: ?>
        <form method="post" action="language-preferences.php">
            <label for="language">Selecciona tu idioma:</label>
            <select name="language" id="language">
                <option value="es">Español</option>
                <option value="en">English</option>
            </select>
            <button type="submit">Guardar</button>
        </form>
    <?php endif; ?>
</body>
</html>

<?php
if (isset($_GET['reset'])) {
    setcookie('language', '', time() - 3600); // Eliminar cookie
    header("Location: language-preferences.php");
    exit;
}
?>
