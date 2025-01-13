<?php
$best_sellers = [
'Toffee', 'Mints', 'Fudge', 'Candy', 'Lollipops'
];
?>

<!DOCTYPE html>
<head>
    <title>foreach Loop - Just Accessing Values</title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Best Sellers</h2>
    <?php foreach ($best_sellers as $candy) { ?>
        <p><?= $candy ?></p>
    <?php } ?>
</body>
</html>