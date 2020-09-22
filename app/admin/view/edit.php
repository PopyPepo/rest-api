<?php $ID = isset($_GET['idadmin']) ? $_GET['idadmin'] : $ID; ?>
<script src="<?php echo $ASSETS_URL; ?>app/admin/controller/adminController.js"></script>
<div ng-controller="adminController" ng-init="adminShow('<?php echo $ID; ?>');">
	<?php //include "app/admin/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">
	

				<div class="card-body">
					<?php include "app/admin/view/_menu.php"; ?>
					<h4 class="card-title mb-3">{{ massages.default.edit+massages.admin.domain }}</h4>
					<form name="adminForm" method="post" ng-submit="adminUpdate(adminInstance);">
						<?php include("app/admin/view/_form.php"); ?>
						
						<button type="button" class="btn btn-danger float-right mr-1 shadow" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" title="ลบข้อมูล" confirmed-click="adminDelete(adminInstance.idadmin);"><i class="fas fa-trash-alt"></i> {{ massages.default.btn_del }} </button>		
						<button type="reset" class="btn btn-light bg-ligh float-right mr-1 shadow"><i class="fas fa-broom"></i> {{ massages.default.btn_clear }} </button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>