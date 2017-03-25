<?php

class Item {
  private $price;
  private $typeName;
  private $typeID;
  private $techLevel;

  public function setTypeName($newTypeName) {
    $this->typeName = $newTypeName;
  }

  public function getTypeName() {
    return $this->typeName;
  }

  public function setPrice($newPrice) {
    $this->price = $newPrice;
  }

  public function getPrice() {
    return $this->price;
  }

  public function setTypeID($newTypeID) {
    $this->typeID = $newTypeID;
  }

  public function getTypeID() {
    return $this->typeID;
  }

  public function setTechLevel($newTechLevel) {
    $this->techLevel = $newTechLevel;
  }

  public function getTechLevel() {
    return $this->techLevel;
  }
}
