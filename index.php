<?php

require_once __DIR__ . '/object-classes/User.php';

$cc = new CreditCard(1234123456785678, '07/22');
$cc_exp = new CreditCard(9876987654325432, '03/22');
$user = new User('anto', 'bove', $cc);

echo $cc->isValid() . '<br>';
echo $cc_exp->isValid() . '<br>';

try {
  $user->addPaymentMethod($cc_exp);
} catch (Exception $e) {
  echo "There has been a problem while adding this payment method: {$e->getMessage()}<br>";
}
var_dump($user);

echo "<br><br>--------{$cc_exp->exp_date}<br>";