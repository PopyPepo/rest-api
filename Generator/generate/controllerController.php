<?php
function controllerController($conn, $tableIns, $fileIns){
	$txt = '';
	$i = 1;
	$colIndex = array();
	$id = null;
	$table = $tableIns['TABLE_NAME'];
	$sqlS = "SHOW INDEX  FROM ".$table."";
	$excuteS = $conn->query($sqlS);
	while ($instancS = $excuteS->fetch(PDO::FETCH_OBJ)){
		if (isset($instancS->Column_name)){$colIndex[] = $instancS;}
		if ($instancS->Key_name=='PRIMARY' && !$id){$id = $instancS;}
	}


	$listCol = array();
	$sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment' ";
	$excute = $conn->query($sql);
	while ($instanc = $excute->fetch(PDO::FETCH_OBJ)){
		$instanc->Column_name = $instanc->Field;
		$listCol[] = $instanc;
	}

	$id = $id ? $id : $listCol[0];

	$tableSql = "SELECT * FROM information_schema.TABLES WHERE TABLE_NAME='".$table."' AND TABLE_SCHEMA='".$tableIns['database']."'";
	$tableexcute = $conn->query($tableSql);
	$tableInstanc = $tableexcute->fetch(PDO::FETCH_OBJ);
	$title = ($tableInstanc->TABLE_COMMENT ? $tableInstanc->TABLE_COMMENT : " ".$tableInstanc->TABLE_NAME." ");
	$txt = 'angular.module("myApp").controller("'.$table.'Controller", ["$scope", "$http", "$window", "$filter", function($scope, $http, $window, $filter){
	
	$scope.'.$table.'InstanceList = [];
	$scope.'.$table.'Instance = {};';	

	$sql = "SHOW FULL COLUMNS FROM ".$table." WHERE Extra!='auto_increment' ";
	$excute = $conn->query($sql);
	while ($instanc = $excute->fetch(PDO::FETCH_OBJ)){
		if (isset($instanc->Default) && strtoupper($instanc->Default)!='CURRENT_TIMESTAMP' && strtoupper($instanc->Default)!='CURRENT_TIMESTAMP()'){
			$txt .= '
	$scope.'.$table.'Instance.'.$instanc->Field.' = "'.$instanc->Default.'";';
		}
		if (strpos($instanc->Comment, "@{")){
			$dataSpri = explode("@{", $instanc->Comment);
			$dataSpri = str_replace(array("}", " "), "", $dataSpri[1]);
			$dataSpri = str_replace(":", '":"', $dataSpri);
			$dataSpri = '{"'.(str_replace(",", '","', $dataSpri)).'"}';
			$txt .= '
	$scope.'.$table.ucfirst($instanc->Field).' = '.$dataSpri.';';
		}
	}

	$txt .= '
	$scope.pagination = {};
	$scope.pagination.page = 1;

	$scope.'.$table.'Insert = function(obj, act=true){
		$http({
			method: "POST",
			url: PATH+"app/'.$table.'/model/?action='.$table.'Insert",
			data: $.param(obj),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			var last_id = response.data.last_id ? response.data.last_id : null;
			if (last_id>0){
				if (act){
					$window.location.href = LINK+"'.$table.'/show/"+last_id+"/";
				}
				$scope.displayNotify(\'success\', "เพิ่มข้อมูล'.$title.'ใหม่สำเร็จ");
			}else{
				$scope.displayNotify(\'warning\', "เพิ่มข้อมูล'.$title.'ใหม่ไม่สำเร็จ!!");
				console.log(response.data.sql);
			}
			
		}, function errorCallback(error) {
			$scope.displayNotify(\'error\', "เกิดข้อผิดพลาด!! ในการเพิ่มข้อมูล'.$title.'ใหม่");
			console.log("'.$table.'Controller save ERROR!!!");
			console.log(error);
		});
	};

	$scope.'.$table.'Show= function(id){
		$http({
			method: "GET",
			url: PATH+"app/'.$table.'/model/?action='.$table.'Show",
			params: {'.$id->Column_name.': id}
		}).then(function successCallback(response) {
			if (response.data.instance){
				$scope.'.$table.'Instance = response.data.instance;
			}
			else{
				$scope.displayNotify(\'warning\', "แสดงข้อมูล '.$title.' ไม่สำเร็จ!!");
				console.log(response.data.sql);
			}
			
		}, function errorCallback(error) {
			$scope.displayNotify(\'error\', "เกิดข้อผิดพลาด!! ในการแสดงข้อมูล'.$title.' #"+id);
			console.log("'.$table.'Controller show ERROR!!!");
			console.log(error);
		});
	};

	$scope.'.$table.'List= function(){
		$http({
			method: "GET",
			url: PATH+"app/'.$table.'/model/?action='.$table.'List",
			params: $scope.pagination
		}).then(function successCallback(response) {
			$scope.'.$table.'InstanceList = response.data.instance;
			$scope.pagination = response.data.pagination;
			
		}, function errorCallback(error) {
			$scope.displayNotify(\'error\', "เกิดข้อผิดพลาด!! ในการแสดรายการข้อมูล'.$title.'");
			console.log("'.$table.'Controller list ERROR!!!");
			console.log(error);
		});
	};

	$scope.'.$table.'Update = function(obj, act=true){
		$http({
			method: "POST",
			url: PATH+"app/'.$table.'/model/?action='.$table.'Update",
			data: $.param(obj),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			var update_id = response.data.update_id ? response.data.update_id : null;
			if (update_id){
				if (act){
					$window.location.href = LINK+"'.$table.'/show/"+update_id+"/";
				}
				$scope.'.$table.'Show(obj.'.$id->Column_name.'); // $scope.'.$table.'List();
				$scope.displayNotify(\'success\', "ปรับปรุงข้อมูล'.$title.'สำเร็จ");
			}else{
				$scope.displayNotify(\'warning\', "ปรับปรุงข้อมูล'.$title.'ไม่สำเร็จ!!");
				console.log(response.data);
			}
			
		}, function errorCallback(error) {
			$scope.displayNotify(\'error\', "เกิดข้อผิดพลาด!! ในการปรับปรุงข้อมูล'.$title.'!! #"+$scope.'.$table.'Instance.'.$id->Column_name.');
			console.log("'.$table.'Controller update ERROR!!!");
			console.log(error);
		});
	};

	$scope.'.$table.'Delete = function(obj, act=true){
		$http({
			method: "POST",
			url: PATH+"app/'.$table.'/model/?action='.$table.'Delete",
			data: $.param({'.$id->Column_name.': obj.'.$id->Column_name.'}),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			var status = response.data.status ? response.data.status : false;
			if (status){
				if (act){
					$window.location.href = LINK+"'.$table.'/list/";
				}
				$scope.'.$table.'List();
				$scope.displayNotify(\'success\', "ลบข้อมูล'.$title.'สำเร็จ");
			}else{
				$scope.displayNotify(\'warning\', "ลบข้อมูล'.$title.'ไม่สำเร็จ!!");
				console.log(response.data.sql);
			}
			
		}, function errorCallback(error) {
			$scope.displayNotify(\'error\', "เกิดข้อผิดพลาด!! ในการลบข้อมูล'.$title.'!! #"+id);
			console.log("'.$table.'Controller delete ERROR!!!");
			console.log(error);
		});
	};

}]);';


	return $txt;
}
?>