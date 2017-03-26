<?php

class Item {
  private $price = null;
  private $typeName = null;
  private $typeID = null;
  private $techLevel = null;
  private $blueprint = null;
  private $groupID = null;
  private $volume = null;

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

  public function setGroupID($newGroupID) {
    $this->groupID = $newGroupID;
  }

  public function getGroupID() {
    return $this->groupID;
  }

  public function setVolume($newVolume) {
    $this->volume = $newVolume;
  }

  public function getVolume() {
    return $this->volume;
  }

  public function setBlueprint($newBlueprint) {
    $this->blueprint = $newBlueprint;
  }

  public function getBlueprint() {
    return $this->blueprint;
  }
}
