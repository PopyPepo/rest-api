<?php
function addressDelete($conn){
	$json = array();
	$id = isset($_POST["id_address"]) ? $_POST["id_address"] : null;
	if ($id){
		$deleteSql = "DELETE FROM address WHERE id_address='".addslashes($id)."'";
		//$deleteSql = "UPDATE address SET active=0 WHERE id_address='".addslashes($id)."'";

		try {
			$conn->exec($deleteSql);
			$json["status"] = true;
			$json["message"] = "Delete Success.";
		} catch(PDOExecption $e) {
			$json["status"] = false;
			$json["sql"] = $conn->error;
			// $json["sql"] = $deleteSql;
		}
		
	}else{
		$json["alert"] = "No record information available!!";
	}
	return $json;
}
?>