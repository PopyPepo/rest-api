<?php 
include("_header.php");

$json = array();
$json['status'] = false;
$sec = isset($_POST['secname']) ? $_POST['secname'] : null;

if (isset($_SESSION[$sec])){
	unset($_SESSION[$sec]);
	$json['status'] = true;
}

$jsonEncode = json_encode($json);
if (isset($_GET["callback"])){
	$callback = $_GET["callback"];
	$jsonEncode = $callback. "(".$jsonEncode.")";
}
echo $jsonEncode;
?>