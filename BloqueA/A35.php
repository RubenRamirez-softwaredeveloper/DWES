<?php
$products = [
    'Toffee' => 2.99,
    'Mints' => 1.99,
    'Fudge' => 3.49,
    'Lollipop' => 0.99,
    'Gum' => 1.49,
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    ...
</head>
<body>
    <h2>Price List</h2>
    <table>
        <tr>
            <th>Product</th>
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