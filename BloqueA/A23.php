<?php
$products = [
    'Toffee' => 2.99,
    'Mints' => 1.99,
    'Fudge' => 3.49,
    'Candy' => 2.49,
    'Lollipops' => 0.99
];

?>

<!DOCTYPE html>
<head>
    <title>for Loop - Higher Counter</title>
</head>
<body>
    <h2>Prices List</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>
        <?php foreach ($products as $item => $price) { ?>
            <tr>
                <td><?= $item; ?></td>
                <td><?= $price; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>