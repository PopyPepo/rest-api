<ul class="navbar-nav ml-auto" ng-init="getFolder();">
	<li class="nav-item">
		<a class="nav-link" href="<?php echo $LINK_URL; ?>">{{ massages.default.home }}</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?php echo $LINK_URL; ?>member/">
			<i class="fas fa-book"></i>
			member
		</a>
	</li>
	
	<li class="nav-item">
		<a class="nav-link" href="<?php echo $LINK_URL; ?>address/">
			<i class="fas fa-book"></i>
			address
		</a>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Dropdown link
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			<a class="dropdown-item" href="#">Action</a>
			<a class="dropdown-item" href="#">Another action</a>
			<a class="dropdown-item" href="#">Something else here</a>
		</div>
	</li>
</ul>

<!-- <ul class="navbar-nav">
	<li class="nav-item">
		<a class="nav-link" href="<?php // echo $LINK_URL; ?>">หน้าแรก</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?php // echo $LINK_URL; ?>member/list/">จัดการข้อมูลสมาชิค</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?php // echo $LINK_URL; ?>address/list/">จัดการข้อมูลที่อยู่สมาชิก</a>
	</li>
</ul> -->