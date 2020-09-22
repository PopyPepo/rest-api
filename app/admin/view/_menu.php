<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row" ng-init="addLang('admin')">

	<!-- <h2 class="fw-bold">{{ show+massages.admin.domain }}</h2> -->
	<div class="ml-md-auto py-2 py-md-0">
		<a href="<?php echo $LINK_URL; ?>admin/list/" title="รายการข้อมูลผู้ดูแลระบบ" class="btn btn-light btn-round shadow-sm">
			<i class="fas fa-table"></i> 
			 {{ massages.default.list+massages.admin.domain }}
		</a>
		<a href="<?php echo $LINK_URL; ?>admin/create/" title="เพิ่มข้อมูลผู้ดูแลระบบ" class="btn btn-primary btn-round shadow-sm">
			<i class="fas fa-plus-circle"></i> 
			 {{ massages.default.create+massages.admin.domain }}
		</a>
	</div>
</div>