<?php
function adminList($conn){
	$json = array();
	$json['pagination'] = $_GET;
	
	$perPage = isset($_GET["perPage"]) ? $_GET["perPage"] : 20;
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;
	$pageStart = ($page-1)*$perPage;

	$where = "active>0";
	$limit = " LIMIT ".$pageStart.",".$perPage;
	
	$sql = "SELECT * FROM admin WHERE ".$where;

	$query = $conn->query($sql.$limit);
	$json["instance"] = array();
	while ($instance=$query->fetch(PDO::FETCH_ASSOC)) {
		$json["instance"][] = $instance;
	}

	$sqlCount = "SELECT count(idadmin) AS total FROM admin WHERE ".$where;
	$result = $conn->prepare($sqlCount); 
	$result->execute();
	$total = $result->fetchColumn();
	
	$json['pagination']['total'] = intval($total);
	$json['pagination']['page'] = intval($page);
	$json['pagination']['pageStart'] = intval($pageStart);
	$json['pagination']['perPage'] = intval($perPage);

	return $json;
}	
?>