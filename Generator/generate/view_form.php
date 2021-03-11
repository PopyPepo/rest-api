<?php
function view_form($conn, $tableIns, $fileIns){
	$txt = '';

	$i = 1;
	$colIndex = array();
	$id = array();
	$table = $tableIns['TABLE_NAME'];
	$sqlS = "SHOW INDEX FROM ".$table."";
	$excuteS = $conn->query($sqlS);
	while ($instancS = $excuteS->fetch(PDO::FETCH_OBJ)){
		//print_r($instancS);
		if (isset($instancS->Column_name)){$colIndex[] = $instancS->Column_name;}
		if ($instancS->Key_name=='PRIMARY' && !$id){$id = $instancS;}
	}

	$refTable = array();
	$sqlRef = "SELECT COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM information_schema.key_column_usage WHERE REFERENCED_TABLE_NAME IS NOT NULL AND TABLE_SCHEMA='".$tableIns['database']."' AND TABLE_NAME='".$table."'";
	$excute = $conn->query($sqlRef);
	while ($instanc = $excute->fetch(PDO::FETCH_OBJ)){
		$refTable[$instanc->COLUMN_NAME] = $instanc;
	}


	$sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment' ";
	$excute = $conn->query($sql);
	while ($instanc = $excute->fetch(PDO::FETCH_OBJ)){

		$span = "";
		$request = "";
		
		if ((strtoupper($instanc->Default)!='CURRENT_TIMESTAMP' || strtoupper($instanc->Default)!='CURRENT_TIMESTAMP()') && $instanc->Extra=='' || $instanc->Extra==null){
			if ($instanc->Null=='NO'){
				$span = '<span class="text-danger">*</span>';
				$request = ' required="required"';
			}

			$label = '<label for="'.$instanc->Field.'" class="col-sm-2 col-form-label">{{ massages.'.$table.'.'.$instanc->Field.' }} '.$span.' : </label>';

			if (isset($refTable[$instanc->Field])){
				include '_referenceTable.php';
			}else if (strpos($instanc->Comment, "@{")){
				include '_radio.php';
			}else if ($instanc->Type=='text'){
				include '_textarea.php';
			}else{
				include '_input.php';
			}
		}
	}

	$txt .= '<hr>
<button class="btn btn-success float-right shadow" type="submit"><i class="fas fa-save"></i> {{ massages.default.btn_save }}</button>';
	return $txt;
}
?>