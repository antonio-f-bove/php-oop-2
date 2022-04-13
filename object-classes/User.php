<?php

require_once __DIR__ . '/CreditCard.php';

class User {

  public $name;
  public $lastname;

  protected $payment_methods = [];
  protected $discount = 0;
  protected $isRegistered = false;

  function __construct($_name, $_lastname, $_cc = null) {
    $this->name = $_name;
    $this->lastname = $_lastname;
    $this->setDiscount();

    try {
      $this->addPaymentMethod($_cc);
      // echo "Credit Card successfully added to Payment Methods.";
    } catch (Exception $e) {
      echo "There has been a problem while adding this payment method: {$e->getMessage()}<br>";
    }
  }

  public function getFullName() {
    return "{$this->name} {$this->lastname}";
  }


  public function addPaymentMethod($_cred_card) {
    
    if (is_null($_cred_card)) throw new Exception('Credit Card not found (is NULL).');
    if (!is_a($_cred_card, 'CreditCard')) throw new Exception(('Invalid Credit Card type.'));
    if(!$_cred_card->isValid()) throw new Exception('Credit card expired');

    $this->payment_methods[] = $_cred_card;
  }

  public function register() {
    // user can only register if a payment method has been confirmed
    if (!$this->payment_methods) throw new Exception('You need a payment method to be able to register.');

    $this->isRegistered = true;
    $this->setDiscount();
  }

  protected function setDiscount() {
    if ($this->isRegistered) $this->discount = 20;
  }

}
