<?php $ID = isset($_GET['id_address']) ? $_GET['id_address'] : $ID; ?>
<script src="<?php echo $ASSETS_URL; ?>app/address/controller/addressController.js"></script>
<div ng-controller="addressController" ng-init="addressShow('<?php echo $ID; ?>');">
	<?php include "app/address/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">


				<div class="card-body">
					<h4 class="card-title mb-3">{{ massages.default.show+massages.address.domain }}</h4>
					<div class="table-responsive">
						<table class="table table-show">
							<tbody>
								<tr>
									<th width="auto">{{ massages.address.build }}</th>
									<td>{{ addressInstance.build }}</td>
								</tr>
										
								<tr>
									<th width="auto">{{ massages.address.home_number }}</th>
									<td>{{ addressInstance.home_number }}</td>
								</tr>
										
								<tr>
									<th width="auto">{{ massages.address.village }}</th>
									<td>{{ addressInstance.village }}</td>
								</tr>
										
								<tr>
									<th width="auto">{{ massages.address.road }}</th>
									<td>{{ addressInstance.road }}</td>
								</tr>
										
								<tr>
									<th width="auto">{{ massages.address.district }}</th>
									<td>{{ addressInstance.district }}</td>
								</tr>
										
								<tr>
									<th width="auto">{{ massages.address.amphur }}</th>
									<td>{{ addressInstance.amphur }}</td>
								</tr>
										
								<tr>
									<th width="auto">{{ massages.address.province }}</th>
									<td>{{ addressInstance.province }}</td>
								</tr>
										
								<tr>
									<th width="auto">{{ massages.address.zipcode }}</th>
									<td>{{ addressInstance.zipcode }}</td>
								</tr>
										
								<tr>
									<th width="auto">{{ massages.address.member_id }}</th>
									<td>{{ addressInstance.member_id }}</td>
								</tr>
										
							</tbody>
						</table>
					</div>
					
				</div>

				<div class="card-footer">
					<a class="btn btn-warning float-right shadow-sm" href="<?php echo $LINK_URL; ?>address/edit/{{ addressInstance.id_address }}/"> 
						<i class="fas fa-edit"></i>
						แก้ไขข้อมูล
					</a> 
					<button type="button" class="btn btn-danger float-right shadow-sm mr-1" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" confirmed-click="addressDelete(addressInstance.id_address);"> 
						<i class="fas fa-trash-alt"></i> {{ massages.default.btn_del }} 
					</button>
				</div>

			</div>
		</div>
	</div>
</div>