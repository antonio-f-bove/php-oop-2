<?php
abstract class Product {

  public $unique_id;
  public $prod_id;
  
  public $name;
  public $brand;
  public $type;
  public $price;

  public $species = []; // TODO for what species of animal?
  public $description;

  private static $count = 0;

  function __construct($_name, $_brand, $_price, $_prod_id)
  {
    $this->name = $_name;
    $this->brand = $_brand;
    $this->price = $_price;
    $this->prod_id = $_prod_id;
    
    // soluzione per generare unique_id incrementale ad ogni 
    // instanziazione di un prodotto
    self::$count++;
    $this->unique_id = self::$count;
  }

  public function isAvailable() {
    // check stock
    return true;
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

trait seasonal {
  public $period_of_use = [
    'start' => '',
    'end' => ''
  ];

  private function setPeriodOfUse($_start, $_end) {
    // TODO month format check ('M')
    $this->period_of_use['start'] = $_start;
    $this->period_of_use['end'] = $_end;
  }

  public function isAvailable() {
    // check stock

    // TODO fix availibility test
    // period related availability
    extract($this->period_of_use);
    if (date('M') <= $start || date('M') >= $end) return false;
    return true;    
  }
}

// TODO make new Product sub classes & traits