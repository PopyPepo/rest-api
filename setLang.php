<?php
if (!isset($_SESSION)) session_start();
ob_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set("Asia/Bangkok");
header("Content-Type: application/json; charset=UTF-8");


$json = false;


if (isset($_POST['LANG'])){
	$_SESSION['LANG'] = $_POST['LANG'];
	$json = true;
}


echo $json;

?>