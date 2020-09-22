<script src="<?php echo $ASSETS_URL; ?>app/admin/controller/adminController.js"></script>
<div ng-controller="adminController" >
	<?php //include "app/admin/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">
	

				<div class="card-body">
					<?php include "app/admin/view/_menu.php"; ?>
					<h4 class="card-title mb-3">{{ massages.default.create+massages.admin.domain }}</h4>
					<form name="adminForm" method="post" ng-submit="adminInsert(adminInstance);">
						<?php include("app/admin/view/_form.php"); ?>		
						<button type="reset" class="btn btn-light bg-ligh float-right mr-1 shadow"><i class="fas fa-broom"></i> {{ massages.default.btn_clear }} </button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>