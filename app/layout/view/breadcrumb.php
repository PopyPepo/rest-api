<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<!-- <h5 class="m-b-10">{{ massages['<?php //echo $DOMAIN=='layout' ? 'default' : $DOMAIN ?>']['domain'] }}</h5> -->
					<h5 class="m-b-10">{{ massages.default['<?php echo $DOMAIN=='layout' ? 'domain' : $DOMAIN ?>'] }}</h5>
				</div>

				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo $LINK_URL; ?>"><i class="feather icon-home"></i></a></li>

					<li class="breadcrumb-item">
						<a href="<?php echo $LINK_URL.$DOMAIN; ?>/">
							{{ massages.default['<?php echo $DOMAIN=='layout' ? 'domain' : $DOMAIN ?>'] }}
						</a>
					</li>

					<?php if ($ACTION!='main'){ ?>
						<li class="breadcrumb-item">
							<a href="javascript:;">
								<!-- {{ massages.default['<?php //echo $ACTION; ?>']}} -->
								{{massages['<?php echo $DOMAIN ?>']['<?php echo $ACTION; ?>'] }}
							</a>
						</li>
					<?php } ?>				
				</ul>

			</div>
		</div>
	</div>
</div>