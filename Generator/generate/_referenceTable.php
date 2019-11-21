<?php 
$refTableName = $refTable[$instanc->Field]->REFERENCED_TABLE_NAME;
$refTableid = $refTable[$instanc->Field]->REFERENCED_COLUMN_NAME;

$toString = "";
$result = $conn->query("SHOW FULL COLUMNS FROM ".$refTableName." WHERE Extra!='auto_increment'");
$row = $result->fetch(PDO::FETCH_OBJ);

$toString = $row->Field;

$txt .= '<script src="<?php echo $ASSETS_URL; ?>app/'.$refTableName.'/controller/'.$refTableName.'Controller.js"></script>
<div class="form-group row" ng-controller="'.$refTableName.'Controller" ng-init="'.$refTableName.'List();">
	'.$label.'
	<div class="col-sm-10">
		<select class="custom-select" name="'.$instanc->Field.'" ng-model="'.$table.'Instance.'.$instanc->Field.'" ng-options="'.$refTableName.'.'.$refTableid.' as '.$refTableName.'.'.$toString.' for '.$refTableName.' in '.$refTableName.'InstanceList"'.$request.'>
			<option value="">--- เลือก'.($instanc->Comment ? $instanc->Comment : $instanc->Field).' ---</option>
		</select>
	</div>
</div>


';
?>