<?php
// Functions
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

if ($_SERVER['SERVER_PORT'] == 443){
  $protocal = 'https://';
} else {
  $protocal = 'http://';
}


$protocal = 'http://';
$apiURL = $protocal."api.subely.com";

session_start();

require_once 'vendor/autoload.php';

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

//Configure Dropbox Application
$app = new DropboxApp("k5lm6p6k0gzfo14", "zw3e47ugo1pwfdp");

//Configure Dropbox service
$dropbox = new Dropbox($app);

//DropboxAuthHelper
$authHelper = $dropbox->getAuthHelper();

//Callback URL


$protocal = 'https://';
$callbackUrl = $protocal . $_SERVER['HTTP_HOST'] . "/auth/login-callback.php";

?>
