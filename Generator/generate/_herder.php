<?php 
$txt .= '<script src="<?php echo $ASSETS_URL; ?>app/'.$table.'/controller/'.$table.'Controller.js"></script>
<div ng-controller="'.$table.'Controller" '.$init.'>
	

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">
					
				<div class="card-header">
					<h4>'.$title.'</h4>
					<div class="card-header-right">
						<?php include "app/'.$table.'/view/_menu.php"; ?>
					</div>
				</div>
				
'; 

			$boxL = '		
						<button type="reset" class="btn btn-light bg-ligh float-right mr-1 shadow"><i class="fas fa-broom"></i> {{ massages.default.btn_clear }} </button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>';
?>

