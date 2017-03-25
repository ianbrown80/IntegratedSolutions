<?php
include_once("/assets/includes/universal/db.php");
$items = [];
$sql="SELECT * FROM invTypes WHERE marketGroupID != 'NULL'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetchObject()) {
  $typeID = $row->typeID;
  $typeName = $row->typeName;
  $items[$typeID] = new Item();
  $items[$typeID]->setTypeID($typeID);
  $items[$typeID]->setTypeName($typeName);
}
