<?php
$stock = 0;
$ordered = 3;

if($stock > 0){
    $message = 'In stock';
}elseif($ordered > 0){
    $message = 'Coming soon';
}else{
    $message = 'Sold out';
}
?>

<!DOCTYPE html>
<head>
    ...
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolate</h2>
    <p><?= $message ?></p>
</body>
</html>