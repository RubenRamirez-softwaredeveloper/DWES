<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 20, $shipping = 0)
{
    $cost = $cost * $quantity;
    $tax  = $cost * ($tax / 100);
    return ($cost + $tax) - $discount;
}
?>
<!DOCTYPE html>
<html> 
  <head>
    <title>Default Values for Parameters</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <table>
        <tr>
            <th>Chocolate</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Tax</th>
            <th>Shipping</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Dark chocolate</td>
            <td>$5</td>
            <td>10</td>
            <td>$5</td>
            <td>$0</td>
            <td>$0</td>
            <td>$<?= calculate_cost(5, 10, 5) ?></td>
        </tr>
        <tr>
            <td>Milk chocolate</td>
            <td>$3</td>
            <td>4</td>
            <td>$2</td>
            <td>$1</td>
            <td>$0</td>
            <td>$<?= calculate_cost(3, 4, 2, 1) ?></td>
        </tr>
        <tr>
            <td>White chocolate</td>
            <td>$4</td>
            <td>15</td>
            <td>$20</td>
            <td>$0</td>
            <td>$0</td>
            <td>$<?= calculate_cost(4, 15, 20) ?></td>
        </tr>
        <tr>
            <td>Almendra chocolate</td>
            <td>$7</td>
            <td>20</td>
            <td>$0</td>
            <td>$0</td>
            <td>$5</td>
            <td>$<?= calculate_cost(7, 20, 0, 0, 5) ?></td>
        </tr>
    </table>
  </body>
</html>