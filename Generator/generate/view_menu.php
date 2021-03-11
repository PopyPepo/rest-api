<?php
function view_menu($conn, $tableIns, $fileIns){
	$table = $tableIns['TABLE_NAME'];
	$tableSql = "SELECT * FROM information_schema.TABLES WHERE TABLE_NAME='".$table."' AND TABLE_SCHEMA='".$tableIns['database']."'";
	$tableexcute = $conn->query($tableSql);
	$tableInstanc = $tableexcute->fetch(PDO::FETCH_OBJ);
	$title = $tableInstanc->TABLE_COMMENT ? $tableInstanc->TABLE_COMMENT : $tableInstanc->TABLE_NAME;

	$txt ='<div class="btn-group" role="group" ng-init="addLang(\'member\')">
	<a href="<?php echo $LINK_URL; ?>'.$table.'/list/" title="รายการข้อมูล'.$title.'" class="btn btn-light btn-round shadow-sm">
		<i class="fas fa-table"></i> 
			{{ massages.default.list+massages.'.$table.'.domain }}
	</a>
	<a href="<?php echo $LINK_URL; ?>'.$table.'/create/" title="เพิ่มข้อมูล'.$title.'" class="btn btn-primary btn-round shadow-sm">
		<i class="fas fa-plus-circle"></i> 
			{{ massages.default.create+massages.'.$table.'.domain }}
	</a>
</div>';

	return $txt;
}
?>

