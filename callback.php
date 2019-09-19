<?php

session_start();

require 'lineloginlibery.php';
//require 'login_userlib.php';

// กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$LineLogin = new LineLoginLib();

// กรณีต้องการดึงค่าเฉพาะ access token ไปใช้งาน
/* $accToken = $LineLogin->requestAccessToken($_GET);
  if(isset($accToken) && is_string($accToken)){
  $_SESSION['ses_login_accToken_val'] = $accToken;
  } */

// กรณีต้องการดึงค่าเฉพาะ access token และค่าอื่นๆ รวมถึงข้อมูลผู้ใช้ เช่น userId ในไลน์ ไปใช้งาน

$dataToken = $LineLogin->requestAccessToken($_GET, true);
if (!is_null($dataToken) && is_array($dataToken)) {
    if (array_key_exists('access_token', $dataToken)) {
        $_SESSION['ses_login_accToken_val'] = $dataToken['access_token'];
    }
    if (array_key_exists('refresh_token', $dataToken)) {
        $_SESSION['ses_login_refreshToken_val'] = $dataToken['refresh_token'];
    }
    if (array_key_exists('id_token', $dataToken)) {
        $_SESSION['ses_login_userData_val'] = $dataToken['user'];

    }
}

//print_r($dataToken);
//echo "<br>++++++++++++++++++++<br>";
//print_r($_GET);
//echo "<br>++++++++++++++++++++<br>";
//print_r($_SESSION);
//echo "<br>++++++++++++++++++++<br>";

$_SESSION['email'] = $LineLogin->getEmail();
$_SESSION['channelid'] =  $LineLogin->getChannelId();
echo "email : ".$_SESSION['email'];
echo $_SESSION['channelid'];
require ('logDb.php');
require('userDb.php');
$userDb = new UserDb();
$logDb = new logDb();
$logDb->logUpdate($userDb->getUserId($_SESSION['email']),"login",$logDb->get_client_ip()."");
$LineLogin->redirect('profile.php');
?>

