<?php 
$nutrition = [
    'fat' => 16 . "%",
    'sugar' => 51 . "%",
    'salt' => 6.3 . "%"
]
 
?>

<!DOCTYPE html>
<head>
    <title>Arrays asociativos</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2> Nutrition (per 100g) </h2>
    <p>Fat: <?php echo $nutrition['fat']; ?></p>
    <p>Sugar: <?php echo $nutrition['sugar']; ?></p>
    <p>Salt: <?php echo $nutrition['salt']; ?></p>
</body>
</html>