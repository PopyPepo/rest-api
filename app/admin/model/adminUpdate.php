<?php
function adminUpdate($conn){
	$json = array();
	$idadmin = isset($_GET["idadmin"]) ? $_GET["idadmin"] : (isset($_POST["idadmin"]) ? $_POST["idadmin"] : null);
	if ($idadmin && isset($_POST) && $_POST){
		$col = "";	$val = "";	$c="";
		include($conn->PATH."conf/getColumname.php");
		$field = getColumname($conn, "admin");
		
		if (isset($_POST["idadmin"])){	unset($_POST["idadmin"]);}
		if (isset($_POST["eventDate"])){	unset($_POST["eventDate"]);}
		foreach ($_POST as $key=>$value) {	
			if (in_array($key, $field)){
				$col.=$c;
				$col.= $key."='".addslashes($value)."'";
				$c=",";
			}
		}

		$col = str_replace("''", "NULL", $col);
		$updateSql = "UPDATE admin SET ".$col." WHERE idadmin='".$idadmin."'";
		
		try {
			$conn->exec($updateSql);
			$json["update_id"] = $idadmin;
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