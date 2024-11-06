<?php
$packs = 10;
$price = 2.99;
?>

<!DOCTYPE html>
<head>
    <title>do while Loop</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiple packs</h2>
    <p>
        <?php
        do
        {
            echo $packs;
            echo ' pack cost $';
            echo $price * $packs;
            echo '<br>';
            $packs--;

        }while($packs > 0);
        ?>
    </p>
</body>
</html>