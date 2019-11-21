<script src="<?php echo $ASSETS_URL; ?>app/member/controller/memberController.js"></script>
<div ng-controller="memberController" ng-init="memberList();">
	<?php include "app/member/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">


				<div class="card-body">
					<h4 class="card-title mb-3">{{ massages.default.show+massages.member.domain }}</h4>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>{{ massages.member.name }}</th>
									<th>{{ massages.member.lastname }}</th>
									<th>{{ massages.member.phone }}</th>
									<th>{{ massages.member.email }}</th>
									<th>{{ massages.member.gender }}</th>
									<th class="text-center"><i class="fas fa-bars"></i></th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="member in memberInstanceList">
									<td>{{ member.id }}</td>
									
									<td>{{ member.name }}</td>
									<td>{{ member.lastname }}</td>
									<td>{{ member.phone }}</td>
									<td>{{ member.email }}</td>
									<td>{{ memberGender[member.gender] }}</td>

									<td class="text-center">
										<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
											<a href="<?php echo $LINK_URL; ?>member/show/{{member.id}}/" data-toggle="tooltip" data-placement="bottom" title="แสดงข้อมูล" class="btn btn-info">
												<i class="fas fa-info-circle"></i> 
												
											</a>
											<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" title="ลบข้อมูล" confirmed-click="memberDelete(member.id);">
												<i class="fas fa-trash-alt"></i> 
												
											</button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="card-footer">
					<div class="row">

						<div class="col-sm-8 form-inline" ng-show="pagination.perPage < pagination.total">
							<div ng-show="pagination.perPage < pagination.total">
								<button class="btn btn-sm btn-light" ng-click="pagination.page=1;memberList();" ng-disabled="pagination.page<=1"> 
									<i class="fas fa-angle-double-left"></i>
								</button> &nbsp;

								<button class="btn btn-sm btn-light" ng-click="pagination.page=pagination.page-1;memberList();" ng-disabled="pagination.page<=1"> 
									<i class="fas fa-angle-left"></i>
								</button>  &nbsp;

								<input class="form-control form-control-sm" type="number" ng-model="pagination.page" min="1" max="{{ pagination.total/pagination.perPage | roundup }}" ng-change="memberList();" style="text-align: center;">  &nbsp;

								<button class="btn btn-sm btn-light" ng-click="pagination.page=pagination.page+1;memberList();" ng-disabled="pagination.page>=(pagination.total/pagination.perPage | roundup)"> 
									<i class="fas fa-angle-right"></i>
								</button>  &nbsp;

								<button class="btn btn-sm btn-light" ng-click="pagination.page=(pagination.total/pagination.perPage | roundup);memberList();" 
									ng-disabled="pagination.page>=(pagination.total/pagination.perPage | roundup)"> 
									<i class="fas fa-angle-double-right"></i>
								</button>  &nbsp;
							</div>
						</div>

						<div class="col-sm-4 form-inline ml-auto">
							<div class="input-group input-group-sm input-group-flat pull-right">
								<span class="input-group-btn">
									<button class="btn btn-light btn-sm" type="button" style="font-size: 0.9rem;">
										{{ massages.default.list_display }}
									</button>
								</span>
								<input type="number" class="form-control form-control-sm" type="number" id="perPage" ng-model="pagination.perPage" ng-change="memberList();" min="1" style="text-align: center;">
								<span class="input-group-btn">
									<button class="btn btn-light btn-sm" type="button" style="font-size: 0.9rem;"> / 
										{{ massages.default.list_total }} {{ pagination.total }} {{ massages.default.list_row }}
									</button>
								</span>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
