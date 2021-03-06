<aside class="main-sidebar">
	<?php if ($base->isLeft) {?>
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<?php if ($base->isUserPanel) { ?>
			<div class="user-panel">
				<div class="pull-left image">
					<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>Alexander Pierce</p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
		<?php } ?>

		<!-- search form (Optional) -->
		<?php if ($base->isSearch) { ?>
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
				  <span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				  </span>
				</div>
			</form>
		<?php } ?>
		<?= $leftMenu ?>
	</section>
	<?php } ?>
</aside>	
