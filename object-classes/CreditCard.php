<?php

class CreditCard {
  public $cc_number;
  public $exp_date;
  
  function __construct($_cc_number, $_exp_date) {
    $this->cc_number = $_cc_number;
    $this->exp_date = $_exp_date; // assuming format 'mm YY'
  }


  public function isValid() {
    // TODO QUESTO CONTROLLO NON STA FUNZIONANDO
    return date('m Y', strtotime($this->exp_date)) < date('m Y');
  }
  
}