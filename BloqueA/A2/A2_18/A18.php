<?php
$day = 'Wednesday';

$offer = match($day){
    'Monday' => '20% off chocolates',
    'Saturday', 'Sunday' => '20% off mints',
    'Tuesday' => '20% off fudge',
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> match Expression </title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Offers on <?= $day; ?></h2>
    <p><?= $offer ?></p>
</body>
</html>