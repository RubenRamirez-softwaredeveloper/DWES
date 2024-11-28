<?php
declare(strict_types = 1);

class Account {
    public    int     $number;
    public    string  $type;
    protected float   $balance;
    private   string  $owner;  // Propiedad privada para el propietario

    public function __construct(int $number, string $type, string $owner, float $balance = 0.00)
    {
        $this->number  = $number;
        $this->type    = $type;
        $this->owner   = $owner;  // Asignar el nombre del propietario
        $this->balance = $balance;
    }

    public function deposit(float $amount): float
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float
    {
        $this->balance -= $amount;
        return $this->balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    // Método público para obtener el nombre del propietario
    public function getOwner(): string
    {
        return $this->owner;
    }

    // Método público para actualizar el nombre del propietario
    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }
}

$account = new Account(20148896, 'Savings', 'John Doe', 80.00);
?>
<?php include 'includes/header2.php'; ?>
<h2><?= $account->type ?> Account</h2>
<p>Owner: <?= $account->getOwner() ?></p> <!-- Mostrar el nombre del propietario -->
<p>Previous balance: $<?= $account->getBalance() ?></p>
<p>New balance: $<?= $account->deposit(35.00) ?></p>
<?php include 'includes/footer2.php'; ?>
