<div class="panel-header bg-info-gradient" ng-init="addLang('member')">
	<div class="page-inner py-4">

		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		
			<h2 class="fw-bold">{{ show+massages.member.domain }}</h2>
			<div class="ml-md-auto py-2 py-md-0">
				<a href="<?php echo $LINK_URL; ?>member/list/" title="รายการข้อมูลสมาชิก" class="btn bg-white btn-round shadow-sm">
					<i class="fas fa-table"></i> 
					 {{ massages.default.list+massages.member.domain }}
				</a>
				<a href="<?php echo $LINK_URL; ?>member/create/" title="เพิ่มข้อมูลสมาชิก" class="btn btn-primary btn-round shadow-sm">
					<i class="fas fa-plus-circle"></i> 
					 {{ massages.default.create+massages.member.domain }}
				</a>
			</div>
		</div>
	</div>
</div>