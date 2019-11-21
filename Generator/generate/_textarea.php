<?php 
$txt .= '<div class="form-group row">
	'.$label.'
	<div class="col-sm-10">
		<textarea class="form-control" id="'.$instanc->Field.'" name="'.$instanc->Field.'" ng-model="'.$table.'Instance.'.$instanc->Field.'" rows="3" '.$request.'></textarea>
	</div>
</div>

';
?>