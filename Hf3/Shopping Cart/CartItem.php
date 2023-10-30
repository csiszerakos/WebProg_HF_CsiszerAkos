<?php

class CartItem
{
    private Product $product;
    private int $quantity;
    private static $availableQuantity = 100;

    public function __construct(Product $product,int $quantity){
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function increaseQuantity()
    {   $this->quantity++;

        if($this->quantity > self::$availableQuantity){
            $this->quantity = self::$availableQuantity;
        }
    }

    public function decreaseQuantity()
    {
        $this->quantity--;

        if ($this->quantity < 1) {
            $this->quantity = 1;
        }
    }
}