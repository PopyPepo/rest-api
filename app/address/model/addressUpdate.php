<?php
function addressUpdate($conn){
	$json = array();
	$id_address = isset($_GET["id_address"]) ? $_GET["id_address"] : (isset($_POST["id_address"]) ? $_POST["id_address"] : null);
	if ($id_address && isset($_POST) && $_POST){
		$col = "";	$val = "";	$c="";
		include($conn->PATH."conf/getColumname.php");
		$field = getColumname($conn, "address");
		
		if (isset($_POST["id_address"])){	unset($_POST["id_address"]);}
		foreach ($_POST as $key=>$value) {	
			if (in_array($key, $field)){
				$col.=$c;
				$col.= $key."='".$value."'";
				$c=",";
			}
		}

		$col = str_replace("''", "NULL", $col);
		$updateSql = "UPDATE address SET ".$col." WHERE id_address='".$id."'";
		
		try {
			$conn->exec($updateSql);
			$json["update_id"] = $id;
			$json["status"] = true;
		} catch(PDOExecption $e) {
			$conn->rollback();
			$json["alert"] = $conn->error;
			$json["status"] = false;
			// $json["sql"] = $updateSql;
		}
		
	}else{
		$json["alert"] = "No record information available!!";
	}

	return $json;
}
?>