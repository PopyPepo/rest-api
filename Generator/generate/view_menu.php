<?php
function view_menu($conn, $tableIns, $fileIns){
	$table = $tableIns['TABLE_NAME'];
	$tableSql = "SELECT * FROM information_schema.TABLES WHERE TABLE_NAME='".$table."' AND TABLE_SCHEMA='".$tableIns['database']."'";
	$tableexcute = $conn->query($tableSql);
	$tableInstanc = $tableexcute->fetch(PDO::FETCH_OBJ);
	$title = $tableInstanc->TABLE_COMMENT ? $tableInstanc->TABLE_COMMENT : $tableInstanc->TABLE_NAME;

	$txt ='<div class="panel-header bg-info-gradient" ng-init="addLang(\''.$table.'\')">
	<div class="page-inner py-4">

		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		
			<h2 class="fw-bold">{{ show+massages.'.$table.'.domain }}</h2>
			<div class="ml-md-auto py-2 py-md-0">
				<a href="<?php echo $LINK_URL; ?>'.$table.'/list/" title="รายการข้อมูล'.$title.'" class="btn bg-white btn-round shadow-sm">
					<i class="fas fa-table"></i> 
					 {{ massages.default.list+massages.'.$table.'.domain }}
				</a>
				<a href="<?php echo $LINK_URL; ?>'.$table.'/create/" title="เพิ่มข้อมูล'.$title.'" class="btn btn-primary btn-round shadow-sm">
					<i class="fas fa-plus-circle"></i> 
					 {{ massages.default.create+massages.'.$table.'.domain }}
				</a>
			</div>
		</div>
	</div>
</div>';
/*<h2 class="fw-bold">'.$title.'</h2>
			<div class="ml-md-auto py-2 py-md-0">
				<a href="<?php echo $LINK_URL; ?>'.$table.'/list/" title="รายการข้อมูล'.$title.'" class="btn bg-white btn-round shadow-sm">
					<i class="fas fa-table"></i> 
					 รายการข้อมูล'.$title.'
				</a>
				<a href="<?php echo $LINK_URL; ?>'.$table.'/create/" title="เพิ่มข้อมูล'.$title.'" class="btn btn-primary btn-round shadow-sm">
					<i class="fas fa-plus-circle"></i> 
					 เพิ่มข้อมูล'.$title.'
				</a>
			</div>*/
	return $txt;
}
?>

