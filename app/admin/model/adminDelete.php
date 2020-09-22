<?php
function adminDelete($conn){
	$json = array();
	$id = isset($_POST["idadmin"]) ? $_POST["idadmin"] : null;
	if ($id){
		// $deleteSql = "DELETE FROM admin WHERE idadmin='".$id."'";
		$deleteSql = "UPDATE admin SET active=0 WHERE idadmin='".$id."'";

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