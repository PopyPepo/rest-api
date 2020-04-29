'use strict';

angular.module('myApp').controller('myAppController', ["$scope", "$http", "$window", 'ngNotify', function($scope, $http, $window, ngNotify){

	$scope.LANG = LANG;
	$scope.languageList = ['Th', 'En'];
	$scope.massages = {};
	var domainList = {};
	
	$scope.getWordding = function(){
		$http({
			method: "POST",
			url: PATH+"conf/?action=i18n",
			data: $.param({LANG: $scope.LANG, domain: domainList}),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			// console.log(response.data);
			$scope.massages = response.data;
		}, function errorCallback(response) {
			// $window.location.href = PATH+"auth/";
			console.log("myAppController addLang ERROR!!!");
		});
	};
	
	$scope.addLang = function(domain, filename="massages"){
		if (!domainList[domain])
			domainList[domain] = [];
		domainList[domain].push(filename);
		setTimeout(function() {
			$scope.getWordding();
		}, 50);
	};
	$scope.addLang("layout");
	
	$scope.setLang = function(lang){
		$http({
			method: "POST",
			url: PATH+"setLang.php",
			data: $.param({LANG: lang}),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
// 			console.log(response.data);
			if (response.data){
				$scope.LANG = lang;
				$scope.getWordding();
			}
		}, function errorCallback(response) {
			// $window.location.href = PATH+"auth/";
			console.log("myAppController checkLang ERROR!!!");
		});
	};

	$scope.setSession = function(auth, secname, page=null){
		$http({
			method: "POST",
			url: PATH+"setSession.php?secname="+secname,
			data: $.param(auth),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			console.log(response.data);
			if (response.data.status){
				if (page){
					$window.location.href = PATH+page+"/";
				}else{
					$window.location.reload();
				}
			}
		}, function errorCallback(response) {
			console.log("stadiumController setSession ERROR!!!");
		});
	};

	$scope.delSession = function(secname, page=null){
		$http({
			method: "POST",
			url: PATH+"delSession.php",
			data: $.param({secname: secname}),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			if (response.data.status){
				if (page){
					$window.location.href = PATH+page+"/";
				}else{
					$window.location.reload();
				}
			}
		}, function errorCallback(response) {
			console.log("myAppController save ERROR!!!");
		});
	};

	$scope.getSession = function(secname){
		$http({
			method: "POST",
			url: PATH+"getSession.php",
			data: $.param({secname: secname}),
			headers: {"Content-Type": "application/x-www-form-urlencoded"}
		}).then(function successCallback(response) {
			if (response.data.status){
				$scope.adminauthInstance = response.data.instance;
			}
		}, function errorCallback(response) {
			console.log("myAppController save ERROR!!!");
		});
	};

	
	var userCallback = function() {
		console.log('Callback triggered after message fades.');
	};

	$scope.displayNotify = function(notify, mass) {
		switch(notify) {
			case 'success':
				ngNotify.set(mass, {
					type: 'success'
				});
				break;
			case 'info':
				ngNotify.set(mass, 'info');
				break;
			case 'warn':
				ngNotify.set(mass, 'warn');
				break;
			case 'warning':
				ngNotify.set(mass, 'warn');
				break;
			case 'error':
				ngNotify.set(mass, 'error');
				break;
			case 'grimace':
				ngNotify.set(mass, 'grimace');
				break;
			case 'html':
				ngNotify.set(mass);
				break;
			case 'modular':
				ngNotify.set(mass, {
					target: '#modular'
				}, userCallback);
				break;
			default:
				ngNotify.set(mass);
				break;
		}
	};

	// Configuration options...

	$scope.theme = 'pastel';
	$scope.duration = 4000;
	$scope.position = 'top';
	$scope.defaultType = 'info';
	$scope.sticky = true;
	$scope.button = true;
	$scope.html = true;
	// Configuration actions...

	$scope.setDefaultType = function() {
		ngNotify.config({
			type: $scope.defaultType
		});
	};

	$scope.setDefaultPosition = function() {
		ngNotify.config({
			position: $scope.position
		});
	};

	$scope.setDefaultDuration = function() {
		ngNotify.config({
			duration: $scope.duration
		});
	};

	$scope.setDefaultTheme = function() {
		ngNotify.config({
			theme: $scope.theme
		});
	};

	$scope.setDefaultSticky = function() {
		ngNotify.config({
			sticky: $scope.sticky
		});
	};

	$scope.setDefaultButton = function() {
		ngNotify.config({
			button: $scope.button
		});
	};

	$scope.setDefaultHtml = function() {
		ngNotify.config({
			html: $scope.html
		});
	};

	$scope.dismissNotify = function() {
		ngNotify.dismiss();
	};

}]);
