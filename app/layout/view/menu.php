<ul class="navbar-nav ml-auto" ng-init="getFolder();">
	<li class="nav-item">
		<a class="nav-link" href="<?php echo $LINK_URL; ?>">{{ massages.default.home }}</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?php echo $LINK_URL; ?>admin/">
			<i class="fas fa-book"></i>
			admin
		</a>
	</li>
	
	<li class="nav-item">
		<a class="nav-link" href="<?php echo $LINK_URL; ?>countries/">
			<i class="fas fa-book"></i>
			countries
		</a>
	</li>
	
	<li class="nav-item">
		<a class="nav-link" href="<?php echo $LINK_URL; ?>states/">
			<i class="fas fa-book"></i>
			states
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