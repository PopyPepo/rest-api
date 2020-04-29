<?php
function  getFolder($conn){
	$json = array();
	
	$dir = "../../view/";

	$json['conn'] = $conn;

	// Sort in ascending order - this is default
	// $a = scandir($dir);
	// $a = array_filter(glob($dir."*"), 'is_dir');
	// $list = "'".(implode("','",$a))."'";
	// $list = str_replace($dir, "", $list);

	$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='examble_db'";
	$query = $conn->query($sql);
	$json['sql'] = $sql;

	while ($instance=$query->fetch(PDO::FETCH_ASSOC)) {	/*$json.=$c;
		$json.= json_encode($instance);
		$c=',';*/
		$json['instance'][] = $instance;
	}
	return $json;
}
?>