<?php
$name = 'Rubén';
$greeting = '';

if ($name !== ''){
    $greeting = 'Welcome back, ' . $name;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>...</head>
<body>
    <h1>The Candy Store</h1>
    <h2><?= $greeting ?></h2>
</body>
</html>