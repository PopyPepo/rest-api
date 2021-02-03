<script src="<?php echo $ASSETS_URL; ?>app/address/controller/addressController.js"></script>
<div ng-controller="addressController" >
	

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">
					
				<div class="card-header d-flex align-items-center justify-content-between">
					<h4 class="mb-0">{{ massages.default.show+massages.address.domain }}</h4>
					<?php include "app/address/view/_menu.php"; ?>
				</div>
				
	

				<div class="card-body">
					<form name="addressForm" method="post" ng-submit="addressInsert(addressInstance);">
						<?php include("app/address/view/_form.php"); ?>		
						<button type="reset" class="btn btn-light bg-ligh float-right mr-1 shadow"><i class="fas fa-broom"></i> {{ massages.default.btn_clear }} </button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>