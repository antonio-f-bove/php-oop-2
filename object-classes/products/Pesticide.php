<?php 

class Pesticide extends Product {
  use medical;

  public $num_of_doses;
  public $period_of_use = [
    'start' => '',
    'end' => ''
  ];

  function __construct($_name, $_brand, $_price, $_prod_id, $_num_of_doses, $_use_start, $_use_end)
  {
    parent::__construct($_name, $_brand, $_price, $_prod_id);

    $this->num_of_doses = $_num_of_doses;
    $this->setPeriodOfUse($_use_start, $_use_end);
    $this->type = lcfirst(__CLASS__);
  }

  private function setPeriodOfUse($_start, $_end) {
    // TODO month format check ('M')
    $this->period_of_use['start'] = $_start;
    $this->period_of_use['end'] = $_end;
  }

  public function checkAvailability() {
    extract($this->period_of_use);

    if (date('M') < $start || date('M') > $end) return "Sorry, not available until $start";

    return 'available';    
  }
}