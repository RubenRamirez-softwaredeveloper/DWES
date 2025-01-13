<?php 
$name = 'Rubén';    
$favorites = ['chupa-chups', 'caramel', 'mint'];
?>

<!DOCTYPE html>
<head>
    <title>Echo Shorthand</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2> Welcome <?= $name ?></h2>
    <p> Your favorite type of candy is: 
        <?= $favorites[0] ?> </p>
    </p>
    
</body>
</html>