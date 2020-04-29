<?php 
// header('Access-Control-Allow-Origin: *');  
$PATH = "";
include($PATH."_header.php");
include($PATH."_connect.php");
$conn->PATH = $PATH;

$DOMAIN = isset($uri_past[0]) && $uri_past[0]!="" ? $uri_past[0] : null;
$ACTION = isset($uri_past[1]) && $uri_past[1]!="" ? $uri_past[1] : null;
$PAGE = $DOMAIN."/model/".$ACTION;




$actionFile = "app/". $PAGE.".php";
if (file_exists($actionFile)){
	
	include($actionFile);

	if (function_exists($ACTION)){
		$json = $ACTION($conn);
	}else{
		$json["alert"] = "Function not found!!!";
	}
}else{
	$json["alert"] = "File not found!!!";
}


$json["date_now"] = date("Y-m-d H:i:s");


echo json_encode($json);
?>