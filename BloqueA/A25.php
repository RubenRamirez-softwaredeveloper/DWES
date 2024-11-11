<?php 
$name = '';
$greeting = 'Hello';

if ($name !== '') {
    $greeting = 'Welcome back, ' . $name;
} 
?>

<!DOCTYPE html>
<head>
    ...
</head>
<body>
    <h1>The Candy Store</h1>
    <h2><?= $greeting ?></h2>
</body>
</html>