<?php
function memberList($conn){
	$json = array();
	
	$perPage = isset($_GET["perPage"]) ? $_GET["perPage"] : 20;
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;
	$pageStart = ($page-1)*$perPage;

	$sql = "SELECT * FROM member LIMIT ".$pageStart.",".$perPage;
	$query = $conn->query($sql);

	$json["instance"] = array();
	while ($instance=$query->fetch(PDO::FETCH_ASSOC)) {
		$json["instance"][] = $instance;
	}

	$sqlCount = "SELECT count(id) AS total FROM member";
	$total = $conn->query($sqlCount)->fetchColumn();

	$json['pagination'] = array();
	$json['pagination']['total'] = intval($total);
	$json['pagination']['page'] = intval($page);
	$json['pagination']['pageStart'] = intval($pageStart);
	$json['pagination']['perPage'] = intval($perPage);

	return $json;
}	
?>