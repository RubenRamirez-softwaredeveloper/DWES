<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaping Example</title>
</head>
<body>
    <h1>Escaping User Input</h1>
    <p>Haz clic en el enlace para probar cómo manejamos la entrada de usuario potencialmente peligrosa:</p>
    <a href="xss.php?msg=<script>alert('XSS')</script>">Enlace con código potencialmente malicioso</a>
    <br>
    <a href="xss.php?msg=Hello%20World!">Enlace con texto seguro</a>
</body>
</html>
