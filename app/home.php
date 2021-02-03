<?php
error_reporting(E_ALL);
ob_start();
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Bangkok");

// $userID = isset($_SESSION['memberAuth']['id']) ? $_SESSION['memberAuth']['id'] : null;
$DOMAIN = isset($uri_past[0]) && $uri_past[0]!="" ? $uri_past[0] : "layout";
$ACTION = $DOMAIN=="layout" ? "main" : (isset($uri_past[1]) ? $uri_past[1] : "list");
$LANG = isset($_SESSION['LANG']) ? $_SESSION['LANG'] : "Th";
$PAGE = $DOMAIN."/view/".$ACTION;
?>
<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
	<title>Example Useing JSON API</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo $ASSETS_URL; ?>assets/images/favicon.ico" type="image/x-icon">
	
	<script type="text/javascript">
		var PATH = '<?php echo $ASSETS_URL; ?>';
		// var USERID = '<?php //echo $userID; ?>';
		var LANG = '<?php echo $LANG; ?>';
		var LINK = '<?php echo $LINK_URL; ?>';
	</script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/jquery-slim/dist/jquery.slim.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/angular/angular.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/angular-sanitize/angular-sanitize.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/ng-notify/dist/ng-notify.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>assets/js/quill/quill.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/ng-quill/src/ng-quill.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>conf/myApp//myApp.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>conf/myApp/myAppController.js"></script>
	<!-- CSS cusstom -->
	<!-- <link href="<?php //echo $ASSETS_URL; ?>assets/css/cusstom.css" rel="stylesheet"> -->

	<!-- prism css -->
	<link rel="stylesheet" href="<?php echo $ASSETS_URL; ?>assets/css/plugins/prism-coy.css">
	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo $ASSETS_URL; ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo $ASSETS_URL; ?>assets/css/quill/quill.snow.css">
	<link rel="stylesheet" href="<?php echo $ASSETS_URL; ?>assets/css/quill/quill.bubble.css">	

</head>

<body ng-controller="myAppController">
<!-- <div id="loading" data-loading>
	<ul class="bokeh">
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div> -->
<div class="loader-bg" data-loading>
	<div class="loader-track">
		<div class="loader-fill"></div>
	</div>
</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
		<div class="navbar-wrapper container">
			<div class="navbar-content sidenav-horizontal" id="layout-sidenav">
				<?php include 'app/layout/view/menu.php'; ?>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		<div class="container">
			<div class="m-header">
				<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
				<a href="<?php echo $LINK_URL; ?>" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="<?php echo $LINK_URL; ?>assets/images/logosut.png" alt="" class="logo" style="height: 30px;">
					<img src="<?php echo $LINK_URL; ?>assets/images/logosut.png" alt="" class="logo-thumb" style="height: 30px;">  
					<strong class="ml-1" style="font-size: 1.1rem!important;"> Template</strong> 
				</a>
				<a href="#!" class="mob-toggler">
					<i class="feather icon-more-vertical"></i>
				</a>
			</div>
			<?php include 'app/layout/view/user-toolbar.php'; ?>
		</div>
	</header>
	<!-- [ Header ] end -->

	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		<div class="pcoded-wrapper container">
			<div class="pcoded-content">
				<div class="pcoded-inner-content">
					<div class="main-body">
						<div class="page-wrapper">

							<!-- [ breadcrumb ] start -->
							<?php include('app/layout/view/breadcrumb.php'); ?>
							<!-- [ breadcrumb ] end -->

							
							<?php 
								
								$PAGE = isset($_GET['page']) ? $_GET['page'] : $PAGE;
								$str_pathFile = "app/" . $PAGE.".php";
								$breadcrumb = isset($_GET['page']) ? explode("/", $_GET['page']) : explode("/", $PAGE);

								if (file_exists($str_pathFile)){
									include_once($str_pathFile);
								}else{
									include_once("app/layout/view/404.php");
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- [ Main Content ] end -->

		<!-- Warning Section start -->
		<!-- Older IE warning message -->
		<!--[if lt IE 11]>
			<div class="ie-warning">
				<h1>Warning!!</h1>
				<p>You are using an outdated version of Internet Explorer, please upgrade
				   <br/>to any of the following web browsers to access this website.
				</p>
				<div class="iew-container">
					<ul class="iew-download">
						<li>
							<a href="http://www.google.com/chrome/">
								<img src="<?php echo $ASSETS_URL; ?>assets/images/browser/chrome.png" alt="Chrome">
								<div>Chrome</div>
							</a>
						</li>
						<li>
							<a href="https://www.mozilla.org/en-US/firefox/new/">
								<img src="<?php echo $ASSETS_URL; ?>assets/images/browser/firefox.png" alt="Firefox">
								<div>Firefox</div>
							</a>
						</li>
						<li>
							<a href="http://www.opera.com">
								<img src="<?php echo $ASSETS_URL; ?>assets/images/browser/opera.png" alt="Opera">
								<div>Opera</div>
							</a>
						</li>
						<li>
							<a href="https://www.apple.com/safari/">
								<img src="<?php echo $ASSETS_URL; ?>assets/images/browser/safari.png" alt="Safari">
								<div>Safari</div>
							</a>
						</li>
						<li>
							<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
								<img src="<?php echo $ASSETS_URL; ?>assets/images/browser/ie.png" alt="">
								<div>IE (11 & above)</div>
							</a>
						</li>
					</ul>
				</div>
				<p>Sorry for the inconvenience!</p>
			</div>
		<![endif]-->
		<!-- Warning Section Ends -->

		<!-- Required Js -->
		<script src="<?php echo $ASSETS_URL; ?>assets/js/vendor-all.min.js"></script>
		<script src="<?php echo $ASSETS_URL; ?>assets/js/plugins/bootstrap.min.js"></script>
		<script src="<?php echo $ASSETS_URL; ?>assets/js/ripple.js"></script>
		<script src="<?php echo $ASSETS_URL; ?>assets/js/pcoded.min.js"></script>


	<!-- prism Js -->
	<script src="<?php echo $ASSETS_URL; ?>assets/js/plugins/prism.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>assets/js/horizontal-menu.js"></script>
	<script>
		(function() {
			if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
				return;
			}
			try {
				window.layoutHelpers._getSetting("Rtl")
				window.layoutHelpers.setCollapsed(
					localStorage.getItem('layoutCollapsed') === 'true',
					false
				);
			} catch (e) {}
		})();
		$(function() {
			$('#layout-sidenav').each(function() {
				new SideNav(this, {
					orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
				});
			});
			$('body').on('click', '.layout-sidenav-toggle', function(e) {
				e.preventDefault();
				window.layoutHelpers.toggleCollapsed();
				if (!window.layoutHelpers.isSmallScreen()) {
					try {
						localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
					} catch (e) {}
				}
			});
		});
		$(document).ready(function() {
			$("#pcoded").pcodedmenu({
				themelayout: 'horizontal',
				MenuTrigger: 'hover',
				SubMenuTrigger: 'hover',
			});
		});
	</script>

	<script src="<?php echo $ASSETS_URL; ?>assets/js/analytics.js"></script>

</body>

</html>
