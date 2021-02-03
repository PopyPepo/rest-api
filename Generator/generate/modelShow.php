<?php
function modelShow($conn, $tableIns, $fileIns){
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
function '.$table.'Show($conn){
	$json = array();

	$'.$id->Column_name.' = isset($_GET[\''.$id->Column_name.'\']) ? addslashes($_GET[\''.$id->Column_name.'\']) : null;
	$json["instance"] = (object)array();
	if ($'.$id->Column_name.'){
		$sql = "SELECT * FROM '.$table.' WHERE '.$id->Column_name.'=\'".$'.$id->Column_name.'."\'";
		$query = $conn->query($sql);
		$json["instance"]=$query->fetch(PDO::FETCH_OBJ);
	}else{
		$json["alert"] = "No record information!!";
	}

	return $json;
}
?>';


	return $txt;
}
?>