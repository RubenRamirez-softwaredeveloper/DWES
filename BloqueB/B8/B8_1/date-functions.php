<?php
// Fecha actual del sistema
$hoy = time();
$fecha_actual = date('l, d M Y', $hoy);

// Definir fecha de inicio y finalización del evento
$empieza = strtotime('March 05 2025'); // Fecha futura
$acaba = mktime(0, 0, 0, 3, 20, 2025); // Fecha manualmente establecida

$fecha_inicio = date('l, d M Y', $empieza);
$fecha_finaliza = date('l, d M Y', $acaba);

// Calcular días restantes
$dias_hasta_empezar = ceil(($empieza - $hoy) / 86400);
$dias_hasta_finalizar = ceil(($acaba - $hoy) / 86400);
?>

<?php include 'includes/header.php'; ?>

<p><b>Fecha actual:</b> <?= $fecha_actual ?></p>
<p><b>El evento empieza:</b> <?= $fecha_inicio ?></p>
<p><b>El evento termina:</b> <?= $fecha_finaliza ?></p>

<?php
// Mensajes condicionales
echo "<p><b>Estado:</b> ";
if ($hoy < $empieza) {
    echo "El evento empieza en $dias_hasta_empezar dias.";
} elseif ($hoy >= $empieza && $hoy < $acaba) {
    echo "El evento todavia sigue en curso.";
} else {
    echo "El evento ha finalizado.";
}

echo "</p>";
?>

<?php include 'includes/footer.php'; ?>
