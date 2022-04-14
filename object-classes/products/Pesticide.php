<?php 

class Pesticide extends Product {
  use seasonal;

  public $num_of_doses;
  

  function __construct($_name, $_brand, $_price, $_prod_id, $_num_of_doses, $_use_start, $_use_end)
  {
    parent::__construct($_name, $_brand, $_price, $_prod_id);

    $this->num_of_doses = $_num_of_doses;
    $this->setPeriodOfUse($_use_start, $_use_end);
    $this->type = lcfirst(__CLASS__);
  }
}