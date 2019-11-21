<script src="<?php echo $ASSETS_URL; ?>app/address/controller/addressController.js"></script>
<div ng-controller="addressController" >
	<?php include "app/address/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">
	

				<div class="card-body">
					<h4 class="card-title mb-3">{{ massages.default.show+massages.address.domain }}</h4>
					<form name="addressForm" method="post" ng-submit="addressInsert(addressInstance);">
						<?php include("app/address/view/_form.php"); ?>		
						<button type="reset" class="btn btn-light bg-ligh float-right mr-1 shadow"><i class="fas fa-broom"></i> {{ massages.default.btn_clear }} </button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>