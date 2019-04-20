<?php


class Product{
    public $product_id;
    public $product_name;
    public $unit_price;
    public $quantity;
    public $product_price;

    function __construct($product_id, $unit_price, $quantity) {
        $this->$product_id = $product_id;
        $this->$unit_price = $unit_price;
        $this->$quantity = $quantity;
        $this->product_price = $unit_price * $quantity;
    }

    public function product_price(){
        $product_price = $unit_price * $quantity;
        return $product_price;
    }
}

?>