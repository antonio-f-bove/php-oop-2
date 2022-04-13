<?php

require_once __DIR__ . '/object-classes/User.php';
require_once __DIR__ . '/object-classes/products/Food.php';
require_once __DIR__ . '/object-classes/Cart.php';

$cc = new CreditCard(1234123456785678, '07/22');
$cc_exp = new CreditCard(9876987654325432, '03/22');
$user = new User('anto', 'bove', $cc);

try {
  $user->addPaymentMethod($cc_exp);
} catch (Exception $e) {
  // TODO spostare questo codice internamente alla classe
  echo "There has been a problem while adding this payment method: {$e->getMessage()}<br>";
}
var_dump($user);

$crocchi = new Food('CanCrocchi', 'Can', 19.99, 'nov 12 2022', 1000);
$crocchi = new Food('CanCrocchi', 'Can', 19.99, 'nov 12 2022', 1000);
$crocchette = new Food('miam', 'GATT', 99.99, 'jan 2020', 10000);
$crocchi2 = new Food('CanCrocchi', 'Can', 19.99, 'nov 12 2022', 1000);

var_dump($crocchette);

$cart = new Cart($user->id);
$cart->addToCart($crocchi);
$cart->addToCart($crocchi2);
$cart->addToCart($crocchette);
var_dump($cart);