<?php 
$name = 'Rubén';
$name = 'Francisco';
$price = 2;
?>

<!DOCTYPE html>
<head>
    <title>Variables</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2> Welcome  <?php echo $name; ?> </h2>
    <p> The cost of your candy is 
        <?php echo $price; ?>€ per  pack. </p>
</body>
</html>