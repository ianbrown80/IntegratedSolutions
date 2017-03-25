<?php
session_start();
include_once("/assets/includes/controllers/items.php");
include_once("/assets/includes/universal/header.php");
foreach ($items as  $item) {
  echo $item->getTypeID() . " " . $item->getTypeName() . " " . $item->getPrice() . "</br>";
}



include_once("/assets/includes/universal/footer.php");
