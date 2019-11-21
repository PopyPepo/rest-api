<div class="form-group row">
	<label for="build" class="col-sm-2 col-form-label">{{ massages.address.build }}  : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="build" name="build" ng-model="addressInstance.build">
	</div>
</div>

<div class="form-group row">
	<label for="home_number" class="col-sm-2 col-form-label">{{ massages.address.home_number }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="home_number" name="home_number" ng-model="addressInstance.home_number" required="required">
	</div>
</div>

<div class="form-group row">
	<label for="village" class="col-sm-2 col-form-label">{{ massages.address.village }}  : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="village" name="village" ng-model="addressInstance.village">
	</div>
</div>

<div class="form-group row">
	<label for="road" class="col-sm-2 col-form-label">{{ massages.address.road }}  : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="road" name="road" ng-model="addressInstance.road">
	</div>
</div>

<div class="form-group row">
	<label for="district" class="col-sm-2 col-form-label">{{ massages.address.district }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="district" name="district" ng-model="addressInstance.district" required="required">
	</div>
</div>

<div class="form-group row">
	<label for="amphur" class="col-sm-2 col-form-label">{{ massages.address.amphur }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="amphur" name="amphur" ng-model="addressInstance.amphur" required="required">
	</div>
</div>

<div class="form-group row">
	<label for="province" class="col-sm-2 col-form-label">{{ massages.address.province }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="province" name="province" ng-model="addressInstance.province" required="required">
	</div>
</div>

<div class="form-group row">
	<label for="zipcode" class="col-sm-2 col-form-label">{{ massages.address.zipcode }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="zipcode" name="zipcode" ng-model="addressInstance.zipcode" required="required">
	</div>
</div>

<script src="<?php echo $ASSETS_URL; ?>app/member/controller/memberController.js"></script>
<div class="form-group row" ng-controller="memberController" ng-init="memberList();">
	<label for="member_id" class="col-sm-2 col-form-label">{{ massages.address.member_id }} <span class="text-danger">*</span> : </label>
	<div class="col-sm-10">
		<select class="custom-select" name="member_id" ng-model="addressInstance.member_id" ng-options="member.id as member.name for member in memberInstanceList" required="required">
			<option value="">--- เลือกmember_id ---</option>
		</select>
	</div>
</div>


<hr>
<button class="btn btn-success float-right shadow" type="submit"><i class="fas fa-save"></i> {{ massages.default.btn_save }}</button>