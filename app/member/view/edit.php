<?php $ID = isset($_GET['id']) ? $_GET['id'] : $ID; ?>
<script src="<?php echo $ASSETS_URL; ?>app/member/controller/memberController.js"></script>
<div ng-controller="memberController" ng-init="memberShow('<?php echo $ID; ?>');">
	<?php include "app/member/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">
	

				<div class="card-body">
					<h4 class="card-title mb-3">{{ massages.default.show+massages.member.domain }}</h4>
					<form name="memberForm" method="post" ng-submit="memberUpdate(memberInstance);">
						<?php include("app/member/view/_form.php"); ?>
						
						<button type="button" class="btn btn-danger float-right mr-1 shadow" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" title="ลบข้อมูล" confirmed-click="memberDelete(memberInstance.id);"><i class="fas fa-trash-alt"></i> {{ massages.default.btn_del }} </button>		
						<button type="reset" class="btn btn-light bg-ligh float-right mr-1 shadow"><i class="fas fa-broom"></i> {{ massages.default.btn_clear }} </button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>