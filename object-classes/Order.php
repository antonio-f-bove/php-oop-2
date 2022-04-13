<?php

require_once __DIR__ . '/Cart.php';

class Order extends Cart {
  public $tot_weight;
  public $delivery_address;
  public $status;
  
}