<?php 
require_once('drink.php');

class Alcohol extends Drink {
  private $alcohol;
  
  public function __construct($name, $price, $image, $type, $alcohol) {
    parent::__construct($name, $price, $image, $type);
    $this->alcohol = $alcohol;
  }
  
  public function getAlcohol() {
    return $this->alcohol;
  }
  
  public function setAlcohol($alcohol) {
    $this->alcohol = $alcohol;
  }
  
}

?>