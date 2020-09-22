<?php $ID = isset($_GET['idadmin']) ? $_GET['idadmin'] : $ID; ?>
<script src="<?php echo $ASSETS_URL; ?>app/admin/controller/adminController.js"></script>
<div ng-controller="adminController" ng-init="adminShow('<?php echo $ID; ?>');">
	<?php //include "app/admin/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">


				<div class="card-body">
					<?php include "app/admin/view/_menu.php"; ?>
					<h4 class="card-title mb-3">{{ massages.default.show+massages.admin.domain }}</h4>
					<div class="table-responsive">
						<table class="table table-show table-sm border-bottom">
							<tbody>
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.admin.username }}</th>
									<td>{{ adminInstance.username }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.admin.password }}</th>
									<td>{{ adminInstance.password }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.admin.name }}</th>
									<td>{{ adminInstance.name }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.admin.phone }}</th>
									<td>{{ adminInstance.phone }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">สถานะ </th>
									<td>{{ adminStatus[adminInstance.status] }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.admin.eventDate }}</th>
									<td>{{ adminInstance.eventDate }}</td>
								</tr>
										
							</tbody>
						</table>
					</div>
					
				</div>

				<div class="d-block card-footer">
					<a class="btn btn-warning float-right shadow-sm" href="<?php echo $LINK_URL; ?>admin/edit/{{ adminInstance.idadmin }}/"> 
						<i class="fas fa-edit"></i>
						แก้ไขข้อมูล
					</a> 
					<button type="button" class="btn btn-danger float-right shadow-sm mr-1" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" confirmed-click="adminDelete(adminInstance.idadmin);"> 
						<i class="fas fa-trash-alt"></i> {{ massages.default.btn_del }} 
					</button>
				</div>

			</div>
		</div>
	</div>
</div>