<?php
include_once("/assets/includes/universal/db.php");
$items = [];
$sql="SELECT * FROM invtypes WHERE marketGroupID != 'NULL'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetchObject()) {
  $typeID = $row->typeID;
  $typeName = $row->typeName;
  $groupID = $row->groupID;
  $volume = $row->volume;
  $items[$typeID] = new Item();
  $items[$typeID]->setTypeID($typeID);
  $items[$typeID]->setTypeName($typeName);
  $items[$typeID]->setGroupID($groupID);
  $items[$typeID]->setVolume($volume);
}

//$sql="SELECT * FROM industryactivityproducts WHERE activityID = 1";
//$stmt = $pdo->prepare($sql);
//$stmt->execute();
//while ($row = $stmt->fetchObject()) {
  //$typeID = $row->typeID;
  //$activityID = $row->activityID;
  //$productTypeID = $row->productTypeID;

  //if (isset($items[$productTypeID])) {
    //$items[$productTypeID]->setTechLevel(1);
    //$items[$productTypeID]->setBlueprintID($typeID);
  //}
//}

//foreach ($items as $item) {
  //if ($item->getTechLevel() == null) {
    //$item->setTechLevel(0);
  //}
//}
