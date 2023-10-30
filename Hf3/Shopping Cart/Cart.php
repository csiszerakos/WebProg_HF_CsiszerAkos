<?php
require_once "Product.php";

class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this -> items;
    }


    public function setItems(array $items): self{
        $this->items = $items;
        return $this;
    }

    public function addProduct(Product $product, int $quantity): CartItem
    {
        foreach ($this->items as $item) {
            if ($item->getProduct() === $product) {
                $item->increaseQuantity($quantity);
                return $item;
            }
        }

        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;

        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        $newItems = [];

        foreach ($this->items as $item) {
            if ($item->getProduct() !== $product) {
                $newItems[] = $item;
            }
        }
        $this->items = $newItems;
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $totalQuantity = 0;

        foreach ($this->items as $item) {
            $totalQuantity += $item->getQuantity();
        }

        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {   $totalSum = 0;

        foreach ($this->items as $item){
            $totalSum += $item->getProduct()->getPrice()*$item->getQuantity();
        }
        return $totalSum;
    }
}