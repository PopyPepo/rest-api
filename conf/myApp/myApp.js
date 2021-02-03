'use strict';

angular.module("myApp", ['ngSanitize','ngNotify', 'ngQuill']).filter('roundup', function () {
	return function (value) {
		return Math.ceil(value);
	};
}).directive('ngConfirmClick', [
	function(){
		return {
			link: function (scope, element, attr) {
				var msg = attr.ngConfirmClick || "Are you sure?";
				var clickAction = attr.confirmedClick;
				element.click(function (event) {
					if ( window.confirm(msg) ) {
						scope.$eval(clickAction)
					}
				});
			}
		};
}]).filter('nl2br', function($sce){
	return function(msg,is_xhtml) {
		var is_xhtml = is_xhtml || true;
		var breakTag = (is_xhtml) ? '<br />' : '<br>';
		var msg = (msg + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
		return $sce.trustAsHtml(msg);
	}
}).filter('zpad', function() {
	return function(input, n) {
		if(input === undefined)
			input = ""
		if(input.length >= n)
			return input
		var zeros = "0".repeat(n);
		return (zeros + input).slice(-1 * n)
	};
}).directive('loading',   ['$http' ,function ($http){
	return {
		restrict: 'A',
		link: function (scope, elm, attrs){
			scope.isLoading = function () {
				return $http.pendingRequests.length > 0;
			};
			scope.$watch(scope.isLoading, function (v){
				if(v){
					elm.show();
				}else{
					elm.hide();
				}
			});
		}
	};
}]).constant('NG_QUILL_CONFIG', {
	/*
	 * @NOTE: this config/output is not localizable.
	 */
	modules: {
	  toolbar: [
		['bold', 'italic', 'underline', 'strike'],        // toggled buttons
		['blockquote', 'code-block'],
  
		[{ 'header': 1 }, { 'header': 2 }],               // custom button values
		[{ 'list': 'ordered' }, { 'list': 'bullet' }],
		[{ 'script': 'sub' }, { 'script': 'super' }],     // superscript/subscript
		[{ 'indent': '-1' }, { 'indent': '+1' }],         // outdent/indent
		// [{ 'direction': 'rtl' }],                         // text direction
  
		[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
		[{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  
		[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
		// [{ 'font': [] }],
		[{ 'align': [] }],
  
		['clean'],                                         // remove formatting button
  
	  	['link', 'image'/*, 'video'*/]                         // link and image, video
	  ]
	},
	theme: 'snow',
	debug: 'warn',
	placeholder: '',
	readOnly: false,
	bounds: document.body,
	scrollContainer: null
}).config(['ngQuillConfigProvider', 'NG_QUILL_CONFIG', function (ngQuillConfigProvider, NG_QUILL_CONFIG) {
		ngQuillConfigProvider.set(NG_QUILL_CONFIG)
	}
]);

//   .config(['ngQuillConfigProvider', function (ngQuillConfigProvider) {
// 	ngQuillConfigProvider.set(null, null, 'custom placeholder')
// }])