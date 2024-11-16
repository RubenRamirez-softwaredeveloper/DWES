<?php
function calculate_cost($cost, $quantity, $discount = 0, $tax = 0)
{
    $cost = $cost * $quantity;
    return $cost - $discount + $tax;
}
?>
<!DOCTYPE html>
<html> 
  <head>
    <title>Default Values for Parameters</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
  </head>
  <body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <table>
        <tr>
            <th>Chocolate</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Tax</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Dark chocolate</td>
            <td>$5</td>
            <td>10</td>
            <td>$5</td>
            <td>$0</td>
            <td>$<?= calculate_cost(5, 10, 5) ?></td>
        </tr>
        <tr>
            <td>Milk chocolate</td>
            <td>$3</td>
            <td>4</td>
            <td>$0</td>
            <td>$0</td>
            <td>$<?= calculate_cost(3, 4) ?></td>
        </tr>
        <tr>
            <td>White chocolate</td>
            <td>$4</td>
            <td>15</td>
            <td>$20</td>
            <td>$1</td>
            <td>$<?= calculate_cost(4, 15, 20 , 1) ?></td>
        </tr>
        <tr>
            <td>Caramel chocolate</td>
            <td>$5</td>
            <td>25</td>
            <td>$30</td>
            <td>$2</td>
            <td>$<?= calculate_cost(5, 25, 30 , 2)?></td>
        </tr>
        <tr>
            <td>Bizcocho chocolate</td>
            <td>$6</td>
            <td>24</td>
            <td>$29</td>
            <td>$1</td>
            <td>$<?= calculate_cost(6, 24, 29, 1)?></td>
        </tr>
    </table>
  </body>
</html>