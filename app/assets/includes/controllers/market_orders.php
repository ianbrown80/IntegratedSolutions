<?php
include "assets/includes/sso/sso_db.php";
$useragent=$_SERVER['HTTP_USER_AGENT'];
error_log('Getting market orders');
$market_orders_url="https://api.eveonline.com/corp/MarketOrders.xml.aspx?keyID=3381958&vCode=bLn8qXSupFP4Wf2WcELX0W8j3UAiG7JL6fGf5MW7MjCRRyf9CqnTSBDytVWUSUtN";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $market_orders_url);
curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
$result = curl_exec($ch);
curl_close($ch);
$ordersxml=simplexml_load_string($result);

$active_orders = [];
foreach ($ordersxml->result->rowset->row as $order) {
  if ($order['orderState'] == 0) {
    $typesql="SELECT typeName FROM invtypes WHERE typeID = {$order['typeID']}";
    $stmt = $pdo->prepare($typesql);
    $stmt->execute();
    while ($row = $stmt->fetchObject()) {
      $typeName=$row->typeName;
    }
    $order['typeName'] = $typeName;
    array_push($active_orders, $order);
  }
}
?>
<table>
  <thead>
    <tr>
      <th>Item</th>
      <th>Volume Remaining</th>
      <th>Initial Volume</th>
      <th>Price</th>
      <th>Station</th>
      <th>Date Issued</th>
      <th>Value</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($active_orders as $order) {
      echo "<tr>";
      echo "<td>  " . $order['typeName'] . "  </td>";
      echo "<td>  " . $order['volRemaining'] . "  </td>";
      echo "<td>  " . $order['volEntered'] . "  </td>";
      echo "<td>  " . $order['price'] . "  </td>";
      echo "<td>  " . $order['stationID'] . "  </td>";
      echo "<td>  " . $order['issued'] . "  </td>";
      echo "<td>  " . $order['price'] * $order['volRemaining'] . "  </td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
