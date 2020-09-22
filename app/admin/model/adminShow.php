<?php
function adminShow($conn){
	$json = array();

	$idadmin = isset($_GET['idadmin']) ? $_GET['idadmin'] : null;
	$json["instance"] = (object)array();
	if ($idadmin){
		$sql = "SELECT * FROM admin WHERE idadmin=".$idadmin;
		$query = $conn->query($sql);
		$json["instance"]=$query->fetch(PDO::FETCH_OBJ);
	}else{
		$json["alert"] = "No record information!!";
	}

	return $json;
}
?>