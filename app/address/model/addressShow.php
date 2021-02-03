<?php
function addressShow($conn){
	$json = array();

	$id_address = isset($_GET['id_address']) ? addslashes($_GET['id_address']) : null;
	$json["instance"] = (object)array();
	if ($id_address){
		$sql = "SELECT * FROM address WHERE id_address='".$id_address."'";
		$query = $conn->query($sql);
		$json["instance"]=$query->fetch(PDO::FETCH_OBJ);
	}else{
		$json["alert"] = "No record information!!";
	}

	return $json;
}
?>