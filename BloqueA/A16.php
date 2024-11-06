<?php
$stock = 0;
$ordered = 3;

if ($stock > 0){
    $message = 'In stock';
} elseif ($ordered > 0){
    $message = 'Coming soon';
} else {
    $message = 'sold out';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> ... </title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolate</h2>
    <p><?= $message ?></p>
</body>
</html>