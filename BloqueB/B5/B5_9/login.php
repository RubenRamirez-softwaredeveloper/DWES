<?php
// Paso 1: Definir la variable de estado de inicio de sesión
$logged_in = false;

// Paso 2: Comprobar el estado del usuario
if (!$logged_in) {
    // Redirigir al usuario a la página de inicio de sesión
    header('Location: login.php');
    exit; // Terminar la ejecución para asegurarse de que no continúe el script
}

include 'includes/header.php';
?>

<h1>Login</h1>
<b>You are logged in!</b>
<p>Welcome to the protected page.</p>

<?php include 'includes/footer.php'; ?>
