<?php 
$txt .= '<div class="form-group row">
	'.$label.'
	<div class="col-sm-10">
		<input type="text" class="form-control" id="'.$instanc->Field.'" name="'.$instanc->Field.'" ng-model="'.$table.'Instance.'.$instanc->Field.'"'.$request.'>
	</div>
</div>

';
?>