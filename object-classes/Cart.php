<?php

class Cart {
  public $client_id;
  public $items = []; // 'product->id' => quantity
  public $tot_price = 0;

  function __construct($_id)
  {
    $this->client_id = $_id;
  }

  public function addToCart($_prod) {
    if (!is_a($_prod, 'Product')) throw new Exception('Invalid product type.');

    if (!array_key_exists($_prod->id, $this->items)) {
      $this->items[$_prod->id] = 1;
    } else {
      $this->items[$_prod->id]++;
    }
    $this->tot_price += $_prod->price;
  }
}