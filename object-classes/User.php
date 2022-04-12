<?php

require_once __DIR__ . '/CreditCard.php';

class User {

  public $name;
  public $lastname;

  protected $payment_methods = [];

  function __construct($_name, $_lastname, $_cc = null) {
    $this->name = $_name;
    $this->lastname = $_lastname;

    try {
      $this->addPaymentMethod($_cc);
      // echo "Credit Card successfully added to Payment Methods.";
    } catch (Exception $e) {
      echo "There has been a problem: {$e->getMessage()}<br>";
    }
  }

  public function getFullName() {
    return "{$this->name} {$this->lastname}";
  }


  public function addPaymentMethod($_cred_card) {
    
    if (is_null($_cred_card)) throw new Exception('Credit Card not found.');
    if (!is_a($_cred_card, 'CreditCard')) throw new Exception(('Invalid Credit Card.'));

    $this->payment_methods[] = $_cred_card;
  }

}

$cc = new CreditCard(1234123456785678);
$user = new User('anto', 'bove', $cc);
