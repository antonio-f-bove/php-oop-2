<?php

class CreditCard {
  public $cc_number;
  // more credit card info

  function __construct($_cc_number) {
    $this->cc_number = $_cc_number;
  }

  // TODO add validation methods

}