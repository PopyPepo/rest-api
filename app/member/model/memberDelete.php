<?php
function memberDelete($conn){
	$json = array();
	$id = isset($_POST["id"]) ? $_POST["id"] : null;
	if ($id){
		$deleteSql = "DELETE FROM member WHERE id='".$id."'";

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