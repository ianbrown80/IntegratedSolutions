<?php
session_start();
include_once("/assets/includes/universal/header.php");

if (isset($_SESSION['auth_characterid'])) {
  include_once("/assets/includes/controllers/market_orders.php");
} else {
  header("Location: /assets/includes/sso/login.php");
}

include_once("/assets/includes/universal/footer.php");
