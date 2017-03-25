<?php
set_time_limit(0);
$useragent=$_SERVER['HTTP_USER_AGENT'];
$auth_token = $_SESSION['auth_token'];
$region = "10000002";
$location = "60003760";
$page = 1;

do {

  $url = "https://esi.tech.ccp.is/latest/markets/" . $region . "/orders/?datasource=tranquility&page=" . $page . "&user_agent=" . urlencode($useragent);
  $ch = curl_init();
  $header='Authorization: Bearer '.$auth_token;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
  $result = curl_exec($ch);
  if ($result===false) {
    auth_error(curl_error($ch));
  }
  curl_close($ch);
  $response=json_decode($result);
  if ($response) {
    foreach ($response as $item) {
      if ($item->location_id == $location && !$item->is_buy_order) {
        if (isset($items[$item->type_id])) {
          if ($items[$item->type_id]->getPrice() == null || $items[$item->type_id]->getPrice() > $item->price) {
            $items[$item->type_id]->setPrice($item->price);
          }
        }
      }
    }
  }
  $page++;

} while (!empty($response));
