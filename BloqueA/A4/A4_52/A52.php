
<?php

class Customer
{
    public string $forename;
    public string $surname;
    public string $email;
    public string $password;
}
class Account
{
    public int    $number;
    public string $type;
    public float  $balance;
}
$customer = new Customer();
$account  = new Account();
$customer->email  = 'ruben@ramirez.net';
$customer->forename = 'Ruben';
$customer->surname = 'Ramirez';
$account->balance = 1000.00;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header2.php'; ?>
    <p>Name: <?= $customer->forename?></p>
    <p>Email: <?= $customer->email ?></p>
    <p>Balance: $<?= $account->balance ?></p>
    <?php include 'includes/footer2.php'; ?>
</body>
</html>