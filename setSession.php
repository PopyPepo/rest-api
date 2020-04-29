<?php 
include("_header.php");

$json = array();
$json['status'] = false;
$sec = isset($_GET['secname']) ? $_GET['secname'] : null;

if (isset($_POST) && $sec){
	$_SESSION[$sec] = $_POST;
	$json['status'] = true;
}

$json["date_now"] = date("Y-m-d H:i:s");


$jsonEncode = json_encode($json);
if (isset($_GET["callback"])){
	$callback = $_GET["callback"];
	$jsonEncode = $callback. "(".$jsonEncode.")";
}
echo $jsonEncode;

?>