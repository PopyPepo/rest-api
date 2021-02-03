<script src="<?php echo $ASSETS_URL; ?>app/member/controller/memberController.js"></script>
<div ng-controller="memberController" >
	

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">
					
				<div class="card-header d-flex align-items-center justify-content-between">
					<h4 class="mb-0">{{ massages.default.show+massages.member.domain }}</h4>
					<?php include "app/member/view/_menu.php"; ?>
				</div>
				
	

				<div class="card-body">
					<form name="memberForm" method="post" ng-submit="memberInsert(memberInstance);">
						<?php include("app/member/view/_form.php"); ?>		
						<button type="reset" class="btn btn-light bg-ligh float-right mr-1 shadow"><i class="fas fa-broom"></i> {{ massages.default.btn_clear }} </button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>