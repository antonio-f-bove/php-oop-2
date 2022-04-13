<?php

/* 
Ho scelto di fare una classe astratta per includere
*/
abstract class Product {

  public $name;
  public $brand;
  public $price;
  public $species = []; // for what species of animal?
}
