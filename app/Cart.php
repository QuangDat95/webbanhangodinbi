<?php
namespace App;
class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalamount = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalamount = $cart->totalamount;
        }
    }

    public function AddCart($product, $id)
    {
        $newProduct = ["amount" => 0, "price" => $product->price, "productInfo" => $product];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct["amount"]++;
        $newProduct["price"] = $newProduct["amount"] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalamount++;
    }

    public function deleteItemCart($id)
    {
        $this->totalamount -= $this->products[$id]["amount"];
        $this->totalPrice -= $this->products[$id]["price"];
        unset($this->products[$id]);
    }

    public function UpdateItemCart($id, $amount)
    {
        $this->totalamount -= $this->products[$id]["amount"];
        $this->totalPrice -= $this->products[$id]["price"];

        $this->products[$id]["amount"] = $amount;
        $this->products[$id]["price"] = $amount * $this->products[$id]["productInfo"]->price;

        $this->totalamount += $this->products[$id]["amount"];
        $this->totalPrice += $this->products[$id]["price"];
    }
}