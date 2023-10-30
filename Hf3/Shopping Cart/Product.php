<?php


class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;


    //Konstruktor megírása
    public function __construct(int $id,string $title,float $price,int $availableQuantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    //getter metódusok megírása
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public  function getPrice(): float
    {
        return $this->price;
    }

    public function getAvailableQuality(): int
    {
        return $this->availableQuantity;
    }

    //setter metódusok

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setAvailableQuantity(int $availableQuantity): void
    {
        $this->availableQuantity = $availableQuantity;
    }

    /**
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        //TODO Implement method
        return $cart->addProduct($this,$quantity);}
    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */

    public function removeFromCart(Cart $cart): void
    {
        $newItems = [];

        foreach ($this->items as $item) {
            $shouldRemove = false;
            foreach ($cart->getItems() as $cartItem) {
                if ($item->isEqual($cartItem)) {
                    $shouldRemove = true;
                    break;
                }
            }
            if (!$shouldRemove) {
                $newItems[] = $item;
            }
        }

        $this->items = $newItems;
    }
}