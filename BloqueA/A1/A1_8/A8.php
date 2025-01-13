<?php 
$items = 10;
$cost = 50;
$subtotal = $cost * $items;
$tax = ($subtotal / 100) * 20;
$total = $subtotal + $tax;

?>

<!DOCTYPE html>
<head>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2> Shopping Cart </h2>
    <p> Items: <?= $items?></p>
    <p> Cost per pack: $ <?= $items?></p>
    <p> Subtotal: $ <?= $subtotal?></p>
    <p> Tax: $ <?= $tax?></p>
    <p> Total: $ <?= $total?></p>
    
</body>
</html>