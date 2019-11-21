<div class="panel-header bg-info-gradient" ng-init="addLang('address')">
	<div class="page-inner py-4">

		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		
			<h2 class="fw-bold">{{ show+massages.address.domain }}</h2>
			<div class="ml-md-auto py-2 py-md-0">
				<a href="<?php echo $LINK_URL; ?>address/list/" title="รายการข้อมูลที่อยู่สมาชิก" class="btn bg-white btn-round shadow-sm">
					<i class="fas fa-table"></i> 
					 {{ massages.default.list+massages.address.domain }}
				</a>
				<a href="<?php echo $LINK_URL; ?>address/create/" title="เพิ่มข้อมูลที่อยู่สมาชิก" class="btn btn-primary btn-round shadow-sm">
					<i class="fas fa-plus-circle"></i> 
					 {{ massages.default.create+massages.address.domain }}
				</a>
			</div>
		</div>
	</div>
</div>