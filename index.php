<?php

require_once __DIR__ . '/object-classes/User.php';
require_once __DIR__ . '/object-classes/products/Food.php';
require_once __DIR__ . '/object-classes/Cart.php';
require_once __DIR__ . '/object-classes/products/Pesticide.php';

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

$crocchi = new Food('CanCrocchi', 'Can', 19.99, 123, 'nov 12 2022', 1000);
$crocchi = new Food('CanCrocchi', 'Can', 19.99, 123, 'nov 12 2022', 1000);
$crocchette = new Food('miam', 'GATT', 99.99, 776, 'jan 2020', 10000);
$crocchi2 = new Food('CanCrocchi', 'Can', 19.99, 123, 'nov 12 2022', 1000);
$frontline = new Pesticide('Frontline', 'FRONT', 50, 554, 6, 'Mar', 'Sep');



var_dump($crocchette);

$cart = new Cart($user);
$cart->addToCart($crocchi);
$cart->addToCart($crocchi2);
$cart->addToCart($crocchette);

try {
  $cart->addToCart($frontline);
} catch (Exception $e) {
  echo "<h2>Could not add {$frontline->name} to cart, {$e->getMessage()}</h2>";
}

var_dump($cart);
var_dump($cart->items);

$user->register();
$order = $cart->makeIntoOrder();

var_dump($order);
var_dump($frontline->isAvailable());