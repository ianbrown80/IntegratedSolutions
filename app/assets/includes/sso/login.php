<?php
require_once('secret.php');
session_start();
if (isset($_SESSION['auth_characterid'])) {
    echo "Logged in. ".$_SESSION['auth_characterid'];
    exit;
} else {
    //Throw login redirect.
    $authsite='https://login.eveonline.com';
    $authurl='/oauth/authorize';
    $redirect_uri="http%3A%2F%2Flocalhost%3A8080%2Fassets%2Fincludes%2Fsso%2Fcallback.php";
    $state=uniqid();
    $redirecturl=$_SERVER['HTTP_REFERER'];

    if (!preg_match("#^http://localhost:8080/(.*)$#", $redirecturl, $matches)) {
        $redirecturl='/';
    } else {
        $redirecturl=$matches[1];
    }
    $redirect_to="http://localhost:8080/".$redirecturl;
    $_SESSION['auth_state']=$state;
    $_SESSION['auth_redirect']=$redirect_to;
    session_write_close();
    header(
        'Location:'.$authsite.$authurl
        .'?response_type=code&redirect_uri='.$redirect_uri
        .'&client_id='.$clientid.'&scope=&state='.$state
    );
    exit;
}
