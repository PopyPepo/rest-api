<?php $ID = isset($_GET['id']) ? $_GET['id'] : $ID; ?>
<script src="<?php echo $ASSETS_URL; ?>app/member/controller/memberController.js"></script>
<div ng-controller="memberController" ng-init="memberShow('<?php echo $ID; ?>');">
	<?php include "app/member/view/_menu.php"; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="card shadow">


				<div class="card-body">
					<h4 class="card-title mb-3">{{ massages.default.show+massages.member.domain }}</h4>
					<div class="table-responsive">
						<table class="table table-show border-bottom">
							<tbody>
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.member.name }}</th>
									<td>{{ memberInstance.name }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.member.lastname }}</th>
									<td>{{ memberInstance.lastname }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.member.phone }}</th>
									<td>{{ memberInstance.phone }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.member.email }}</th>
									<td>{{ memberInstance.email }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">เพศ </th>
									<td>{{ memberGender[memberInstance.gender] }}</td>
								</tr>
										
								<tr>
									<th class="bg-info text-white" width="auto">{{ massages.member.birthday }}</th>
									<td>{{ memberInstance.birthday }}</td>
								</tr>
										
							</tbody>
						</table>
					</div>
					
				</div>

				<div class="card-footer">
					<a class="btn btn-warning float-right shadow-sm" href="<?php echo $LINK_URL; ?>member/edit/{{ memberInstance.id }}/"> 
						<i class="fas fa-edit"></i>
						แก้ไขข้อมูล
					</a> 
					<button type="button" class="btn btn-danger float-right shadow-sm mr-1" ng-confirm-click="คุณแน่ใจว่าต้องการลบข้อมูล ใช่หรือไม่?" confirmed-click="memberDelete(memberInstance.id);"> 
						<i class="fas fa-trash-alt"></i> {{ massages.default.btn_del }} 
					</button>
				</div>

			</div>
		</div>
	</div>
</div>