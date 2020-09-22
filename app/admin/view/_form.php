<div class="form-group row">
	<label for="username" class="col-sm-2 col-form-label">{{ massages.admin.username }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="username" name="username" ng-model="adminInstance.username" required="required">
	</div>
</div>

<div class="form-group row">
	<label for="password" class="col-sm-2 col-form-label">{{ massages.admin.password }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="password" name="password" ng-model="adminInstance.password" required="required">
	</div>
</div>

<div class="form-group row">
	<label for="name" class="col-sm-2 col-form-label">{{ massages.admin.name }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="name" name="name" ng-model="adminInstance.name" required="required">
	</div>
</div>

<div class="form-group row">
	<label for="phone" class="col-sm-2 col-form-label">{{ massages.admin.phone }}  : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="phone" name="phone" ng-model="adminInstance.phone">
	</div>
</div>

<div class="form-group row">
	<label for="status" class="col-sm-2 col-form-label">{{ massages.admin.status }}  : </label>
	<div class="col-sm-10">
		<div class="form-check form-check-inline">
		
			<input class="form-check-input" type="radio" name="status" ng-model="adminInstance.status" ng-value="'1'" id="status1">
			<label class="form-check-label" for="status1"> : เปิดใช้งาน</label> &nbsp;
		
		
			<input class="form-check-input" type="radio" name="status" ng-model="adminInstance.status" ng-value="'0'" id="status0">
			<label class="form-check-label" for="status0"> : ปิดใช้งาน</label> &nbsp;
		
		</div>
	</div>
</div>

<hr>
<button class="btn btn-success float-right shadow" type="submit"><i class="fas fa-save"></i> {{ massages.default.btn_save }}</button>