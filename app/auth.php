<?php
error_reporting(E_ALL);
ob_start();
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Bangkok");

$userID = isset($_SESSION['memberAuth']['id']) ? $_SESSION['memberAuth']['id'] : null;
$LANG = isset($_SESSION['LANG']) ? $_SESSION['LANG'] : "Th";
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
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo $ASSETS_URL; ?>assets/images/favicon.ico" type="image/x-icon">

	

	<link href="<?php echo $ASSETS_URL; ?>node_modules/ng-notify/dist/ng-notify.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $ASSETS_URL; ?>node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<script type="text/javascript">
		var PATH = '<?php echo $ASSETS_URL; ?>';
		var USED = '<?php echo $userID; ?>';
		var LANG = '<?php echo $LANG; ?>';
		var LINK = '<?php echo $LINK_URL; ?>';
	</script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/jquery-slim/dist/jquery.slim.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/angular/angular.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/angular-sanitize/angular-sanitize.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>node_modules/ng-notify/dist/ng-notify.min.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>conf/myApp//myApp.js"></script>
	<script src="<?php echo $ASSETS_URL; ?>conf/myApp/myAppController.js"></script>
	<!-- <script src="<?php //echo $ASSETS_URL; ?>app/info/controller/infoController.js"></script> -->
	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo $ASSETS_URL; ?>assets/css/style.css">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper" ng-controller="myAppController">
	<div class="auth-content" style=""><!-- ng-controller="infoController" ng-init="addLang('info')" -->
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<img src="<?php echo $ASSETS_URL; ?>assets/images/logosut.png" alt="" class="img-fluid mb-4" style="height: 6rem;">
						<h4 class="mb-3 f-w-400">เข้าสู่ระบบ<br>Example JSON API</h4>

						<form name="formAuth" ng-submit="auth(user);" method="POST" accept-charset="utf-8">

						
							<div class="form-group mb-3 text-left">
								<label class="" for="username">รหัสพนักงาน</label>
								<input type="text" class="form-control" id="username" ng-model="user.username" required="required" placeholder="" autofocus="true">
							</div>

							<div class="form-group mb-4 text-left">
								<label class="" for="Password">รหัสผ่านอีเมล @SUT</label>
								<input type="password" class="form-control" id="Password" placeholder="" ng-model="user.password" required="required">
							</div>
							<!-- <div class="custom-control custom-checkbox text-left mb-4 mt-2">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">Save credentials.</label>
							</div> -->
							<button class="btn btn-block btn-primary mb-4">Signin</button>
							<!-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
							<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?php echo $ASSETS_URL; ?>assets/js/vendor-all.min.js"></script>
<script src="<?php echo $ASSETS_URL; ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo $ASSETS_URL; ?>assets/js/ripple.js"></script>
<script src="<?php echo $ASSETS_URL; ?>assets/js/pcoded.min.js"></script>



</body>

</html>
