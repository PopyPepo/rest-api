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
	$json[\'pagination\'] = $_GET;
	
	$perPage = isset($_GET["perPage"]) ? $_GET["perPage"] : '.$perPage.';
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;
	$pageStart = ($page-1)*$perPage;

	$where = "1";
	$limit = " LIMIT ".$pageStart.",".$perPage;
	
	$sql = "SELECT * FROM '.$table.' WHERE ".$where;

	$query = $conn->query($sql.$limit);
	$json["instance"] = array();
	while ($instance=$query->fetch(PDO::FETCH_ASSOC)) {
		$json["instance"][] = $instance;
	}


	$total = $conn->query($sql)->fetchColumn();
	
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