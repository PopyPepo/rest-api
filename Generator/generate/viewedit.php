<?php
function viewedit($conn, $tableIns, $fileIns){

	$i = 1;
	$colIndex = array();
	$id = array();
	$table = $tableIns['TABLE_NAME'];
	$tableSql = "SELECT * FROM information_schema.TABLES WHERE TABLE_NAME='".$table."' AND TABLE_SCHEMA='".$tableIns['database']."'";
	$tableexcute = $conn->query($tableSql);
	$tableInstanc = $tableexcute->fetch(PDO::FETCH_OBJ);

	$sqlS = "SHOW INDEX  FROM ".$table."";
	$excuteS = $conn->query($sqlS);
	while ($instancS =$excuteS->fetch(PDO::FETCH_OBJ)){
		//print_r($instancS);
		if (isset($instancS->Column_name)){$colIndex[] = $instancS->Column_name;}
		if ($instancS->Key_name=='PRIMARY' && !$id){$id = $instancS;}
	}

	$listCol = array();
	$sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment'";
	$excuteS = $conn->query($sql);
	while ($instanc = $excuteS->fetch(PDO::FETCH_OBJ)){
		$instanc->Column_name = $instanc->Field;
		$listCol[] = $instanc;
	}

	$id = $id ? $id : $listCol[0];

	$toString = "";
	$result = $conn->query("SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment'");
	$row = $result->fetch(PDO::FETCH_OBJ);
	$toString = $row->Field;



	$txt = '<?php $ID = isset($_GET[\''.$id->Column_name.'\']) ? $_GET[\''.$id->Column_name.'\'] : $ID; ?>
';
	$init = 'ng-init="'.$table.'Show(\'<?php echo $ID; ?>\');"';

	$title = "แก้ไขข้อมูล".($tableInstanc->TABLE_COMMENT ? $tableInstanc->TABLE_COMMENT : $tableInstanc->TABLE_NAME);
	$title .='
						<small>
							<a href="<?php echo $LINK_URL; ?>'.$table.'/show/{{'.$table.'Instance.'.$id->Column_name.'}}/" ng-attr-title="{{ \'กลับไปหน้า แสดงข้อมูล \'+'.$table.'Instance.'.$toString.' }}">
								<i class="fas fa-hand-point-left"></i> 
								{{ "#"+'.$table.'Instance.'.$id->Column_name.' }}
							</a>
						</small>
					';

	include '_herder.php';

	$txt.='	

				<div class="card-body">
					<h4 class="card-title mb-3">{{ massages.default.edit+massages.'.$table.'.domain }}</h4>
					<form name="'.$table.'Form" method="post" ng-submit="'.$table.'Update('.$table.'Instance);">
						<?php include("app/'.$table.'/view/_form.php"); ?>
						
						<button type="button" class="btn btn-danger float-right mr-1 shadow" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" title="ลบข้อมูล" confirmed-click="'.$table.'Delete('.$table.'Instance.'.$id->Column_name.');"><i class="fas fa-trash-alt"></i> {{ massages.default.btn_del }} </button>';
						

	$txt .= $boxL;
	return $txt;
}
?>