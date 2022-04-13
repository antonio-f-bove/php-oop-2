<?php
abstract class Product {

  public $name;
  public $brand;
  public $price;
  public $species = []; // for what species of animal?

  public $description;

  function __construct($_name, $_brand, $_price) {
    $this->name = $_name;
    $this->brand = $_brand;
    $this->rice = $_price;
  }

  public function setDescription(string $_desc) {
    // TODO controlli?
    $this->description = $_desc;
  }
}

// ------------------------------------------------------

trait canExpire {
  public $exp_date;
  
  public function isExpired() {
    return date($this->exp_date) > date('m/y');
  }

  private function checkDateFormat($_date) {
    $timestamp = strtotime($_date);
    
    if (!$timestamp) throw new Exception('Invalid date input.');
    return date('m/y', $timestamp);
  }
}