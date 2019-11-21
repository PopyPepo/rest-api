<?php
function modelList($conn, $tableIns, $fileIns){
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
	$excuteS = $conn->query($sql);
	while ($instanc = $excuteS->fetch(PDO::FETCH_OBJ)){
		$instanc->Column_name = $instanc->Field;
		$listCol[] = $instanc;
	}

	$id = $id ? $id : $listCol[0];

	$perPage = 20; // defauit perPage
	
	$txt = '<?php
function '.$table.'List($conn){
	$json = array();
	
	$perPage = isset($_GET["perPage"]) ? $_GET["perPage"] : '.$perPage.';
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;
	$pageStart = ($page-1)*$perPage;

	$sql = "SELECT * FROM '.$table.' LIMIT ".$pageStart.",".$perPage;
	$query = $conn->query($sql);

	$json["instance"] = array();
	while ($instance=$query->fetch(PDO::FETCH_ASSOC)) {
		$json["instance"][] = $instance;
	}

	$sqlCount = "SELECT count('.$id->Column_name.') AS total FROM '.$table.'";
	$total = $conn->query($sqlCount)->fetchColumn();

	$json[\'pagination\'] = array();
	$json[\'pagination\'][\'total\'] = intval($total);
	$json[\'pagination\'][\'page\'] = intval($page);
	$json[\'pagination\'][\'pageStart\'] = intval($pageStart);
	$json[\'pagination\'][\'perPage\'] = intval($perPage);

	return $json;
}	
?>';
	return $txt;
}
?>