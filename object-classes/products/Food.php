<?php

require_once __DIR__ . '/Product.php';

class Food extends Product {

  use canExpire;

  public $weight;

  function __construct($_name, $_brand, $_price, $_exp_date, $_weight)  {
    parent::__construct($_name, $_brand, $_price);
    
    $this->exp_date = $this->checkDateFormat($_exp_date);
    $this->weight = $_weight;
    $this->type = lcfirst(__CLASS__);
  }
}