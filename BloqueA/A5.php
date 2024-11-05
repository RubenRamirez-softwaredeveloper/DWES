<?php 
$nutrition = [
    'fat' => 36 . "%",
    'sugar' => 51 . "%",
    'salt' => 0.25 . "%",
    'fiber' => 2.1 . "%",
    'protein' => 7.3 . "%"
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
    <p>Fiber: <?php echo $nutrition['fiber']; ?></p>
    <p>Protein: <?php echo $nutrition['protein']; ?></p>
</body>
</html>