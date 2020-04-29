<?php
error_reporting(E_ALL);
ob_start();
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Bangkok");

$userID = isset($_SESSION['memberAuth']['id']) ? $_SESSION['memberAuth']['id'] : null;
$DOMAIN = isset($uri_past[0]) && $uri_past[0]!="" ? $uri_past[0] : "layout";
$ACTION = $DOMAIN=="layout" ? "main" : (isset($uri_past[1]) ? $uri_past[1] : "list");
$LANG = isset($_SESSION['LANG']) ? $_SESSION['LANG'] : "Th";
$PAGE = $DOMAIN."/view/".$ACTION;
?>
<!DOCTYPE html>
<html ng-app="myApp" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Examper Useing JSON API</title>

	<link rel="icon" href="<?php echo $ASSETS_URL; ?>assets/image/logosut_e.gif">
	<link href="<?php echo $ASSETS_URL; ?>node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $ASSETS_URL; ?>node_modules/ng-notify/dist/ng-notify.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $ASSETS_URL; ?>node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<script type="text/javascript">
		var PATH = '<?php echo $ASSETS_URL; ?>';
		var USERID = '<?php echo $userID; ?>';
		var LANG = '<?php echo $LANG; ?>';
		var LINK = '<?php echo $LINK_URL; ?>';
	</script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/angular/angular.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/angular/angular-sanitize.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/ng-notify/dist/ng-notify.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>conf/myApp//myApp.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>conf/myApp/myAppController.js"></script>
	<!-- CSS cusstom -->
	<link href="<?php echo $ASSETS_URL; ?>assets/css/cusstom.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100" ng-controller="myAppController">
<div id="loading" data-loading>
	<ul class="bokeh">
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
	<header class="mb-1">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo $LINK_URL; ?>">
				<img src="<?php echo $ASSETS_URL; ?>assets/image/logosut_e.gif" width="30" height="30" class="d-inline-block align-top" alt="">
					BRANDNAME
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarText">
					<?php include("app/layout/view/menu.php"); ?>
				</div>
			</div>
		</nav>
	</header>

	<main role="main" class="container pb-4 pt-3 clearfix">
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
	</main>

	<footer class="footer mt-auto pt-1 bg-primary text-white-50">
		<div class="container mt-3 pb-3">
			<span class="">MIS@SUT © 2018-2019 v.2.5</span>
			<small class="float-right"><address>
				มหาวิทยาลัยเทคโนโลยีสุรนารี | Suranaree University of Technology<br>
				ที่อยู่: 111, ถนน มหาวิทยาลัย ตำบล สุรนารี อำเภอเมืองนครราชสีมา นครราชสีมา 30000</address>
			</small>
		</div>
	</footer>


	
	<script src="<?php echo $ASSETS_URL; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/popper.js/dist/popper.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>