<?php
$price = 2.99;
?>

<!DOCTYPE html>
<head>
    <title>for Loop</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiple packs</h2>
    <p>
        <?php
        for ($i = 1; $i <= 20; $i++){
            echo $i;
            echo ' pack cost $';
            echo $price * $i;
            echo '<br>';
        }
        ?>
    </p>
</body>
</html>