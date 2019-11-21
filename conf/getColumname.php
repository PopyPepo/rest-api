<?php
function getColumname($conn, $table=""){
	$field = array();
	if ($table){
		$sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment' ";
		$excute = $conn->query($sql);
		while ($instanc = $excute->fetch(PDO::FETCH_OBJ)){
			$field[] = $instanc->Field;
		}
	}
	return $field;
}
?>