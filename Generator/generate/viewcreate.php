<?php
function viewcreate($conn, $tableIns, $fileIns){
	$txt = '';
	$init = '';

	$table = $tableIns['TABLE_NAME'];
	$tableSql = "SELECT * FROM information_schema.TABLES WHERE TABLE_NAME='".$table."' AND TABLE_SCHEMA='".$tableIns['database']."'";
	$tableexcute = $conn->query($tableSql);
	$tableInstanc = $tableexcute->fetch(PDO::FETCH_OBJ);

	$title = "เพิ่มข้อมูล".($tableInstanc->TABLE_COMMENT ? $tableInstanc->TABLE_COMMENT : $tableInstanc->TABLE_NAME);
	include '_herder.php';

	$txt.='	

				<div class="card-body">
					<form name="'.$table.'Form" method="post" ng-submit="'.$table.'Insert('.$table.'Instance);">
						<?php include("app/'.$table.'/view/_form.php"); ?>';

	$txt .= $boxL;
	return $txt;
}
?>