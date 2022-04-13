<?php

class CreditCard {
  public $cc_number;
  public $exp_date;
  
  function __construct($_cc_number, $_exp_date) {
    $this->cc_number = $this->checkNumFormat($_cc_number);
    $this->exp_date = $this->checkDateFormat($_exp_date);
  }

  public function isValid() {
    // TODO 
    /*
    non capisco perche var_dump restituisce true : false
    mentre echo $cc->isValid() (chiamato da index.php) 
    restituisce 1 se vero e niente se falso
    */
    return date($this->exp_date) > date('m/y');
  }

  private function checkNumFormat($_num) {
    // TODO
    // if check against regex
    return $_num;
  }

  private function checkDateFormat($_date) {
    if (!strtotime($_date)) throw new Exception('Invalid date.');
    return date('m/y', strtotime($_date));
  }
  
}