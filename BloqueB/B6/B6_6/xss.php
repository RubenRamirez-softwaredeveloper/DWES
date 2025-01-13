<?php
// Obtener el mensaje de la consulta
$message = $_GET['msg'] ?? 'Click the link above';

// Escapar el mensaje usando htmlspecialchars()
$escaped_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Escaping Example</title>
</head>
<body>
    <h1>Processed Message</h1>
    <p>Este es el mensaje procesado de manera segura:</p>
    <p><code><?= $escaped_message ?></code></p>
    <br>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
