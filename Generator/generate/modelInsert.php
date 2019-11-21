<?php
function modelInsert($conn, $tableIns, $fileIns){

	$table = $tableIns['TABLE_NAME'];
	$txt = '<?php
function '.$table.'Insert($conn){
	$json = array();
	if (isset($_POST) && $_POST){
		include($conn->PATH."conf/getColumname.php");
		$field = getColumname($conn, "'.$table.'");
		$col = "";	$val = "";	$c="";
		foreach ($_POST as $key=>$value) {
			if (in_array($key, $field)){
				$col.=$c;	$val.=$c;
				$col.=$key;
				$val.="\'".$value."\'";
				$c=",";
			}
		}
		$val = str_replace("\'\'", "NULL", $val);
		$insertSql = "INSERT INTO '.$table.' (".$col.") VALUES (".$val.")";

		try {
			$conn->exec($insertSql);
			$json["last_id"] = $conn->lastInsertId();
		} catch(PDOExecption $e) {
			$conn->rollback();
			$json["alert"] = $conn->errorInfo();
			//$json["sql"] = $insertSql;
		}
	}else{
		$json["alert"] = "No record information available!!";
	}

	return $json;
}
?>';


	return $txt;
}
?>