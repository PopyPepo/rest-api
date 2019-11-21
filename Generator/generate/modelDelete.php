<?php
function modelDelete($conn, $tableIns, $fileIns){

	$i = 1;
	$colIndex = array();
	$id = null;
	$table = $tableIns['TABLE_NAME'];

	$sqlS = "SHOW INDEX FROM ".$table."";
	$excuteS = $conn->query($sqlS);
	while ($instancS = $excuteS->fetch(PDO::FETCH_OBJ)){
		//print_r($instancS);
		if (isset($instancS->Column_name)){$colIndex[] = $instancS->Column_name;}
		if ($instancS->Key_name=='PRIMARY' && !$id){$id = $instancS;}
	}

	$listCol = array();
	$sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment' ";
	$excute = $conn->query($sql);
	while ($instanc = $excute->fetch(PDO::FETCH_OBJ)){
		$instanc->Column_name = $instanc->Field;
		$listCol[] = $instanc;
	}

	$id = $id ? $id : $listCol[0];

	$txt = '<?php
function '.$table.'Delete($conn){
	$json = array();
	$id = isset($_POST["'.$id->Column_name.'"]) ? $_POST["'.$id->Column_name.'"] : null;
	if ($id){
		$deleteSql = "DELETE FROM '.$table.' WHERE '.$id->Column_name.'=\'".$id."\'";

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
?>';


	return $txt;
}
?>