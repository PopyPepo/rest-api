angular.module("myApp").controller("adminController", ["$scope", "$http", "$window", "$filter", function($scope, $http, $window, $filter){
	
	$scope.adminInstanceList = [];
	$scope.adminInstance = {};
	$scope.adminStatus = {"1":"เปิดใช้งาน","0":"ปิดใช้งาน"};
	$scope.pagination = {};
	$scope.pagination.page = 1;

	$scope.adminInsert = function(obj){
		$http({
			method: "POST",
			url: PATH+"app/admin/model/?action=adminInsert",
			data: $.param(obj),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			var last_id = response.data.last_id ? response.data.last_id : null;
			if (last_id>0){
				$window.location.href = LINK+"admin/show/"+last_id+"/";
			}else{
				$scope.displayNotify('warning', "เพิ่มข้อมูลผู้ดูแลระบบใหม่ไม่สำเร็จ!!");
				console.log(response.data.sql);
			}
			
		}, function errorCallback(error) {
			$scope.displayNotify('error', "เกิดข้อผิดพลาด!! ในการเพิ่มข้อมูลผู้ดูแลระบบใหม่");
			console.log("adminController save ERROR!!!");
			console.log(error);
		});
	};

	$scope.adminShow= function(id){
		$http({
			method: "GET",
			url: PATH+"app/admin/model/?action=adminShow",
			params: {idadmin: id}
		}).then(function successCallback(response) {
			if (response.data.instance){
				$scope.adminInstance = response.data.instance;
			}
			else{
				$scope.displayNotify('warning', "แสดงข้อมูล ผู้ดูแลระบบ ไม่สำเร็จ!!");
				console.log(response.data.sql);
			}
			
		}, function errorCallback(error) {
			$scope.displayNotify('error', "เกิดข้อผิดพลาด!! ในการแสดงข้อมูลผู้ดูแลระบบ #"+id);
			console.log("adminController show ERROR!!!");
			console.log(error);
		});
	};

	$scope.adminList= function(){
		$http({
			method: "GET",
			url: PATH+"app/admin/model/?action=adminList",
			params: $scope.pagination
		}).then(function successCallback(response) {
			$scope.adminInstanceList = response.data.instance;
			$scope.pagination = response.data.pagination;
			
		}, function errorCallback(error) {
			$scope.displayNotify('error', "เกิดข้อผิดพลาด!! ในการแสดรายการข้อมูลผู้ดูแลระบบ");
			console.log("adminController list ERROR!!!");
			console.log(error);
		});
	};

	$scope.adminUpdate = function(obj){
		$http({
			method: "POST",
			url: PATH+"app/admin/model/?action=adminUpdate",
			data: $.param(obj),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			var update_id = response.data.update_id ? response.data.update_id : null;
			if (update_id){
				$window.location.href = LINK+"admin/show/"+update_id+"/";
			}else{
				$scope.displayNotify('warning', "ปรับปรุงข้อมูลผู้ดูแลระบบไม่สำเร็จ!!");
				console.log(response.data);
			}
			
		}, function errorCallback(error) {
			$scope.displayNotify('error', "เกิดข้อผิดพลาด!! ในการปรับปรุงข้อมูลผู้ดูแลระบบ!! #"+$scope.adminInstance.idadmin);
			console.log("adminController update ERROR!!!");
			console.log(error);
		});
	};

	$scope.adminDelete = function(id){
		$http({
			method: "POST",
			url: PATH+"app/admin/model/?action=adminDelete",
			data: $.param({idadmin: id}),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			var status = response.data.status ? response.data.status : false;
			alert(response.data.message);
			if (status){
				$window.location.href = LINK+"admin/list/";
			}else{
				$scope.displayNotify('warning', "ลบข้อมูลผู้ดูแลระบบไม่สำเร็จ!!");
				console.log(response.data.sql);
			}
			
		}, function errorCallback(error) {
			$scope.displayNotify('error', "เกิดข้อผิดพลาด!! ในการลบข้อมูลผู้ดูแลระบบ!! #"+id);
			console.log("adminController delete ERROR!!!");
			console.log(error);
		});
	};

}]);