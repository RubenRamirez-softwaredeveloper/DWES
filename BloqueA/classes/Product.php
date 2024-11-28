<?php
class Product{
    public int $id;
    public string $name;
    public int $stock;
    public float $price;

    public function __construct(int $id, string $name, int $stock, float $price){
        $this->id = $id;
        $this->name = $name;
        $this->stock = $stock;
        $this->price = $price;
    }
    public function getStock(): int{
        return $this->stock;
    }
    public function setStock(int $stock): void{
        $this->stock = $stock;
    }
    public function getPrice(): float{
        return $this->price;
    }
    public function setPrice(float $price): void{
        $this->price = $price;
    }
    public function displayProduct(): string{
        return "Product: $this->name . <br>
               Price: $this->price . <br>
               Stock: $this->stock  . <br>"; 
    }
}
?>