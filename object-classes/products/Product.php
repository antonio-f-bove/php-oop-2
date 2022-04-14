<?php
abstract class Product {

  public $unique_id;
  public $name;
  public $brand;
  public $type;
  public $price;

  public $species = []; // TODO for what species of animal?
  public $description;

  private static $count = 0;

  function __construct($_name, $_brand, $_price)
  {
    $this->name = $_name;
    $this->brand = $_brand;
    $this->price = $_price;
    
    // soluzione per generare unique_id incrementale ad ogni 
    // instanziazione di un prodotto
    self::$count++;
    $this->unique_id = self::$count;
  }

  public function setDescription(string $_desc) {
    // TODO controlli sulle descrizioni?
    $this->description = $_desc;
  }

  // TODO catalogo?
  // public static $catalog = [];
  // public static function addToCatalog() {
  // }

}

// ------------------------------------------------------

trait canExpire {
  public $exp_date;
  
  public function isExpired() {
    return date($this->exp_date) < date('m/y');
  }

  protected function checkDateFormat($_date) {
    $timestamp = strtotime($_date);

    if (!$timestamp) throw new Exception('Invalid date input.');
    return date('m/y', $timestamp);
  }
}

// TODO make new Product sub classes & traits