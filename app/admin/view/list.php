<script src="<?php echo $ASSETS_URL; ?>app/admin/controller/adminController.js"></script>
<div ng-controller="adminController" ng-init="adminList();">
	<?php //include "app/admin/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">


				<div class="card-body">
					<?php include "app/admin/view/_menu.php"; ?>
					<h4 class="card-title mb-3">{{ massages.default.list+massages.admin.domain }}</h4>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>{{ massages.admin.username }}</th>
									<th>{{ massages.admin.password }}</th>
									<th>{{ massages.admin.name }}</th>
									<th>{{ massages.admin.phone }}</th>
									<th>{{ massages.admin.status }}</th>
									<th class="text-center"><i class="fas fa-bars"></i></th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="admin in adminInstanceList">
									<td>{{ admin.idadmin }}</td>
									
									<td>{{ admin.username }}</td>
									<td>{{ admin.password }}</td>
									<td>{{ admin.name }}</td>
									<td>{{ admin.phone }}</td>
									<td>{{ adminStatus[admin.status] }}</td>

									<td class="text-center">
										<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
											<a href="<?php echo $LINK_URL; ?>admin/show/{{admin.idadmin}}/"  title="แสดงข้อมูล" class="btn btn-info">
												<i class="fas fa-info-circle"></i> 
												
											</a>
											<button type="button" class="btn btn-danger" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" title="ลบข้อมูล" confirmed-click="adminDelete(admin.idadmin);">
												<i class="fas fa-trash-alt"></i> 
												
											</button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="d-block card-footer">
					<div class="row">

						<div class="col-sm-8 form-inline">
							<div ng-show="pagination.perPage < pagination.total">
								<button class="btn btn-sm btn-light" ng-click="pagination.page=1;adminList();" ng-disabled="pagination.page<=1"> 
									<i class="fas fa-angle-double-left"></i>
								</button> &nbsp;

								<button class="btn btn-sm btn-light" ng-click="pagination.page=pagination.page-1;adminList();" ng-disabled="pagination.page<=1"> 
									<i class="fas fa-angle-left"></i>
								</button>  &nbsp;

								<input class="form-control form-control-sm" type="number" ng-model="pagination.page" min="1" max="{{ pagination.total/pagination.perPage | roundup }}" ng-change="adminList();" style="text-align: center;">  &nbsp;

								<button class="btn btn-sm btn-light" ng-click="pagination.page=pagination.page+1;adminList();" ng-disabled="pagination.page>=(pagination.total/pagination.perPage | roundup)"> 
									<i class="fas fa-angle-right"></i>
								</button>  &nbsp;

								<button class="btn btn-sm btn-light" ng-click="pagination.page=(pagination.total/pagination.perPage | roundup);adminList();" 
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
								<input type="number" class="form-control form-control-sm" type="number" id="perPage" ng-model="pagination.perPage" ng-change="adminList();" min="1" style="text-align: center;">
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
