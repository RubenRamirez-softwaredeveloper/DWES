<?php
$day = 'Wednesday';

$offer = match($day){
    'Monday' => '20% off chocolates',
    'Tuesday' => '15% off lollipops',
    'Saturday', 'Sunday' => '20% off mints',
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>match Expression</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Offers on <?= $day; ?></h2>
    <p><?= $offer ?></p>
</body>
</html>