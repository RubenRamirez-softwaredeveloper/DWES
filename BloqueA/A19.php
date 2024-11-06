<?php
$counter = 1;
$packs = 10;
$price = 1.99;
?>

<!DOCTYPE html>
<head>
    <title>while Loop</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiple packs</h2>
    <p>
        <?php
        while ($counter < $packs){
            echo $counter;
            echo ' pack cost $';
            echo $price * $counter;
            echo '<br>';
            $counter++;
        }
        ?>
    </p>
</body>
</html>