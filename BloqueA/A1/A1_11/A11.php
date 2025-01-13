<?php
$item = 'Chocolate';
$stock = 5;
$wanted = 3;
$deliver = true;
$can_buy = (($wanted <= $stock) && ($deliver == true)); 
?>

<!DOCTYPE html>
<head>
    ...
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Shopping Cart</h2>
    <p>Item: <?= $item ?></p>
    <p>Stock: <?= $stock ?></p>
    <p>Wanted: <?= $wanted ?></p>
    <p>Can buy: <?= $can_buy ?></p>

    