<?php
function viewshow($conn, $tableIns, $fileIns){
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
	$sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment' ";
	$excuteS = $conn->query($sql);
	while ($instanc = $tableexcute->fetch(PDO::FETCH_OBJ)){
		$instanc->Column_name = $instanc->Field;
		$listCol[] = $instanc;
	}

	$id = $id ? $id : $listCol[0];

	$txt = '<?php $ID = isset($_GET[\''.$id->Column_name.'\']) ? $_GET[\''.$id->Column_name.'\'] : $ID; ?>
';
	$init = 'ng-init="'.$table.'Show(\'<?php echo $ID; ?>\');"';

	$title = "แสดงข้อมูล".($tableInstanc->TABLE_COMMENT ? $tableInstanc->TABLE_COMMENT : $tableInstanc->TABLE_NAME);
	$title .= ' : {{ "#"+'.$table.'Instance.'.$id->Column_name.' }}';
	include '_herder.php';


	$txt .= '

				<div class="card-body">
					<h4 class="card-title mb-3">{{ massages.default.show+massages.'.$table.'.domain }}</h4>
					<div class="table-responsive">
						<table class="table table-show table-sm border-bottom">
							<tbody>';
								$sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment' ";
								$excute = $conn->query($sql);
								while ($instanc = $excute->fetch(PDO::FETCH_OBJ)){
									if ($id->Column_name!=$instanc->Field){
										// if (!in_array($instanc->Field, $colIndex)){
										$label = '{{ massages.'.$table.'.'.$instanc->Field.' }}';
										//$label = $instanc->Comment ? $instanc->Comment : $instanc->Field;
										$td = '{{ '.$table.'Instance.'.$instanc->Field.' }}';
										if (strpos($instanc->Comment, "@{")){
											$dataSpri = explode("@{", $instanc->Comment);
											$label = $dataSpri[0];
											$td = '{{ '.$table.ucfirst($instanc->Field).'['.$table.'Instance.'.$instanc->Field.'] }}';
										}
										$txt .= '
								<tr>
									<th class="bg-info text-white" width="auto">'.$label.'</th>
									<td>'.$td.'</td>
								</tr>
										';
									}
								}
							$txt .= '
							</tbody>
						</table>
					</div>
					
				</div>

				<div class="d-block card-footer">
					<a class="btn btn-warning float-right shadow-sm" href="<?php echo $LINK_URL; ?>'.$table.'/edit/{{ '.$table.'Instance.'.$id->Column_name.' }}/"> 
						<i class="fas fa-edit"></i>
						แก้ไขข้อมูล
					</a> 
					<button type="button" class="btn btn-danger float-right shadow-sm mr-1" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" confirmed-click="'.$table.'Delete('.$table.'Instance.'.$id->Column_name.');"> 
						<i class="fas fa-trash-alt"></i> {{ massages.default.btn_del }} 
					</button>
				</div>

			</div>
		</div>
	</div>
</div>';


	return $txt;
}
?>