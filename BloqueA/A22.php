<?php
$price = 1.99;
?>

<!DOCTYPE html>
<head>
    <title>for Loop - Higher Counter</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Large Orders</h2>
    <p>
        <?php
        for ($i = 10; $i <= 200; $i = $i + 10){
            echo $i;
            echo ' pack cost $';
            echo $price * $i;
            echo '<br>';
        }
        ?>
    </p>
</body>
</html>