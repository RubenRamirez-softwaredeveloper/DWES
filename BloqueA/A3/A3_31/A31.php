<?php
$counter = 1;
$packs = 10;
$price = 1.99;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>while Loop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for multiple packs</h2>
    <p>
        <?php
        while($counter < $packs) {
            echo $counter;
            echo ' pack(s) cost $';  
            echo $price * $counter;
            echo '<br>';
            $counter++;
        }
        ?>
    </p>
</body>
</html>