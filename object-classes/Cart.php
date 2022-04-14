<?php

require_once __DIR__ . '/Order.php';

class Cart {
  public $client;
  public $items = []; // '$prod->prod_id' -> [prod1, prod2...] per raggruppare i prodotti identici
  public $tot_price = 0;

  function __construct($_user)
  {
    $this->client = $_user;
  }

  public function addToCart($_prod) {
    if (!is_a($_prod, 'Product')) throw new Exception('Invalid product type.');

    $this->items[$_prod->prod_id][] = $_prod;
    $this->tot_price += $_prod->price;
  }

  public function makeIntoOrder() {
    if (!$this->tot_price) throw new Exception('Empty cart');

    return new Order($this);
  }
}