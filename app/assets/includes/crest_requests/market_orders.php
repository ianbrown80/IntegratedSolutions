<?php
print_r($_SESSION);

$auth_token = $_SESSION['auth_token'];
echo $auth_token;
