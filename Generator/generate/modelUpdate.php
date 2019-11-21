<?php
function modelUpdate($conn, $tableIns, $fileIns){

	$i = 1;
	$colIndex = array();
	$id = null;
	$table = $tableIns['TABLE_NAME'];

	$sqlS = "SHOW INDEX  FROM ".$table."";
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
function '.$table.'Update($conn){
	$json = array();
	$'.$id->Column_name.' = isset($_GET["'.$id->Column_name.'"]) ? $_GET["'.$id->Column_name.'"] : (isset($_POST["'.$id->Column_name.'"]) ? $_POST["'.$id->Column_name.'"] : null);
	if ($'.$id->Column_name.' && isset($_POST) && $_POST){
		$col = "";	$val = "";	$c="";
		include($conn->PATH."conf/getColumname.php");
		$field = getColumname($conn, "'.$table.'");
		
		if (isset($_POST["'.$id->Column_name.'"])){	unset($_POST["'.$id->Column_name.'"]);}
		foreach ($_POST as $key=>$value) {	
			if (in_array($key, $field)){
				$col.=$c;
				$col.= $key."=\'".$value."\'";
				$c=",";
			}
		}

		$col = str_replace("\'\'", "NULL", $col);
		$updateSql = "UPDATE '.$table.' SET ".$col." WHERE '.$id->Column_name.'=\'".$id."\'";
		
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
?>';


	return $txt;
}
?>