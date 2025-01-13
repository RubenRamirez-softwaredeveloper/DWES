<?php
// Array de ciudades con direcciones
$cities = [
    'London' => '48 Store Street, WC1E 7BS',
    'Sydney' => '151 Oxford Street, 2021',
    'NYC' => '1242 7th Street, 10492',
    'Tokio' => 'Shinjuku, 160-0022',
];

// Obtener el valor de "city" desde la cadena de consulta
$city = $_GET['city'] ?? '';

// Verificar si la ciudad existe en el array
if ($city && array_key_exists($city, $cities)) {
    $address = $cities[$city];
} else {
    // Manejar el caso en que la clave no es válida o no se seleccionó ninguna ciudad
    $address = $city ? 'Ciudad no encontrada.' : 'Por favor selecciona una ciudad.';
}
?>
<?php include 'includes/header.php' ?>

<!-- Mostrar los enlaces de las ciudades -->
<?php foreach ($cities as $key => $value) { ?>
    <a href="index.php?city=<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($key) ?></a>
<?php } ?>

<!-- Mostrar el resultado -->
<h1><?= htmlspecialchars($city ?: 'Selecciona una ciudad') ?></h1>
<p><?= htmlspecialchars($address) ?></p>

<?php include 'includes/footer.php' ?>
