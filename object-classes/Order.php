<?php

class Order {

  public $cart; // cart object that generated this order
  public $tot_price; // already discounted
  public $tot_weight;
  public $status = 'We are preparing your parcel';


  function __construct($_cart_obj)
  {
    $this->cart = $_cart_obj;
    $this->setTotalPrice();
    $this->setTotalWeight();
  }

  private function setTotalPrice() {
    $discount = $this->cart->client->getDiscount();
    $this->tot_price = $this->cart->tot_price * $discount;
    echo "<h2> DISCOUNT $discount OLD PRICE {$this->cart->tot_price}
    NEW PRICE {$this->tot_price}
    </h2>";
    
    if ($discount) echo "Your {$discount}% has been applied";
  }

  private function setTotalWeight() {
    foreach ($this->cart->items as $item_type) {
      foreach ($item_type as $item) {
        $this->tot_weight += $item->weight;
      }
    }
  }
}